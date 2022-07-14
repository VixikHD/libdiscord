<?php

declare(strict_types=1);

namespace vixikhd\libdiscord\webhook;

use vixikhd\libdiscord\webhook\content\Content;
use function curl_close;
use function curl_exec;
use function curl_init;
use function curl_setopt;
use const CURLOPT_POSTFIELDS;
use const CURLOPT_URL;

class Webhook {
	public function __construct(
		protected string $url
	) {}

	public function send(Content $content): void {
		$curl = curl_init();

		curl_setopt($curl, CURLOPT_URL, $this->url);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $content->getData());

		$content->getCurlOptions()->apply($curl);

		curl_exec($curl);
		curl_close($curl);
		unset($curl);
	}
}