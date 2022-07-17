<?php

declare(strict_types=1);

namespace vixikhd\libdiscord\bot\data\objects;

use Error;
use vixikhd\libdiscord\bot\data\Undefined;
use vixikhd\libdiscord\utils\DataParseError;
use function array_key_exists;

class ApplicationInformation {
	public function __construct(
		private string $id,
		private string $name,
		private ?string $iconHash,
		private string $description,
		private Undefined|array $rpcOrigins,
		private bool $isBotPublic,
		private bool $requiresCodeGrant,
		private Undefined|string $termsOfServiceUrl,
		private Undefined|string $privacyPolicyUrl,
		private Undefined|UserInformation $owner,
		private string $summary, // depracated
		private string $verifyKey,
		private ?TeamInformation $team,
		private Undefined|string $guildId,
		private Undefined|string $primarySkuId,
		private Undefined|string $slug,
		private Undefined|string $coverImageHash,
		private Undefined|int $flags,
		private Undefined|array $tags,
		private Undefined|InstallParamsInformation $installParams,
		private Undefined|string $customInstallUrl
	) {}

	public function getId(): string {
		return $this->id;
	}

	public function getName(): string {
		return $this->name;
	}

	public function getIconHash(): ?string {
		return $this->iconHash;
	}

	public function getDescription(): string {
		return $this->description;
	}

	/**
	 * @return string[]|null
	 */
	public function getRpcOrigins(): ?array {
		return $this->rpcOrigins instanceof Undefined ? null : $this->rpcOrigins;
	}

	public function isBotPublic(): bool {
		return $this->isBotPublic;
	}

	public function requiresCodeGrant(): bool {
		return $this->requiresCodeGrant;
	}

	public function getTermsOfServiceUrl(): ?string {
		return $this->termsOfServiceUrl instanceof Undefined ? null : $this->termsOfServiceUrl;
	}

	public function getPrivacyPolicyUrl(): ?string {
		return $this->privacyPolicyUrl instanceof Undefined ? null : $this->privacyPolicyUrl;
	}

	public function getOwner(): ?UserInformation {
		return $this->owner instanceof Undefined ? null : $this->owner;
	}

	/**
	 * @deprecated
	 */
	public function getSummary(): string {
		return $this->summary;
	}

	public function getVerifyKey(): string {
		return $this->verifyKey;
	}

	public function getTeam(): ?TeamInformation {
		return $this->team;
	}

	public function getGuildId(): ?string {
		return $this->guildId instanceof Undefined ? null : $this->guildId;
	}

	public function getPrimarySkuId(): ?string {
		return $this->primarySkuId instanceof Undefined ? null : $this->primarySkuId;
	}

	public function getSlug(): ?string {
		return $this->slug instanceof Undefined ? null : $this->slug;
	}

	public function getCoverImageHash(): ?string {
		return $this->coverImageHash instanceof Undefined ? null : $this->coverImageHash;
	}

	public function getFlags(): ?int {
		return $this->flags instanceof Undefined ? null : $this->flags;
	}

	/**
	 * @return string[]|null
	 */
	public function getTags(): ?array {
		return $this->tags instanceof Undefined ? null : $this->tags;
	}

	public function getInstallParams(): ?InstallParamsInformation {
		return $this->installParams instanceof Undefined ? null : $this->installParams;
	}

	public function getCustomInstallUrl(): ?string {
		return $this->customInstallUrl instanceof Undefined ? null : $this->customInstallUrl;
	}

	/**
	 * @internal
	 */
	public static function parseInformation(array $data): ApplicationInformation {
		try {
			return new ApplicationInformation(
				id: $data["id"],
				name: $data["name"],
				iconHash: $data["icon"],
				description: $data["description"],
				rpcOrigins: $data["rpc_origins"] ?? Undefined::undefined(),
				isBotPublic: $data["bot_public"],
				requiresCodeGrant: $data["bot_require_code_grant"],
				termsOfServiceUrl: $data["terms_of_service_url"] ?? Undefined::undefined(),
				privacyPolicyUrl: $data["privacy_policy_url"] ?? Undefined::undefined(),
				owner: array_key_exists("owner", $data) ? UserInformation::parseUserInformation($data["owner"]) : Undefined::undefined(),
				summary: $data["summary"],
				verifyKey: $data["verify_key"],
				team: $data["team"] !== null ? TeamInformation::parseTeamInformation($data["team"]) : null,
				guildId: $data["guild_id"] ?? Undefined::undefined(),
				primarySkuId: $data["primary_sku_id"] ?? Undefined::undefined(),
				slug: $data["slug"] ?? Undefined::undefined(),
				coverImageHash: $data["cover_image"] ?? Undefined::undefined(),
				flags: $data["flags"] ?? Undefined::undefined(),
				tags: $data["tags"] ?? Undefined::undefined(),
				installParams: array_key_exists("install_params", $data) ? InstallParamsInformation::parseInstallParamsInformation($data["install_params"]) : Undefined::undefined(),
				customInstallUrl: $data["custom_install_url"] ?? Undefined::undefined()
			);
		} catch(Error $error) {
			throw new DataParseError($error->getMessage(), $error->getCode(), $error->getPrevious());
		}
	}
}