<?php

declare(strict_types=1);

namespace vixikhd\libdiscord\webhook\content;

use vixikhd\libdiscord\utils\AccessDeniedException;
use function strlen;

class MessageContent implements Content {
	use JsonContent;

	public const MESSAGE_LENGTH_LIMIT = 2000;

	public function __construct(string $message) {
		if(strlen($message) > self::MESSAGE_LENGTH_LIMIT) {
			throw new AccessDeniedException("Discord only allows messages with length up to 2000 chars.");
		}

		$this->data["content"] = $message;
	}
}