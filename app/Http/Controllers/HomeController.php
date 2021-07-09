<?php

namespace App\Http\Controllers;

use App\Models\Specialist;

class HomeController extends Controller
{
    public function index()
    {
        $doctors = Specialist::with(['user', 'category','scores'])->get();
        foreach ($doctors as $doctor) {
            $doctor->rating = $doctor->averageScore();
        }
        return view('home.index', compact('doctors'));
    }
}
