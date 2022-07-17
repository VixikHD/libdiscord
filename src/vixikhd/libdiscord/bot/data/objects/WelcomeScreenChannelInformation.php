<?php

declare(strict_types=1);

namespace vixikhd\libdiscord\bot\data\objects;

class WelcomeScreenChannelInformation {
	private function __construct(
		private string $channelId,
		private string $description,
		private ?string $emojiId,
		private ?string $emojiName
	) {}

	public function getChannelId(): string {
		return $this->channelId;
	}

	public function getDescription(): string {
		return $this->description;
	}

	public function getEmojiId(): ?string {
		return $this->emojiId;
	}

	public function getEmojiName(): ?string {
		return $this->emojiName;
	}

	public static function parseWelcomeScreenChannelInformation(array $data): WelcomeScreenChannelInformation {
		return new WelcomeScreenChannelInformation(
			channelId: $data["channel_id"],
			description: $data["description"],
			emojiId: $data["emoji_id"],
			emojiName: $data["emoji_name"]
		);
	}
}