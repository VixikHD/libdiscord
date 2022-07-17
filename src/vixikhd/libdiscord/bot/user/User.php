<?php

declare(strict_types=1);

namespace vixikhd\libdiscord\bot\user;

use vixikhd\libdiscord\bot\data\objects\UserInformation;

/**
 * Users in Discord are generally considered the base entity. Users can spawn across
 * the entire platform, be members of guilds, participate in text and voice chat, and
 * much more. Users are separated by a distinction of "bot" vs "normal." Although they
 * are similar, bot users are automated users that are "owned" by another user. Unlike
 * normal users, bot users do not have a limitation on the number of Guilds they
 * can be a part of.
 *
 * @see https://discord.com/developers/docs/resources/user
 */
class User {
	public function __construct(
		private UserInformation $userInformation
	) {}

	public function getId(): string {
		return $this->userInformation->getId();
	}

	public function getUsername(): string {
		return $this->userInformation->getUsername();
	}

	public function getDiscordTag(): string {
		return $this->userInformation->getDiscordTag();
	}

	public function getUserInformation(): UserInformation {
		return $this->userInformation;
	}
}