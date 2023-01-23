<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $data = [];
        return view('home', $data);
    }

    public function category(Request $request)
    {
        $data = [];
        return view('category', $data);
    }
}
