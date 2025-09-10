<?php

namespace App\Controllers;

class HomeController extends BaseController
{
    public function index()
    {
        $data = [
            'title'   => 'Home',
            'content' => view('home'),
        ];

        return view('template', $data);
    }
}
