<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CategoriesCredit extends Migration
{
  /**
   * categories_credit
   */
	public function up()
	{
		$this->forge->addField([
      'id'					=> ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
      'user_id'     => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
      'name'				=> ['type' => 'varchar', 'constraint' => 191],
      'created_at'	=> ['type' => 'bigint', 'null' => true],
      'updated_at'  => ['type' => 'bigint', 'null' => true]
    ]);
    $this->forge->addKey('id', true);
    $this->forge->addForeignKey('user_id', 'users', 'id', 'RESTRICT', 'CASCADE');
    $this->forge->createTable('categories_credit', true);
	}

	public function down()
	{
		$this->forge->dropTable('categories_credit', true);
	}
}
