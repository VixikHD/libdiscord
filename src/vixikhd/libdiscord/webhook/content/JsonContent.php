<?php

declare(strict_types=1);

namespace vixikhd\libdiscord\webhook\content;

use vixikhd\libdiscord\curl\CurlOptions;
use function json_encode;

trait JsonContent {
	protected array $data = [];

	public function getData(): mixed {
		return json_encode($this->data);
	}

	public function getCurlOptions(): CurlOptions {
		return CurlOptions::jsonWebhookOptions();
	}
}