<?php

/**
 * ownCloud - SkeletonApp
 *
 * This file is licensed under the Affero General Public License version 3 or
 * later. See the COPYING file.
 *
 * @author Patrizio Bekerle <patrizio@bekerle.com>
 * @copyright Patrizio Bekerle 2015
 */

namespace OCA\SkeletonApp\Service;

use OCA\SkeletonApp\Db\Count;
use OCA\SkeletonApp\Db\NoteMapper;
use OCA\SkeletonApp\Db\CountMapper;

class CronService
{
	private $userId;
	private $mapper;
	private $countMapper;

	public function __construct($appName, $userId, NoteMapper $mapper, CountMapper $countMapper)
	{
		$this->appName = $appName;
		$this->userId = $userId;
		$this->mapper = $mapper;
		$this->countMapper = $countMapper;
	}

	public function updateCount($userId, $count)
	{
		$noteCount = new Count();
		$noteCount->setUserId($userId);
		$noteCount->setNoteCount($count);
		$noteCount->setCreatedAt("2020-03-31 17:37:03");
		$noteCount->setUpdatedAt("2020-03-31 17:37:03");

		return $this->countMapper->insert($noteCount);
	}

	public function updateNoteCount(string $userId)
	{
		$count = $this->mapper->totalNoteCount($userId);
		return $this->updateCount($userId, $count);
	}
}


