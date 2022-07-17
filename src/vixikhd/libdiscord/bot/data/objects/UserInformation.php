<?php

declare(strict_types=1);

namespace vixikhd\libdiscord\bot\data\objects;

use pocketmine\color\Color;
use vixikhd\libdiscord\bot\data\Undefined;
use vixikhd\libdiscord\utils\ColorParser;
use function is_int;

class UserInformation {
	public function __construct(
		private string $id,
		private string $username,
		private string $discordTag,
		private ?string $avatar,
		private Undefined|bool $isBot,
		private Undefined|bool $isSystemBot,
		private Undefined|bool $hasTwoFactorEnabled,
		private Undefined|string|null $banner,
		private Undefined|Color|null $accentColor,
		private Undefined|string $locale,
		private Undefined|bool $hasVerifiedEmail,
		private Undefined|bool $email,
		private Undefined|int $flags,
		private Undefined|int $premiumType,
		private Undefined|int $publicFlags
	) {}

	public function getId(): string {
		return $this->id;
	}

	public function getUsername(): string {
		return $this->username;
	}

	public function getDiscordTag(): string {
		return $this->discordTag;
	}

	public function getAvatar(): ?string {
		return $this->avatar;
	}

	public function isBot(): ?bool {
		return $this->isBot instanceof Undefined ? null : $this->isBot;
	}

	public function isSystemBot(): ?bool {
		return $this->isSystemBot instanceof Undefined ? null : $this->isSystemBot;
	}

	public function getHasTwoFactorEnabled(): ?bool {
		return $this->hasTwoFactorEnabled instanceof Undefined ? null : $this->hasTwoFactorEnabled;
	}

	public function getBanner(): Undefined|string|null {
		return $this->banner;
	}

	public function getAccentColor(): Undefined|Color|null {
		return $this->accentColor;
	}

	public function getLocale(): ?string {
		return $this->locale instanceof Undefined ? null : $this->locale;
	}

	public function hasVerifiedEmail(): ?bool {
		return $this->hasVerifiedEmail instanceof Undefined ? null : $this->hasVerifiedEmail;
	}

	public function getEmail(): ?bool {
		return $this->email instanceof Undefined ? null : $this->email;
	}

	public function getFlags(): ?int {
		return $this->flags instanceof Undefined ? null : $this->flags;
	}

	public function getPremiumType(): ?int {
		return $this->premiumType instanceof Undefined ? null : $this->premiumType;
	}

	public function getPublicFlags(): ?int {
		return $this->publicFlags instanceof Undefined ? null : $this->publicFlags;
	}

	public static function parseUserInformation(array $data): UserInformation {
		return new UserInformation(
			id: $data["id"],
			username: $data["username"],
			discordTag: $data["discriminator"],
			avatar: $data["avatar"],
			isBot: $data["bot"] ?? Undefined::undefined(),
			isSystemBot: $data["isSystemBot"] ?? Undefined::undefined(),
			hasTwoFactorEnabled: $data["mfa_enabled"] ?? Undefined::undefined(),
			banner: $data["banner"] ?? Undefined::undefined(),
			accentColor: (isset($data["accent_color"]) && is_int($data["accent_color"])) ?
				ColorParser::readColor($data["accent_color"]) :
				($data["accent_color"] ?? Undefined::undefined()),
			locale: $data["locale"] ?? Undefined::undefined(),
			hasVerifiedEmail: $data["verified"] ?? Undefined::undefined(),
			email: $data["email"] ?? Undefined::undefined(),
			flags: $data["flags"] ?? Undefined::undefined(),
			premiumType: $data["premium_type"] ?? Undefined::undefined(),
			publicFlags: $data["public_flags"] ?? Undefined::undefined()
		);
	}
}