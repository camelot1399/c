<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Specialist;
use App\Models\User;
use App\View\Components\doctor\about;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function React\Promise\all;

class PatientController extends Controller
{
    public function index()
    {
        if(Auth::user()->is_doctor){
            $currentUser = \Auth::user()->specialist->user_id;
            $books = Book::all()->where('specialist_id', '=', $currentUser)
                ->sortBy('datetime');

            return view('patient.index', compact('books'));
        } else abort(404);

        // TODO: отрефакторить

    }
}
