<?php

declare(strict_types=1);

namespace vixikhd\libdiscord\bot\guild;

use vixikhd\libdiscord\bot\data\objects\GuildInformation;

/**
 * Guild in Discord represent an isolated collection of users and channels, and is often
 * referred to as "servers in the UI
 *
 * @see https://discord.com/developers/docs/resources/guild
 */
class Guild {
	public function __construct(
		private GuildInformation $guildInformation
	) {}

	public function getId(): string {
		return $this->guildInformation->getId();
	}

	public function getGuildInformation(): GuildInformation {
		return $this->guildInformation;
	}
}