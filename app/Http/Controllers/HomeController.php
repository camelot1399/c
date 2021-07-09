<?php

namespace App\Http\Controllers;

use App\Models\Specialist;

class HomeController extends Controller
{
    public function index()
    {
        $doctors = Specialist::with(['user', 'category','scores'])->get();
//        dd($doctors[7]->averageScore());
        return view('home.index', compact('doctors'));
    }
}
