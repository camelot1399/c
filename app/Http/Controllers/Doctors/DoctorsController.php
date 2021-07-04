<?php

namespace App\Http\Controllers\Doctors;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Database\Eloquent\Model;
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
//        dump($doctors->items[0]->specialist());
        dump($doctors);
        return view('doctors.index', compact('doctors'));
    }

    public function show()
    {
        return view('doctors.show');
    }
}
