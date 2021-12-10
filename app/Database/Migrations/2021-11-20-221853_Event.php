<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Event extends Migration
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
			'judul'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
                'null'           => true,
			],
			'deskripsi'      => [
                'type'           => 'TEXT',
                'null'           => true,
			],
            'tanggal' => [
                'type'           => 'DATE',
                'null'           => true,
            ],
			'visible' => [
                'type'           => 'INT',
                'constraint'     => '11',
				'default'           => 1,
			],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP'
		]);

		// set Primary Key
		$this->forge->addKey('id', TRUE);

		$this->forge->createTable('events', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('events');
    }
}
