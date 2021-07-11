<?php

namespace App\Http\Controllers\Doctors;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Feedback;
use App\Models\Specialist;
use Bitrix\Forum\Comments\Feed;

class DoctorsController extends Controller
{
    public function index()
    {
        $doctors = Specialist::with(['user', 'category'])->get();
        return view('doctors.index', compact('doctors'));
    }

    public function show(Specialist $specialist)
    {
        $feedback = Feedback::whereSpecialistId($specialist->id)->get();
//        dd($feedback->count());
        $specialist->load('user', 'category');
        return view('doctors.show', compact('specialist', 'feedback'));
    }
}
