<?php

namespace App\Controllers;

class Test extends BaseController
{
    public function index()
    {
        return view('home');
    }

    public function insert()
    {
        echo "INI INSERT";
    }
}