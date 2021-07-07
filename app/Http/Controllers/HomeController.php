<?php

namespace App\Http\Controllers;

use App\Models\Doctor;

class HomeController extends Controller
{
    public function index()
    {
        $doctors = Doctor::all()->where('is_doctor', true);
        foreach ($doctors as $doctor){
            $doctor->load('specialist');
            $doctor->specialist->load('category');
        }
        return view('home.index', compact('doctors'));
    }
}
