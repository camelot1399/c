<?php

namespace App\Http\Controllers\Doctors;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Specialist;
use Illuminate\Http\Request;

class DoctorsController extends Controller
{
    public function index()
    {
        $doctors = Doctor::all()->where('is_doctor', true);
        foreach ($doctors as $doctor){
            $doctor->load('specialist');
            $doctor->specialist->load('category');
        }
        return view('doctors.index', compact('doctors'));
    }

    public function show(Request $request)
    {
//        $specialist->load('user');
//        $specialist->load('category');
        dd($request);
        return view('doctors.show', compact('specialist'));
    }
}
