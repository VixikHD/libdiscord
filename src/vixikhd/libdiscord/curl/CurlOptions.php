<?php

declare(strict_types=1);

namespace vixikhd\libdiscord\curl;

use CurlHandle;
use function curl_setopt;
use const CURLOPT_CONNECTTIMEOUT;
use const CURLOPT_HTTPHEADER;
use const CURLOPT_POST;
use const CURLOPT_RETURNTRANSFER;
use const CURLOPT_SSL_VERIFYHOST;
use const CURLOPT_SSL_VERIFYPEER;
use const CURLOPT_TIMEOUT;

final class CurlOptions {
	/**
	 * @param array<int, mixed> $options
	 */
	public function __construct(
		private array $options = []
	) {}

	public static function jsonWebhookOptions(): CurlOptions {
		return new CurlOptions([
			CURLOPT_TIMEOUT => 5,
			CURLOPT_CONNECTTIMEOUT => 5,
			CURLOPT_POST => 1,
			CURLOPT_HTTPHEADER => ["Content-Type: application/json"],
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_SSL_VERIFYHOST => false,
			CURLOPT_SSL_VERIFYPEER => false
		]);
	}

	public static function formDataWebhookOptions(): CurlOptions {
		return new CurlOptions([
			CURLOPT_TIMEOUT => 5,
			CURLOPT_CONNECTTIMEOUT => 5,
			CURLOPT_POST => 1,
			CURLOPT_HTTPHEADER => ["Content-Type: application/json"],
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_SSL_VERIFYHOST => false,
			CURLOPT_SSL_VERIFYPEER => false
		]);
	}

	public function apply(CurlHandle $curlHandle): void {
		foreach($this->options as $option => $value) {
			curl_setopt($curlHandle, $option, $value);
		}
	}
}