<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class HelloWorld extends BaseController
{
    public function index()
    {
        return view('hello-world', ['title' => 'Hello World!']);
    }
}
