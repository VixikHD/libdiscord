<?php

declare(strict_types=1);

namespace vixikhd\libdiscord\webhook\content;

use vixikhd\libdiscord\utils\AccessDeniedException;
use vixikhd\libdiscord\webhook\embed\Embed;
use function count;

class EmbedsContent implements Content {
	use JsonContent;

	public function __construct(Embed ...$embeds) {
		if (count($embeds) > 10) {
			throw new AccessDeniedException("Discord only allows maximum of 10 embeds");
		}

		foreach($embeds as $embed) {
			$this->data["embeds"][] = $embed->getEmbedData();
		}
	}
}