<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CategoriesDebit extends Migration
{
	/**
   * categories_debit
   */
	public function up()
	{
		$this->forge->addField([
      'id'					=> ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
      'user_id'     => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
      'name'				=> ['type' => 'varchar', 'constraint' => 191],
      'created_at'	=> ['type' => 'datetime'],
      'updated_at'  => ['type' => 'datetime']
    ]);
    $this->forge->addKey('id', true);
    $this->forge->addForeignKey('user_id', 'users', 'id', 'RESTRICT', 'CASCADE');
    $this->forge->createTable('categories_debit', true);
	}

	public function down()
	{
		$this->forge->dropTable('categories_debit', true);
	}
}
