<?php

declare(strict_types=1);

namespace vixikhd\libdiscord\curl;

use function curl_close;
use function curl_exec;
use function curl_getinfo;
use function curl_init;
use function curl_setopt;
use const CURLINFO_RESPONSE_CODE;
use const CURLOPT_FOLLOWLOCATION;
use const CURLOPT_HTTPHEADER;
use const CURLOPT_POST;
use const CURLOPT_RETURNTRANSFER;
use const CURLOPT_SSL_VERIFYHOST;
use const CURLOPT_SSL_VERIFYPEER;
use const CURLOPT_STDERR;
use const CURLOPT_URL;
use const CURLOPT_VERBOSE;

/**
 * @internal Class to simplify sending http requests
 */
final class Curl {
	/** @var array<int, mixed|callable> */
	private array $curlOptions = [];

	private bool|string $response;
	private int $responseCode;

	public function __construct() {
	}

	public function postType(): self {
		$this->curlOptions[CURLOPT_POST] = true;
		return $this;
	}

	public function setUrl(string $url): self {
		$this->curlOptions[CURLOPT_URL] = $url;
		return $this;
	}

	/**
	 * @param string[] $header
	 */
	public function setHttpHeader(array $header): self {
		$this->curlOptions[CURLOPT_HTTPHEADER] = $header;
		return $this;
	}

	public function followLocationHeaders(): self {
		$this->curlOptions[CURLOPT_FOLLOWLOCATION] = true;
		return $this;
	}

	public function disableVerification(): self {
		$this->curlOptions[CURLOPT_SSL_VERIFYPEER] = false;
		$this->curlOptions[CURLOPT_SSL_VERIFYHOST] = false;

		return $this;
	}

	/**
	 * @param resource $outputStream
	 */
	public function saveOutputInformation($outputStream = STDERR): self {
		$this->curlOptions[CURLOPT_VERBOSE] = true;
		$this->curlOptions[CURLOPT_STDERR] = $outputStream;
		return $this;
	}

	public function execute(): self {
		$curl = curl_init();
		foreach($this->curlOptions as $option => $value) {
			curl_setopt($curl, $option, $value);
		}

		// This makes curl_exec returns the result. Without this it would only return boolean.
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

		$this->response = curl_exec($curl);
		$this->responseCode = curl_getinfo($curl, CURLINFO_RESPONSE_CODE);

		curl_close($curl);

		return $this;
	}

	/**
	 * @return bool|string
	 */
	public function getResponse(): bool|string {
		return $this->response;
	}

	public function getResponseCode(): int {
		return $this->responseCode;
	}
}