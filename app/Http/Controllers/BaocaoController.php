<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaocaoController extends Controller
{
    public function index()
    {
        return view('admin.baocao.index');
    }

    public function create() {
        return view('admin.baocao.create');
   }
}
