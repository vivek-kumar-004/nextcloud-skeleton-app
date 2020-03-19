<?php

namespace OCA\SkeletonApp\Controller;

use OCP\IRequest;
use OCP\AppFramework\Controller;

use function Sabre\Uri\parse;

class TimeController extends Controller
{

	public function __construct($AppName, IRequest $request)
	{
		parent::__construct($AppName, $request);
		$this->AppName = $AppName;
	}

	/**
	 * @NoAdminRequired
	 */
	public function showTime()
	{
		$date = date("Y-m-d h:i:sa");
		return $date;
	}
}

