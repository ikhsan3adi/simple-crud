<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
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

    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
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
            'pager' => $this->mahasiswaModel->pager,
            'perPage' => $this->perPage,
            'currentPage' => request()->getVar('page_mahasiswa') ?? 1,
            'mahasiswa' => $mahasiswa,
        ];

        return view('mahasiswa/index', $data);
    }

    /**
     * Return the properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function show($id = null)
    {
        $mahasiswa = $this->mahasiswaModel->find($id);

        if (!$mahasiswa) {
            return redirect()->to('/mahasiswa')
                ->with('msg', 'Data mahasiswa tidak ditemukan.')
                ->with('error', true);
        }

        return view('mahasiswa/show', ['mahasiswa' => $mahasiswa, 'title' => 'Detail Mahasiswa']);
    }

    /**
     * Return a new resource object, with default properties.
     *
     * @return ResponseInterface
     */
    public function new()
    {
        return view('mahasiswa/form', ['title' => 'Form Tambah Mahasiswa']);
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
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

    /**
     * Return the editable properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function edit($id = null)
    {
        $mahasiswa = $this->mahasiswaModel->find($id);
        if (!$mahasiswa) {
            return redirect()->to('/mahasiswa')
                ->with('msg', 'Data mahasiswa tidak ditemukan.')
                ->with('error', true);
        }

        $data = [
            'title' => 'Form Edit Mahasiswa',
            'mahasiswa' => $mahasiswa,
        ];

        return view('mahasiswa/form', $data);
    }

    /**
     * Add or update a model resource, from "posted" properties.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function update($id = null)
    {
        $mahasiswa = $this->mahasiswaModel->find($id);
        if (!$mahasiswa) {
            return redirect()->to('/mahasiswa')
                ->with('msg', 'Data mahasiswa tidak ditemukan.')
                ->with('error', true);
        }

        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama' => 'required|min_length[3]|max_length[100]',
            'nim' => 'required|numeric|max_length[20]|is_unique[biodata_mahasiswa.nim,id,' . $id . ']',
            'jenis_kelamin' => 'required|in_list[L,P]',
            'tanggal_lahir' => 'required|valid_date',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()
                ->with('msg', $validation->getErrors())
                ->with('error', true);
        }

        $this->mahasiswaModel->update($id, [
            'nama' => request()->getPost('nama'),
            'nim' => request()->getPost('nim'),
            'jenis_kelamin' => request()->getPost('jenis_kelamin'),
            'tanggal_lahir' => request()->getPost('tanggal_lahir'),
        ]);
        return redirect()->to('/mahasiswa')->with('msg', 'Data mahasiswa berhasil diupdate.');
    }

    /**
     * Delete the designated resource object from the model.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function delete($id = null)
    {
        $mahasiswa = $this->mahasiswaModel->find($id);
        if (!$mahasiswa) {
            return redirect()->to('/mahasiswa')
                ->with('msg', 'Data mahasiswa tidak ditemukan.')
                ->with('error', true);
        }

        $this->mahasiswaModel->delete($id);
        return redirect()->to('/mahasiswa')->with('msg', 'Data mahasiswa berhasil dihapus.');
    }
}
