<?php

declare(strict_types=1);

namespace vixikhd\libdiscord\bot\data\objects;

use function array_map;

class WelcomeScreenInformation {
	/**
	 * @param WelcomeScreenChannelInformation[] $welcomeChannels
	 */
	public function __construct(
		private ?string $description,
		private array $welcomeChannels
	) {}

	public function getDescription(): ?string {
		return $this->description;
	}

	/**
	 * @return WelcomeScreenChannelInformation[]
	 */
	public function getWelcomeChannels(): array {
		return $this->welcomeChannels;
	}

	public static function parseWelcomeScreenInformation(array $data): WelcomeScreenInformation {
		return new WelcomeScreenInformation(
			description: $data["description"],
			welcomeChannels: array_map(fn(array $welcomeChannelData) => WelcomeScreenChannelInformation::parseWelcomeScreenChannelInformation($welcomeChannelData), $data["welcome_channels"])
		);
	}
}