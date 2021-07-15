<?php

namespace App\Http\Controllers\Doctors;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Feedback;
use App\Models\Specialist;
use App\Models\User;
use Illuminate\Http\Request;

class DoctorsController extends Controller
{
    public function index()
    {
        $doctors = Specialist::doctorsSliderPrepare();
        return view('doctors.index', compact('doctors'));
    }

    public function show(Request $request, Specialist $specialist )
    {
//        dd(Feedback::all()->where('user_id', '=', $request->userId)->getNameAndSurname());
        !empty($request->userId) ? $feedbackUser = User::find($request->userId) : $feedbackUser = null;

        $specialist->load('user', 'category','feedbacks');
        return view('doctors.show', compact('specialist', 'feedbackUser'));
    }
}
