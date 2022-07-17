<?php

declare(strict_types=1);

namespace vixikhd\libdiscord\utils;

use pocketmine\color\Color;
use function dechex;
use function hexdec;
use function sprintf;
use function str_repeat;
use function strlen;

class ColorParser {
	public static function readColor(int $color): Color {
		$hex = dechex($color);
		$hex = str_repeat("0", 6 - strlen($hex));

		$i = 0;
		return new Color(
			hexdec($hex[$i++] . $hex[$i++]),
			hexdec($hex[$i++] . $hex[$i++]),
			hexdec($hex[$i++] . $hex[$i])
		);
	}

	public static function writeColor(Color $color): int {
		return hexdec(sprintf("%02x%02x%02x", $color->getR(), $color->getG(), $color->getB()));
	}
}