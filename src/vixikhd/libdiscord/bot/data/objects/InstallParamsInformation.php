<?php

declare(strict_types=1);

namespace vixikhd\libdiscord\bot\data\objects;

class InstallParamsInformation {
	/**
	 * @param string[] $scopes
	 */
	private function __construct(
		private array $scopes,
		private string $permissions
	) {}

	/**
	 * @return string[]
	 */
	public function getScopes(): array {
		return $this->scopes;
	}

	public function getPermissions(): string {
		return $this->permissions;
	}

	public static function parseInstallParamsInformation(array $data): InstallParamsInformation {
		return new InstallParamsInformation(
			scopes: $data["scopes"],
			permissions: $data["permissions"]
		);
	}
}