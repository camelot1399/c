<?php

namespace App\Http\Controllers\Doctors;

use App\Http\Controllers\Controller;
use App\Models\Specialist;

class DoctorsController extends Controller
{
    public function index()
    {
        $doctors = Specialist::doctorsSliderPrepare();
        return view('doctors.index', compact('doctors'));
    }

    public function show(Specialist $specialist)
    {
        $specialist->load('user', 'category','scores');

        return view('doctors.show', compact('specialist'));
    }
}
