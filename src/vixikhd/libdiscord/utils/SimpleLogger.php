<?php

declare(strict_types=1);

namespace vixikhd\libdiscord\utils;

use function gmdate;

class SimpleLogger implements Logger {
	public function __construct(
		private bool $enabled = true
	) {}

	public function info(string $message): void {
		if($this->enabled) {
			echo "[" . gmdate("H:i:s") . "] [Info] $message\n";
		}
	}

	public function error(string $message): void {
		if($this->enabled) {
			echo "[" . gmdate("H:i:s") . "] [Error] $message\n";
		}
	}

	public function disable(): void {
		$this->enabled = false;
	}
}