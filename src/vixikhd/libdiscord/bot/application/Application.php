<?php

declare(strict_types=1);

namespace vixikhd\libdiscord\bot\application;

use vixikhd\libdiscord\bot\data\objects\ApplicationInformation;

class Application {
	public function __construct(
		private ApplicationInformation $applicationInformation
	) {}

	public function getName(): string {
		return $this->applicationInformation->getName();
	}

	public function getId(): string {
		return $this->applicationInformation->getId();
	}

	public function getApplicationInformation(): ApplicationInformation {
		return $this->applicationInformation;
	}
}