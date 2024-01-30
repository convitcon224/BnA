<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ActivateSeeder extends Seeder
{
    public function run()
    {
        $this->call("UserSeeder");
    }
}
