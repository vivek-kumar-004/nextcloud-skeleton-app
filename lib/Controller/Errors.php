<?php

namespace OCA\SkeletonApp\Controller;

use Closure;
use OCP\AppFramework\Http;
use OCP\AppFramework\Http\DataResponse;
use OCA\SkeletonApp\Service\NoteNotFound;

trait Errors
{

	protected function handleNotFound(Closure $callback): DataResponse
	{
		try {
			return new DataResponse($callback());
		} catch (NoteNotFound $e) {
			$message = ['message' => $e->getMessage()];
			return new DataResponse($message, Http::STATUS_NOT_FOUND);
		}
	}
}
