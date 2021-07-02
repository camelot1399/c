<?php

namespace App\Http\Controllers;

use App\Models\Doctors;

class HomeController extends Controller
{
    public function index()
    {
        $doctorsObj = new Doctors();
        $doctors = $doctorsObj->doctors;
        return view('home.index', compact('doctors'));
    }
}
