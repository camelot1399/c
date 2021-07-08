<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Specialist;

class HomeController extends Controller
{
    public function index()
    {
//        $doctors = Doctor::all()->where('is_doctor', true);
//        foreach ($doctors as $doctor){
//            $doctor->load('specialist');
//            $doctor->specialist->load('category');
//        }
        $doctors = Specialist::with(['user', 'category'])->get();
        return view('home.index', compact('doctors'));
    }
}
