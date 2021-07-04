<?php

namespace App\Http\Controllers;

use App\Models\Doctor;

class HomeController extends Controller
{
    public function index()
    {
        $doctorsObj = new Doctor();
        $doctors = $doctorsObj->doctors;
        return view('home.index', compact('doctors'));
    }
}
