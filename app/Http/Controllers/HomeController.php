<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Doctors\DoctorsController;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index');
    }
}
