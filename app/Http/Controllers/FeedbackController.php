<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFeedbackRequest;
use App\Models\Feedback;
use App\Models\Specialist;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {

    }

    public function store(StoreFeedbackRequest $request)
    {
        Feedback::create($request->validated());
        return redirect()->route('doctors.show', ['specialist' => $request->specialist_id]);
    }
}
