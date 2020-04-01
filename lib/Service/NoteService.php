<?php

namespace OCA\SkeletonApp\Service;

use Exception;
use OCP\AppFramework\Db\DoesNotExistException;
use OCP\AppFramework\Db\MultipleObjectsReturnedException;
use OCA\SkeletonApp\Db\Note;
use OCA\SkeletonApp\Db\Count;
use OCA\SkeletonApp\Db\NoteMapper;
use OCA\SkeletonApp\Db\CountMapper;
use DateTime;

class NoteService
{

	/** @var NoteMapper */
	private $mapper;
	private $countMapper;

	public function __construct(NoteMapper $mapper, CountMapper $countMapper)
	{
		$this->mapper = $mapper;
		$this->countMapper = $countMapper;
	}

	public function findAll(string $userId): array
	{
		return $this->mapper->findAll($userId);
	}

	private function handleException(Exception $e): void
	{
		if (
			$e instanceof DoesNotExistException ||
			$e instanceof MultipleObjectsReturnedException
		) {
			throw new NoteNotFound($e->getMessage());
		} else {
			throw $e;
		}
	}

	public function find($id, $userId)
	{
		try {
			return $this->mapper->find($id, $userId);

		// in order to be able to plug in different storage backends like files
		// for instance it is a good idea to turn storage related exceptions
		// into service related exceptions so controllers and service users
		// have to deal with only one type of exception
		} catch (Exception $e) {
			$this->handleException($e);
		}
	}

	public function create($title, $content, $userId)
	{
		$note = new Note();
		$note->setTitle($title);
		$note->setContent($content);
		$note->setUserId($userId);
		return $this->mapper->insert($note);
	}

	public function update($id, $title, $content, $userId)
	{
		try {
			$note = $this->mapper->find($id, $userId);
			$note->setTitle($title);
			$note->setContent($content);
			return $this->mapper->update($note);
		} catch (Exception $e) {
			$this->handleException($e);
		}
	}

	public function delete($id, $userId)
	{
		try {
			$note = $this->mapper->find($id, $userId);
			$this->mapper->delete($note);
			return $note;
		} catch (Exception $e) {
			$this->handleException($e);
		}
	}

	public function getNoteCount(string $userId): array
	{
		return $this->countMapper->getCountNote($userId);
	}

}
