<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BukuModel;

class Buku extends BaseController
{
    protected $bukuModel;

    public function __construct()
    {
        $this->bukuModel = new BukuModel();
    }

    public function index()
    {
        if (!session()->get('logged_in')) {
            session()->setFlashdata('error', 'Login terlebih dahulu!');
            return redirect()->to(base_url('auth'));
        }

        $data['buku'] = $this->bukuModel->findAll();
        return view('dashboard', $data);
    }

    public function store()
    {
        $rules = [
            'judul'        => 'required|string',
            'penulis'      => 'required|string',
            'penerbit'     => 'required|string',
            'tahun_terbit' => 'required|numeric|greater_than[1800]|less_than[2024]',
        ];

        $errors = [
            'judul' => [
                'required' => 'Judul buku wajib diisi ya! 💕',
                'string'   => 'Judul buku harus berupa teks string yang valid.'
            ],
            'penulis' => [
                'required' => 'Nama penulis tidak boleh kosong! ✨',
                'string'   => 'Nama penulis harus berupa alfabet.'
            ],
            'penerbit' => [
                'required' => 'Nama penerbit harus diisi!',
                'string'   => 'Nama penerbit wajib berupa teks.'
            ],
            'tahun_terbit' => [
                'required'     => 'Tahun terbit wajib diisi!',
                'numeric'      => 'Tahun terbit harus diisi menggunakan angka, ya!',
                'greater_than' => 'Tahun terbit harus lebih besar dari tahun 1800! 📜',
                'less_than'    => 'Tahun terbit harus lebih kecil dari tahun 2024! ⏰'
            ]
        ];

        if (!$this->validate($rules, $errors)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->bukuModel->save([
            'judul'        => $this->request->getPost('judul'),
            'penulis'      => $this->request->getPost('penulis'),
            'penerbit'     => $this->request->getPost('penerbit'),
            'tahun_terbit' => $this->request->getPost('tahun_terbit'),
        ]);

        return redirect()->to(base_url('buku'));
    }

    public function delete($id)
    {
        if (!session()->get('logged_in')) {
            session()->setFlashdata('error', 'Login terlebih dahulu!');
            return redirect()->to(base_url('auth'));
        }

        $this->bukuModel->delete($id);
        return redirect()->to(base_url('buku'));
    }

    public function update($id)
    {
        if (!session()->get('logged_in')) {
            session()->setFlashdata('error', 'Login terlebih dahulu!');
            return redirect()->to(base_url('auth'));
        }

        $rules = [
            'judul'        => 'required|string',
            'penulis'      => 'required|string',
            'penerbit'     => 'required|string',
            'tahun_terbit' => 'required|numeric|greater_than[1800]|less_than[2024]',
        ];

        $errors = [
            'judul' => [
                'required' => 'Judul buku wajib diisi ya! 💕',
                'string'   => 'Judul buku harus berupa teks string.'
            ],
            'penulis' => [
                'required' => 'Nama penulis tidak boleh kosong! ✨',
                'string'   => 'Nama penulis harus berupa teks.'
            ],
            'penerbit' => [
                'required' => 'Nama penerbit harus diisi!',
                'string'   => 'Nama penerbit wajib berupa teks.'
            ],
            'tahun_terbit' => [
                'required'     => 'Tahun terbit wajib diisi!',
                'numeric'      => 'Tahun terbit harus diisi menggunakan angka, ya!',
                'greater_than' => 'Tahun terbit harus lebih besar dari tahun 1800! 📜',
                'less_than'    => 'Tahun terbit harus lebih kecil dari tahun 2024! ⏰'
            ]
        ];

        if (!$this->validate($rules, $errors)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->bukuModel->update($id, [
            'judul'        => $this->request->getPost('judul'),
            'penulis'      => $this->request->getPost('penulis'),
            'penerbit'     => $this->request->getPost('penerbit'),
            'tahun_terbit' => $this->request->getPost('tahun_terbit'),
        ]);

        return redirect()->to(base_url('buku'));
    }
}