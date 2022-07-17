<?php

declare(strict_types=1);

namespace vixikhd\libdiscord\bot\data\objects;

class TeamMemberInformation {
	public const MEMBERSHIP_STATE_INVITED = 1;
	public const MEMBERSHIP_STATE_ACCEPTED = 2;

	/**
	 * @param string[] $permissions
	 */
	public function __construct(
		private int $membershipState,
		private array $permissions,
		private string $teamId,
		private UserInformation $userInformation
	) {}

	public function getMembershipState(): int {
		return $this->membershipState;
	}

	/**
	 * @return string[]
	 */
	public function getPermissions(): array {
		return $this->permissions;
	}

	public function getTeamId(): string {
		return $this->teamId;
	}

	public function getUserInformation(): UserInformation {
		return $this->userInformation;
	}

	public static function parseTeamMemberInformation(array $data): TeamMemberInformation {
		return new TeamMemberInformation(
			membershipState: $data["membership_state"],
			permissions: $data["permissions"],
			teamId: $data["team_id"],
			userInformation: UserInformation::parseUserInformation($data["user"])
		);
	}
}