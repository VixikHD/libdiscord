<?php

declare(strict_types=1);

namespace vixikhd\libdiscord\bot\data\objects;

use vixikhd\libdiscord\bot\data\Undefined;

class GuildInformation {
	public function __construct(
		private string $id,
		private string $name,
		private ?string $icon,
		private Undefined|string|null $iconHash,
		private ?string $splash,
		private ?string $discoverySplash,
		private string $ownerId,
		private ?string $afkChannelId,
		private int $afkTimeout,
		private Undefined|bool $widgetEnabled,
		private Undefined|string|null $widgetChannelId,
		private int $verificationLevel,
		private int $defaultMessageNotifications,
		private int $explicitContentFilterLevel,
		private array $roles, // TODO
		private array $emojis, // TODO
		private array $features, // TODO
		private int $mfaLevel,
		private ?string $applicationId,
		private ?string $systemChannelId,
		private int $systemChannelFlags,
		private ?string $rulesChannelId,
		private Undefined|int|null $maxPresences,
		private Undefined|int $maxMembers,
		private ?string $vanityUrlCode,
		private ?string $description,
		private ?string $banner,
		private int $premiumTier,
		private Undefined|int $premiumSubscriptionCount,
		private string $preferredLocale,
		private ?string $publicUpdatesChannelId,
		private Undefined|int $maxVideoChannelUsers,
		private Undefined|int $approximateMemberCount,
		private Undefined|int $approximatePresenceCount,
		private Undefined|WelcomeScreenChannelInformation $welcomeScreen,
		private int $nsfwLevel,
		private Undefined|array $stickers,
		private bool $premiumProgressBarEnabled
	) {}

	public function getId(): string {
		return $this->id;
	}

	public function getName(): string {
		return $this->name;
	}

	public function getIcon(): ?string {
		return $this->icon;
	}

	public function getIconHash(): Undefined|string|null {
		return $this->iconHash;
	}

	public function getSplash(): ?string {
		return $this->splash;
	}

	public function getDiscoverySplash(): ?string {
		return $this->discoverySplash;
	}

	public function getOwnerId(): string {
		return $this->ownerId;
	}

	public function getAfkChannelId(): ?string {
		return $this->afkChannelId;
	}

	public function getAfkTimeout(): int {
		return $this->afkTimeout;
	}

	public function getWidgetEnabled(): ?bool {
		return $this->widgetEnabled instanceof Undefined ? null : $this->widgetEnabled;
	}

	public function getWidgetChannelId(): Undefined|string|null {
		return $this->widgetChannelId;
	}

	public function getVerificationLevel(): int {
		return $this->verificationLevel;
	}

	public function getDefaultMessageNotifications(): int {
		return $this->defaultMessageNotifications;
	}

	public function getExplicitContentFilterLevel(): int {
		return $this->explicitContentFilterLevel;
	}

	public function getRoles(): array {
		return $this->roles;
	}

	public function getEmojis(): array {
		return $this->emojis;
	}

	public function getFeatures(): array {
		return $this->features;
	}

	public function getMfaLevel(): int {
		return $this->mfaLevel;
	}

	public function getApplicationId(): ?string {
		return $this->applicationId;
	}

	public function getSystemChannelId(): ?string {
		return $this->systemChannelId;
	}

	public function getSystemChannelFlags(): int {
		return $this->systemChannelFlags;
	}

	public function getRulesChannelId(): ?string {
		return $this->rulesChannelId;
	}

	public function getMaxPresences(): Undefined|int|null {
		return $this->maxPresences;
	}

	public function getMaxMembers(): ?int {
		return $this->maxMembers instanceof Undefined ? null : $this->maxMembers;
	}

	public function getVanityUrlCode(): ?string {
		return $this->vanityUrlCode;
	}

	public function getDescription(): ?string {
		return $this->description;
	}

	public function getBanner(): ?string {
		return $this->banner;
	}

	public function getPremiumTier(): int {
		return $this->premiumTier;
	}

	public function getPremiumSubscriptionCount(): ?int {
		return $this->premiumSubscriptionCount instanceof Undefined ? null : $this->premiumSubscriptionCount;
	}

	public function getPreferredLocale(): string {
		return $this->preferredLocale;
	}

	public function getPublicUpdatesChannelId(): ?string {
		return $this->publicUpdatesChannelId;
	}

	public function getMaxVideoChannelUsers(): ?int {
		return $this->maxVideoChannelUsers instanceof Undefined ? null : $this->maxVideoChannelUsers;
	}

	public function getApproximateMemberCount(): ?int {
		return $this->approximateMemberCount instanceof Undefined ? null : $this->approximateMemberCount;
	}

	public function getApproximatePresenceCount(): ?int {
		return $this->approximatePresenceCount instanceof Undefined ? null : $this->approximatePresenceCount;
	}

	public function getWelcomeScreen(): ?WelcomeScreenChannelInformation {
		return $this->welcomeScreen instanceof Undefined ? null : $this->welcomeScreen;
	}

	public function getNsfwLevel(): int {
		return $this->nsfwLevel;
	}

	public function getStickers(): ?array {
		return $this->stickers instanceof Undefined ? null : $this->stickers;
	}

	public function getPremiumProgressBarEnabled(): bool {
		return $this->premiumProgressBarEnabled;
	}

	public static function parseGuildInformation(array $data): GuildInformation {
		return new GuildInformation(
			id: $data["id"],
			name: $data["name"],
			icon: $data["icon"],
			iconHash: $data["icon_hash"] ?? Undefined::undefined(),
			splash: $data["splash"],
			discoverySplash: $data["discovery_splash"],
			ownerId: $data["owner_id"],
			afkChannelId: $data["afk_channel_id"],
			afkTimeout: $data["afk_timeout"],
			widgetEnabled: $data["widget_enabled"] ?? Undefined::undefined(),
			widgetChannelId: $data["widget_channel_id"] ?? Undefined::undefined(),
			verificationLevel: $data["verification_level"],
			defaultMessageNotifications: $data["default_message_notifications"],
			explicitContentFilterLevel: $data["explicit_content_filter"],
			roles: $data["roles"], // todo
			emojis: $data["emojis"], // todo
			features: $data["features"], // todo
			mfaLevel: $data["mfa_level"],
			applicationId: $data["application_id"],
			systemChannelId: $data["system_channel_id"],
			systemChannelFlags: $data["system_channel_flags"],
			rulesChannelId: $data["rules_channel_id"],
			maxPresences: $data["max_presences"] ?? Undefined::undefined(),
			maxMembers: $data["max_members"] ?? Undefined::undefined(),
			vanityUrlCode: $data["vanity_url_code"],
			description: $data["description"],
			banner: $data["banner"],
			premiumTier: $data["premium_tier"],
			premiumSubscriptionCount: $data["premium_subscription_count"] ?? Undefined::undefined(),
			preferredLocale: $data["preferred_locale"],
			publicUpdatesChannelId: $data["public_updates_channel_id"],
			maxVideoChannelUsers: $data["max_video_channel_users"] ?? Undefined::undefined(),
			approximateMemberCount: $data["approximate_member_count"] ?? Undefined::undefined(),
			approximatePresenceCount: $data["approximate_presence_count"] ?? Undefined::undefined(),
			welcomeScreen: $data["welcome_screen"] ?? Undefined::undefined(),
			nsfwLevel: $data["nsfw_level"],
			stickers: $data["stickers"] ?? Undefined::undefined(),
			premiumProgressBarEnabled: $data["premium_progress_bar_enabled"],
		);
	}
}