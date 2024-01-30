<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableBooks extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'bookID' => [
                'type'           => 'VARCHAR',
                'constraint'     => '20',
                'unique'     => true,
            ],
            'title' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'author' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'book_condition' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'location' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'type' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'description' => [
                'type'       => 'TEXT',
            ],
            'type' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'book_cover' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'      => true,
            ],
            'type' => [
                'type'       => 'VARCHAR',
                'constraint' => '10',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('books');
    }

    public function down()
    {
        $this->forge->dropTable('books');
    }
}
