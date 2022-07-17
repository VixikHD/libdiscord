<?php

declare(strict_types=1);

namespace vixikhd\libdiscord\bot\data\objects;

class PartialGuildInformation {
	public function __construct(
		private string $id,
		private string $name,
		private ?string $icon,
		private bool $isOwner,
		private string $permissions,
		private array $features
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

	public function isOwner(): bool {
		return $this->isOwner;
	}

	public function getPermissions(): string {
		return $this->permissions;
	}

	public function getFeatures(): array {
		return $this->features;
	}

	public static function parsePartialGuildInformation(array $data): PartialGuildInformation {
		return new PartialGuildInformation(
			id: $data["id"],
			name: $data["name"],
			icon: $data["icon"],
			isOwner: $data["owner"],
			permissions: $data["permissions"],
			features: $data["features"] // TODO
		);
	}
}