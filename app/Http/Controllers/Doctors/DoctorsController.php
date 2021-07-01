<?php

namespace App\Http\Controllers\Doctors;

use App\Http\Controllers\Controller;
use App\Models\Doctors;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class DoctorsController extends Controller
{
    public function index()
    {
        $about = new Doctors();
        $aboutNew = $about->about;
        return view('doctors.index', compact('aboutNew'));
    }
}
