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

namespace OCA\SkeletonApp\Job;

use OCP\BackgroundJob\TimedJob;
use OCA\SkeletonApp\Service\CronService;
use OCP\AppFramework\Utility\ITimeFactory;

class CronTask extends TimedJob
{
	private $userId;
	private $cronService;

	public function __construct(ITimeFactory $time, $userId, CronService $service)
	{
		parent::__construct($time);
		$this->cronService = $service;
		$this->userId = $userId;

		parent::setInterval(60);
	}

	public static function run($userId)
	{
		$this->cronService->updateNoteCount($userId);
	}
}
