<?php

namespace OCA\SkeletonApp\Controller;

use OCP\IRequest;
use OCP\AppFramework\Http\DataResponse;
use OCP\AppFramework\Controller;
use OCA\SkeletonApp\Service\NoteService;

class NoteController extends Controller
{
	use Errors;

	/** @var NoteService */
	private $service;

	/** @var string */
	private $userId;

	public function __construct(
		$appName,
		IRequest $request,
		NoteService $service,
		$userId
	) {
		parent::__construct($appName, $request);
		$this->service = $service;
		$this->userId = $userId;
	}

	/**
	 * @NoAdminRequired
	 */
	public function index(): DataResponse
	{
		return new DataResponse($this->service->findAll($this->userId));
	}

	/**
	 * @NoAdminRequired
	 */
	public function show(int $id): DataResponse
	{
		return $this->handleNotFound(function () use ($id) {
			return $this->service->find($id, $this->userId);
		});
	}

	/**
	 * @NoAdminRequired
	 */
	public function create(string $title, string $content): DataResponse
	{
		return new DataResponse($this->service->create(
			$title,
			$content,
			$this->userId
		));
	}

	/**
	 * @NoAdminRequired
	 */
	public function update(
		int $id,
		string $title,
		string $content
	): DataResponse {
		return $this->handleNotFound(function () use ($id, $title, $content) {
			return $this->service->update($id, $title, $content, $this->userId);
		});
	}

	/**
	 * @NoAdminRequired
	 */
	public function destroy(int $id): DataResponse
	{
		return $this->handleNotFound(function () use ($id) {
			return $this->service->delete($id, $this->userId);
		});
	}
}
