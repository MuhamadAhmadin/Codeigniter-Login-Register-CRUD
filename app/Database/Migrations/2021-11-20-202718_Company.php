<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Company extends Migration
{
    public function up()
    {
        $this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true,
				'auto_increment' => true
			],
			'kode'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '25',
                'null'           => true,
			],
			'nama'      => [
                'type'           => 'VARCHAR',
                'constraint'     => '129',
                'null'           => true,
			],
			'direktur' => [
                'type'           => 'VARCHAR',
                'constraint'     => '129',
				'null'           => true,
			],
			'tahun' => [
                'type'           => 'VARCHAR',
                'constraint'     => '4',
				'null'           => true,
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP'
		]);

		// set Primary Key
		$this->forge->addKey('id', TRUE);

		$this->forge->createTable('companies', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('companies');
    }
}
