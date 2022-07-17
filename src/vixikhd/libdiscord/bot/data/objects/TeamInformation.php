<?php

declare(strict_types=1);

namespace vixikhd\libdiscord\bot\data\objects;

use function array_map;

class TeamInformation {
	/**
	 * @param TeamMemberInformation[] $members
	 */
	public function __construct(
		private ?string $icon,
		private string $id,
		private array $members,
		private string $name,
		private string $ownerUserId
	) {}

	public function getIcon(): ?string {
		return $this->icon;
	}

	public function getId(): string {
		return $this->id;
	}

	public function getMembers(): array {
		return $this->members;
	}

	public function getName(): string {
		return $this->name;
	}

	public function getOwnerUserId(): string {
		return $this->ownerUserId;
	}

	public static function parseTeamInformation(array $data): TeamInformation {
		return new TeamInformation(
			icon: $data["icon"],
			id: $data["id"],
			members: array_map(fn(array $teamMemberData) => TeamMemberInformation::parseTeamMemberInformation($teamMemberData), $data["members"]),
			name: $data["name"],
			ownerUserId: $data["owner_user_id"]
		);
	}
}