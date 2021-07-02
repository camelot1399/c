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
        $doctorsObj = new Doctors();
        $doctors = $doctorsObj->doctors;
        return view('doctors.index', compact('doctors'));
    }

    public function show()
    {
        return view('doctors.show');
    }
}
