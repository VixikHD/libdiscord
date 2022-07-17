<?php

declare(strict_types=1);

namespace vixikhd\libdiscord\bot;

class DiscordConstants {
	/**
	 * Discord api
	 * @see https://discord.com/developers/docs/reference
	 *
	 * @var int
	 */
	public const DISCORD_API_VERSION = 10;

	/**
	 * Url, where all the requests should be targeted
	 * @see https://discord.com/developers/docs/reference
	 *
	 * @var string
	 */
	public const REQUEST_PATH = "https://discord.com/api/v" . self::DISCORD_API_VERSION;
}