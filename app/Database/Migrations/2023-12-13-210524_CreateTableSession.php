<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableSession extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'sessionID' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'manager_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'       => true,
            ],
            'deposit' => [
                'type'       => 'DECIMAL',
                'constraint' => '19,4',
                'default'    => 0.0000,
            ],
            'time' => [
                'type'       => 'DATETIME',
            ],
            'book_condition' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'status' => [
                'type'       => 'VARCHAR',
                'constraint' => '30',
            ],
        ]);
        $this->forge->addKey('sessionID', true);
        $this->forge->createTable('session');
    }

    public function down()
    {
        $this->forge->dropTable('session');
    }
}
