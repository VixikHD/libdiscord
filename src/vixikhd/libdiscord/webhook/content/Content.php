<?php

declare(strict_types=1);

namespace vixikhd\libdiscord\webhook\content;

use vixikhd\libdiscord\curl\CurlOptions;

interface Content {
	public function getData(): mixed;

	public function getCurlOptions(): CurlOptions;
}