<?php

declare(strict_types=1);

namespace vixikhd\libdiscord\bot;

class GetRequestPathConstants {
	// Guild
	public const GUILD = "/guilds/{guild.id}";
	public const GUILD_PREVIEW = "/guilds/{guild.preview}";
	public const GUILD_CHANNELS = "/guilds/{guild.id}/channels";
	public const LIST_ACTIVE_GUILD_THREADS = "/guilds/{guild.id}/threads/active";
	public const GUILD_MEMBER = "/guilds/{guild.id}/members/{user.id}";
	public const LIST_GUILD_MEMBERS = "/guilds/{guild.id}/members";
	public const SEARCH_GUILD_MEMBERS = "/guilds/{guild.id}/members/search";
	public const GUILD_BANS = "/guilds/{guild.id}/bans";
	public const GUILD_BAN = "/guilds/{guild.id}/ban/{user.id}";
	public const GUILD_ROLES = "/guilds/{guild.id}/roles";
	public const GUILD_PRUNE_COUNT = "/guilds/{guild.id}/prune";
	public const GUILD_VOICE_REGIONS = "/guilds/{guild.id}/regions";
	public const GUILD_INVITES = "/guilds/{guild.id}/invites";
	public const GUILD_INTEGRATIONS  = "/guilds/{guild.id}/integrations";
	public const GUILD_WIDGET_SETTINGS = "/guilds/{guild.id}/widget";
	public const GUILD_WIDGET = "/guilds/{guild.id}/widget.json";
	public const GUILD_VANITY_URL = "/guilds/{guild.id}/vanity-url";
	public const GUILD_WIDGET_IMAGE = "/guilds/{guild.id}/widget.png";
	public const GUILD_WELCOME_SCREEN = "/guilds/{guild.id}/welcome-screen";

	// User
	public const CURRENT_USER = "/users/@me";
	public const USER = "/users/{user.id}";
	public const CURRENT_USER_GUILDS = "/users/@me/guilds";
	public const CURRENT_USER_GUILD_MEMBER = "users/@me/guilds/{guild.id}/member";
	public const USER_CONNECTIONS = "users/@me/connections";

	// OAuth2
	public const CURRENT_BOT_APPLICATION_INFORMATION = "/oauth2/applications/@me";
	public const CURRENT_AUTHORIZATION_INFORMATION = "/oauth2/@me";
}