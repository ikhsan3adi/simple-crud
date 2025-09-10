<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class BeritaController extends BaseController
{
    public function index(): string
    {
        $data = [
            'title'   => 'Berita',
            'content' => view('berita'),
        ];

        return view('template', $data);
    }
}
