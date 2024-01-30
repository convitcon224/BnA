<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableBorrowingDetails extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'borrowingID' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'session_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'       => true,
            ],
            'return_date' => [
                'type' => 'DATETIME',
            ],
            'condition_after' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'fine' => [
                'type'       => 'DECIMAL',
                'constraint' => '19,4',
                'default'    => 0.0000,
            ],
            'note' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'      => true,
            ],
        ]);
        $this->forge->addKey('borrowingID', true);
        $this->forge->createTable('borrowing_detail');
    }

    public function down()
    {
        $this->forge->dropTable('borrowing_detail');
    }
}
