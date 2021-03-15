<?php

namespace App\Http\Controllers;

class ExceptionController extends Controller
{
    public function index()
    {
        return view('exceptions.404');
    }
}
