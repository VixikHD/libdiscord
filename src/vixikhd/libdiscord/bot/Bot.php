<?php

declare(strict_types=1);

namespace vixikhd\libdiscord\bot;

use RuntimeException;
use vixikhd\libdiscord\bot\application\Application;
use vixikhd\libdiscord\bot\data\objects\ApplicationInformation;
use vixikhd\libdiscord\bot\data\objects\GuildInformation;
use vixikhd\libdiscord\bot\data\objects\PartialGuildInformation;
use vixikhd\libdiscord\bot\data\objects\UserInformation;
use vixikhd\libdiscord\bot\guild\Guild;
use vixikhd\libdiscord\bot\user\User;
use vixikhd\libdiscord\curl\Curl;
use vixikhd\libdiscord\utils\Logger;
use function array_map;
use function json_decode;
use function microtime;
use function round;
use function str_replace;
use function usleep;

final class Bot {
	private float $startTime;

	private Application $application;
	private User $currentUser;

	/** @var array<string, Guild> */
	private array $guilds = [];

	public function __construct(
		private string $token,
		private Logger $logger
	) {
		$this->startTime = microtime(true);

		$this->getLogger()->info("Loading bot information...");
		$this->loadBotInformation();
	}

	public function loadBotInformation(): bool {
		$startTime = microtime(true);

		try {
			$this->application = new Application(ApplicationInformation::parseInformation($this->requestJsonData(GetRequestPathConstants::CURRENT_BOT_APPLICATION_INFORMATION)));
			$this->currentUser = new User(UserInformation::parseUserInformation($this->requestJsonData(GetRequestPathConstants::CURRENT_USER)));

			$currentUserGuilds = $this->requestJsonData(GetRequestPathConstants::CURRENT_USER_GUILDS);

			$guilds = array_map(function(array $partialGuildData): Guild {
				$partialGuildInfo = PartialGuildInformation::parsePartialGuildInformation($partialGuildData);
				$id = $partialGuildInfo->getId();

				$guildInfo = GuildInformation::parseGuildInformation($this->requestJsonData(str_replace("{guild.id}", $id, GetRequestPathConstants::GUILD)));
				return new Guild($guildInfo);
			}, $currentUserGuilds);

			foreach($guilds as $guild) {
				$this->guilds[$guild->getId()] = $guild;
			}
		} catch(RuntimeException $exception) {
			$this->getLogger()->error($exception->getMessage());
			return false;
		}

		$this->getLogger()->info("Successfully loaded application information, took " . round(microtime(true) - $startTime, 2). " seconds.");
		return true;
	}

	public function requestJsonData(string $getRequestPath): array {
		$curl = (new Curl())
			->setUrl(DiscordConstants::REQUEST_PATH . $getRequestPath)
			->setHttpHeader(["Authorization: Bot $this->token"])
			->followLocationHeaders()
			->disableVerification()
			->execute();

		do {
			if(!($response = $curl->getResponse())) {
				throw new RuntimeException("No response received for request $getRequestPath");
			}

			$data = json_decode($response, true);
			if($data === null) {
				throw new RuntimeException("Invalid json provided");
			}

			$responseCode = $curl->getResponseCode();
			if($responseCode === ErrorCodeConstants::EXCEEDED_RATE_LIMIT) {
				$sleepTime = $data["retry_after"] ?? 1.0;
				usleep((int)($sleepTime * 1000));
				continue;
			} elseif($responseCode !== ErrorCodeConstants::REQUEST_SUCCESS) {
				throw new RuntimeException("Unknown response code $responseCode");
			}

			return $data;
		} while(true);
	}

	public function getApplication(): Application {
		return $this->application;
	}

	public function getCurrentUser(): User {
		return $this->currentUser;
	}

	/**
	 * @return Guild[]
	 */
	public function getBotGuilds(): array {
		return $this->guilds;
	}

	public function getLogger(): Logger {
		return $this->logger;
	}
}