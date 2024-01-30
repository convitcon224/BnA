<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableEditHistory extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'editID' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'manager_ID' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'       => true,
            ],
            'action' => [
                'type'       => 'VARCHAR',
                'constraint' => '30',
            ],
            'book_id' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
            ],
            'time' => [
                'type'       => 'DATETIME',
            ],
        ]);
        $this->forge->addKey('editID', true);
        $this->forge->createTable('edit_history');
    }

    public function down()
    {
        $this->forge->dropTable('edit_history');
    }
}
