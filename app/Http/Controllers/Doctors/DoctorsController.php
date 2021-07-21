<?php

namespace App\Http\Controllers\Doctors;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Specialist;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isNull;

class DoctorsController extends Controller
{
    public function index()
    {
        $doctors = Specialist::doctorsSliderPrepare();
        return view('doctors.index', compact('doctors'));
    }

    public function show(Request $request, Specialist $specialist )
    {
        !empty($request->bookId) ? $bookFeedback = Book::find($request->bookId) : $bookFeedback = null;

        $specialist->load('user', 'category','feedbacks');
        return view('doctors.show', compact('specialist', 'bookFeedback'));
    }

    public function getVacantSpecialists(Request $request)
    {
        if (isNull($request->date2)) {
            //на один день
        } else {
            //на диапазон дат
        }
    }
}
