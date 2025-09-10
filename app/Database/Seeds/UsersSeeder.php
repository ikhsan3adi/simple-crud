<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsersSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'username' => 'admin123',
            'password' => md5('admin123'),
        ];

        $this->db->table('users')->insert($data);
    }
}
