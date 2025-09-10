<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\MahasiswaModel;

class MahasiswaController extends ResourceController
{
    protected MahasiswaModel $mahasiswaModel;
    protected int $perPage = 10;

    public function __construct()
    {
        $this->mahasiswaModel = new MahasiswaModel();
    }

    public function index()
    {
        $keyword = request()->getVar('keyword');
        if ($keyword) {
            $mahasiswa = $this->mahasiswaModel
                ->search($keyword)
                ->paginate($this->perPage, 'mahasiswa');
        } else {
            $mahasiswa = $this->mahasiswaModel
                ->paginate($this->perPage, 'mahasiswa');
        }

        $data = [
            'title' => 'Data Mahasiswa',
            'content' => view('list-mahasiswa', [
                'pager' => $this->mahasiswaModel->pager,
                'perPage' => $this->perPage,
                'currentPage' => request()->getVar('page_mahasiswa') ?? 1,
                'mahasiswa' => $mahasiswa,
            ]),
        ];

        return view('template', $data);
    }

    public function show($nim = null)
    {
        $mahasiswa = $this->mahasiswaModel->where('nim', $nim)->first();

        if (!$mahasiswa) {
            return redirect()->to('/mahasiswa')
                ->with('msg', 'Data mahasiswa tidak ditemukan.')
                ->with('error', true);
        }

        $data = [
            'title' => 'Detail Mahasiswa',
            'content' => view('detail-mahasiswa', ['mahasiswa' => $mahasiswa]),
        ];

        return view('template', $data);
    }

    public function new()
    {
        $data = [
            'title' => 'Form Tambah Mahasiswa',
            'content' => view('form-mahasiswa'),
        ];

        return view('template', $data);
    }

    public function create()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama' => 'required|min_length[3]|max_length[100]',
            'nim' => 'required|numeric|is_unique[biodata_mahasiswa.nim]|max_length[20]',
            'jenis_kelamin' => 'required|in_list[L,P]',
            'tanggal_lahir' => 'required|valid_date',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()
                ->with('msg', $validation->getErrors())
                ->with('error', true);
        }

        $this->mahasiswaModel->save([
            'nama' => request()->getPost('nama'),
            'nim' => request()->getPost('nim'),
            'jenis_kelamin' => request()->getPost('jenis_kelamin'),
            'tanggal_lahir' => request()->getPost('tanggal_lahir'),
        ]);
        return redirect()->to('/mahasiswa')->with('msg', 'Data mahasiswa berhasil disimpan.');
    }

    public function edit($nim = null)
    {
        $mahasiswa = $this->mahasiswaModel->where('nim', $nim)->first();
        if (!$mahasiswa) {
            return redirect()->to('/mahasiswa')
                ->with('msg', 'Data mahasiswa tidak ditemukan.')
                ->with('error', true);
        }

        $data = [
            'title' => 'Form Edit Mahasiswa',
            'content' => view('form-mahasiswa', [
                'mahasiswa' => $mahasiswa,
            ]),
        ];

        return view('template', $data);
    }

    public function update($nim = null)
    {
        $mahasiswa = $this->mahasiswaModel->where('nim', $nim)->first();
        if (!$mahasiswa) {
            return redirect()->to('/mahasiswa')
                ->with('msg', 'Data mahasiswa tidak ditemukan.')
                ->with('error', true);
        }

        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama' => 'required|min_length[3]|max_length[100]',
            'nim' => 'required|numeric|max_length[20]|is_unique[biodata_mahasiswa.nim,id,' . $mahasiswa['id'] . ']',
            'jenis_kelamin' => 'required|in_list[L,P]',
            'tanggal_lahir' => 'required|valid_date',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()
                ->with('msg', $validation->getErrors())
                ->with('error', true);
        }

        $this->mahasiswaModel->update($mahasiswa['id'], [
            'nama' => request()->getPost('nama'),
            'nim' => request()->getPost('nim'),
            'jenis_kelamin' => request()->getPost('jenis_kelamin'),
            'tanggal_lahir' => request()->getPost('tanggal_lahir'),
        ]);
        return redirect()->to('/mahasiswa')->with('msg', 'Data mahasiswa berhasil diupdate.');
    }

    public function delete($nim = null)
    {
        $mahasiswa = $this->mahasiswaModel->where('nim', $nim)->first();
        if (!$mahasiswa) {
            return redirect()->to('/mahasiswa')
                ->with('msg', 'Data mahasiswa tidak ditemukan.')
                ->with('error', true);
        }

        $this->mahasiswaModel->delete($mahasiswa['id']);
        return redirect()->to('/mahasiswa')->with('msg', 'Data mahasiswa berhasil dihapus.');
    }
}
