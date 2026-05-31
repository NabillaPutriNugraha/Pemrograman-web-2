<?php

namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model {
    public function getBiodata() {
        return [
            'nama' => 'Nabilla Putri Nugraha',
            'nim' => '2410817220009'
        ];
    }
}