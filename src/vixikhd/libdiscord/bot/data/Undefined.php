<?php

declare(strict_types=1);

namespace vixikhd\libdiscord\bot\data;

final class Undefined {
	private function __construct() {}

	public static function undefined(): self {
		return new Undefined();
	}
}