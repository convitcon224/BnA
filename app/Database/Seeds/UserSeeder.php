<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                "name" => "Dung",
                "password" => password_hash("123456",PASSWORD_BCRYPT),
                "email" => "test123456@gmail.com",
                "phone" => "0987654321",
                "avatar" => null,
            ],
            [
                "name" => "Trung",
                "password" => password_hash("1234567",PASSWORD_BCRYPT),
                "email" => "test1234567@gmail.com",
                "phone" => "09876543",
                "avatar" => null,
            ],
        ];

        $this->db->table("users")->insertBatch($data);
    }
}
