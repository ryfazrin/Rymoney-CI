<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Credit extends Migration
{
  /**
   * credit
  */
	public function up()
	{
		$this->forge->addField([
      'id'					=> ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
      'user_id'     => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
      'category_id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
      'nominal'			=> ['type' => 'bigint', 'constraint' => 11],
      'description' => ['type' => 'text', 'null' => true],
      'credit_date' => ['type' => 'datetime'],
      'created_at'	=> ['type' => 'datetime'],
      'updated_at'  => ['type' => 'datetime']
    ]);
    $this->forge->addKey('id', true);
    $this->forge->addForeignKey('user_id', 'users', 'id', 'RESTRICT', 'CASCADE');
    $this->forge->addForeignKey('category_id', 'categories_credit', 'id', 'RESTRICT', 'CASCADE');
    $this->forge->createTable('credit', true);
	}

	public function down()
	{
		$this->forge->dropTable('credit', true);
	}
}