<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableManagers extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'managerID' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'manager_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'position' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'password' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'unique'     => true,
            ],
            'phone' => [
                'type'       => 'VARCHAR',
                'constraint' => '30',
                'unique'     => true,
            ],
            'avatar' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'      => true,
            ],
        ]);
        $this->forge->addKey('managerID', true);
        $this->forge->createTable('managers');
    }

    public function down()
    {
        $this->forge->dropTable('managers');
    }
}
