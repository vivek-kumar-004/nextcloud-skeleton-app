<?php

namespace OCA\SkeletonApp\Db;

use JsonSerializable;
use OCP\AppFramework\Db\Entity;

class Count extends Entity implements JsonSerializable
{

	protected $noteCount;
	protected $userId;
	protected $createdAt;
	protected $updatedAt;

	public function jsonSerialize(): array
	{
		return [
			'note_count' => $this->noteCount,
		];
	}
}
