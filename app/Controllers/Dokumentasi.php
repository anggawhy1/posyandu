<?php

namespace App\Controllers;

use App\Models\DokumentasiModel;
use CodeIgniter\Controller;

class Dokumentasi extends Controller
{
    protected $dokumentasiModel;
    protected $perPage = 6; // Jumlah gambar per halaman

    public function __construct()
    {
        $this->dokumentasiModel = new DokumentasiModel();
    }

    // Halaman user melihat dokumentasi dengan pagination
    public function index()
    {
        $page = $this->request->getGet('page') ?? 1;
        $offset = ($page - 1) * $this->perPage;

        $data['dokumentasi'] = $this->dokumentasiModel->getDokumentasi($this->perPage, $offset);
        $data['totalData'] = $this->dokumentasiModel->countDokumentasi();
        $data['currentPage'] = $page;
        $data['perPage'] = $this->perPage;

        return view('dokumentasi', $data);
    }

    // Halaman admin untuk mengelola dokumentasi
    public function admin()
    {
        $data['dokumentasi'] = $this->dokumentasiModel->findAll();
        return view('admin/dokumentasi', $data);
    }

    // Proses tambah dokumentasi baru
    public function store()
    {
        $file = $this->request->getFile('gambar');
        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move('uploads/dokumentasi', $newName);

            $data = [
                'nama_dokumentasi' => $this->request->getPost('nama_dokumentasi'),
                'gambar' => $newName,
                'created_at' => date('Y-m-d H:i:s'),
            ];

            $this->dokumentasiModel->tambahDokumentasi($data);
        }

        return redirect()->to('/admin/dokumentasi')->with('success', 'Dokumentasi berhasil ditambahkan!');
    }

    // Hapus dokumentasi
    public function delete($id)
    {
        $this->dokumentasiModel->hapusDokumentasi($id);
        return redirect()->to('/admin/dokumentasi')->with('success', 'Dokumentasi berhasil dihapus!');
    }

    public function create()
    {
        return view('admin/tambah_dokumentasi'); // Buat view tambah_dokumentasi.php di folder views/admin/
    }

    public function edit($id)
    {
        $dokumentasiModel = new DokumentasiModel();
        $dokumentasi = $dokumentasiModel->find($id);

        if (!$dokumentasi) {
            return redirect()->to('/admin/dokumentasi')->with('error', 'Data tidak ditemukan!');
        }

        return view('admin/edit_dokumentasi', ['dokumentasi' => $dokumentasi]);
    }

    public function update($id)
    {
        $dokumentasiModel = new DokumentasiModel();
        $data = [
            'nama_dokumentasi' => $this->request->getPost('nama_dokumentasi'),
        ];

        // Cek apakah ada file gambar baru yang diunggah
        $gambar = $this->request->getFile('gambar');
        if ($gambar && $gambar->isValid() && !$gambar->hasMoved()) {
            // Hapus gambar lama
            $oldData = $dokumentasiModel->find($id);
            if (file_exists('uploads/dokumentasi/' . $oldData['gambar'])) {
                unlink('uploads/dokumentasi/' . $oldData['gambar']);
            }

            // Simpan gambar baru
            $newName = $gambar->getRandomName();
            $gambar->move('uploads/dokumentasi', $newName);
            $data['gambar'] = $newName;
        }

        $dokumentasiModel->update($id, $data);
        return redirect()->to('/admin/dokumentasi')->with('success', 'Dokumentasi berhasil diperbarui!');
    }
}
