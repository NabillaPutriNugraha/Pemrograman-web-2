<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;

class Home extends BaseController
{
    protected $mahasiswaModel;

    public function __construct() {
        $this->mahasiswaModel = new MahasiswaModel();
    }

    public function index()
    {
        $data = $this->mahasiswaModel->getBiodata();
        return view('beranda', $data);
    }

    public function profil() {
        $data = $this->mahasiswaModel->getBiodata();
        return view('profil', $data);
    }
}
