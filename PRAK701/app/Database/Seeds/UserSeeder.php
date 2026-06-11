<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'username' => 'nabilla',
            'email'    => 'admin@gmail.com',
            // Kita enkripsi passwordnya pakai password_hash demi keamanan
            'password' => password_hash('admin123', PASSWORD_DEFAULT),
        ];

        // Masukkan data ke tabel user
        $this->db->table('user')->insert($data);
    }
}