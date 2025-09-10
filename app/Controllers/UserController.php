<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class UserController extends BaseController
{
    private UserModel $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function formulir()
    {
        return view('display-register', [
            'title' => 'Formulir Pendaftaran',
        ]);
    }

    public function create()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        if (empty($username) || empty($password)) {
            return redirect()->back()
                ->with('error', true)
                ->with('msg', 'Username dan password wajib diisi.')->withInput();
        }

        $data = [
            'username' => $username,
            'password' => md5($password),
        ];

        $this->userModel->insert($data);

        return redirect()->to('/mahasiswa')->with('msg', 'Pendaftaran berhasil.');
    }
}
