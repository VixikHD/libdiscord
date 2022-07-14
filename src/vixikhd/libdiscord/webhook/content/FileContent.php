<?php

declare(strict_types=1);

namespace vixikhd\libdiscord\webhook\content;

use CURLFile;
use vixikhd\libdiscord\curl\CurlOptions;
use vixikhd\libdiscord\utils\AccessDeniedException;
use function basename;
use function curl_file_create;
use function is_file;
use function mime_content_type;

class FileContent implements Content {
	private CURLFile $file;
	
	public function __construct(string $filePath) {
		if(!is_file($filePath)) {
			throw new AccessDeniedException("Provided file path ($filePath) is invalid.");
		}
		
		$this->file = curl_file_create($filePath, mime_content_type($filePath),  basename($filePath));
	}

	public function getCurlOptions(): CurlOptions {
		return CurlOptions::formDataWebhookOptions();
	}

	public function getData(): mixed {
		return $this->file;
	}
}