<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class AuthController extends BaseController
{
    private UserModel $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        return view('display-login', ['title' => 'Login']);
    }

    public function login()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $this->userModel
            ->where('username', $username)
            ->where('password', md5($password))
            ->first();

        if ($user) {
            session()->set('isAuthenticated', true);
            session()->set('username', $user['username']);

            return redirect()->to('/home');
        } else {
            return redirect()->back()
                ->with('error', true)
                ->with('msg', 'Username atau Password salah!');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
