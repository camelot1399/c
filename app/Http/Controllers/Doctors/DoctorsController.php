<?php

namespace App\Http\Controllers\Doctors;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Specialist;
use App\Models\User;

class DoctorsController extends Controller
{
    public function index()
    {
//        $doctors = Doctor::all()->where('is_doctor', true);
//        foreach ($doctors as $doctor){
//            $doctor->load('specialist');
//            $doctor->specialist->load('category');
//        }
        $doctors = Specialist::with(['user','category'])->get();

//        dd($doctors[1],$doctors[1]->category->name,$doctors[1]->user->name);
//        TODO: Теперь это вызывается так. Надо будет прошерстить вьюху и поменять отображение полей

        return view('doctors.index', compact('doctors'));
    }

    public function show(Specialist $specialist)
    {
        return view('doctors.show');
    }
}
