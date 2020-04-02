<?php

namespace OCA\SkeletonApp\Db;

use OCP\AppFramework\Db\DoesNotExistException;
use OCP\AppFramework\Db\QBMapper;
use OCP\DB\QueryBuilder\IQueryBuilder;
use OCP\IDBConnection;

class CountMapper extends QBMapper
{

	public function __construct(IDBConnection $db)
	{
<<<<<<< HEAD
		parent::__construct($db, 'notes_count', 'users', Count::class);
=======
		parent::__construct($db, 'notes_count', 'users',  Count::class);
>>>>>>> 24eaa13bde9dc2b7c14c65f0beaa9508cb454aba
	}

	/**
	 * @param int $id
	 * @param string $userId
	 * @return Note
	 * @throws \OCP\AppFramework\Db\MultipleObjectsReturnedException
	 * @throws DoesNotExistException
	 */
	public function find(int $id, string $userId): Count
	{
		/* @var $qb IQueryBuilder */
		$qb = $this->db->getQueryBuilder();
		$qb->select('*')
			->from('notes_count')
			->where($qb->expr()->eq('id', $qb->createNamedParameter($id, IQueryBuilder::PARAM_INT)))
			->andWhere($qb->expr()->eq('user_id', $qb->createNamedParameter($userId)));
		return $this->findEntity($qb);
	}

	/**
	 * @param string $userId
	 * @return array
	 */
	public function findAll(string $userId): array
	{
		/* @var $qb IQueryBuilder */
		$qb = $this->db->getQueryBuilder();
		$qb->select('*')
			->from('notes_count')
			->where($qb->expr()->eq('user_id', $qb->createNamedParameter($userId)));
		return $this->findEntities($qb);
	}

	// public function getCountNote(string $userId): array
	// {
	// 	/* @var $qb IQueryBuilder */
	// 	$qb = $this->db->getQueryBuilder();
	// 	$qb->select('note_count')
	// 		->from('notes_count')
	// 		->where($qb->expr()->eq('user_id', $qb->createNamedParameter($userId)))
	// 		->orderBy('note_count', 'DESC')
	// 		->setMaxResults(1);
	// 	return $this->findEntities($qb);
	// }
	public function getCountNote(string $userId): array
	{
		/* @var $qb IQueryBuilder */
		$qb = $this->db->getQueryBuilder();
<<<<<<< HEAD
		$qb->select('u.uid AS user', 'u.displayname AS dispName')
=======
		$qb->select('u.uid AS user')
>>>>>>> 24eaa13bde9dc2b7c14c65f0beaa9508cb454aba
			->selectAlias($qb->createFunction('COUNT(' . $qb->getColumnName('u.uid') . ')'), 'count')
			->from('users', 'u')
			->innerJoin('u', 'notes_count', 'c', $qb->expr()->eq('c.user_id', 'u.uid'));
		$qb->groupBy('u.uid')
			->orderBy('count', 'DESC');

		return $qb->execute()->fetchAll();
	}
<<<<<<< HEAD
=======



>>>>>>> 24eaa13bde9dc2b7c14c65f0beaa9508cb454aba
}
