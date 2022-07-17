<?php

declare(strict_types=1);

namespace vixikhd\libdiscord\utils;

interface Logger {
	public function info(string $message): void;

	public function error(string $message): void;
}