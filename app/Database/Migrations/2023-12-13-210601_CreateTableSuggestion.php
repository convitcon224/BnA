<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableSuggestion extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'suggestionID' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'user_phone' => [
                'type'       => 'VARCHAR',
                'constraint' => '30',
            ],
            'user_email' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'suggest_time' => [
                'type'       => 'DATETIME',
            ],
            'book_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'author_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'detail' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'      => true,
            ],
        ]);
        $this->forge->addKey('suggestionID', true);
        $this->forge->createTable('suggestion');
    }

    public function down()
    {
        $this->forge->dropTable('suggestion');
    }
}
