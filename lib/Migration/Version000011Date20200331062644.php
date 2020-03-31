<?php

declare(strict_types=1);

namespace OCA\SkeletonApp\Migration;

use Closure;
use OCP\DB\ISchemaWrapper;
use OCP\Migration\SimpleMigrationStep;
use OCP\Migration\IOutput;

class Version000011Date20200331062644 extends SimpleMigrationStep
{

	/**
	 * @param IOutput $output
	 * @param Closure $schemaClosure The `\Closure` returns a `ISchemaWrapper`
	 * @param array $options
	 * @return null|ISchemaWrapper
	 */
	public function changeSchema(IOutput $output, Closure $schemaClosure, array $options)
	{
		/** @var ISchemaWrapper $schema */
		$schema = $schemaClosure();

		if (!$schema->hasTable('notes_count')) {
			$table = $schema->createTable('notes_count');
			$table->addColumn('id', 'integer', [
				'autoincrement' => true,
				'notnull' => true,
			]);
			$table->addColumn('user_id', 'string', [
				'notnull' => true,
				'length' => 200,
			]);
			$table->addColumn('note_count', 'integer', [
				'notnull' => false,
			]);

			$table->addColumn('created_at', 'datetime', [
				'notnull' => false,
			]);
			$table->addColumn('Updated_at', 'datetime', [
				'notnull' => false,
			]);
			$table->setPrimaryKey(['id']);
		}
		return $schema;
	}
}
