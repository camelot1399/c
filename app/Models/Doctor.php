<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    private int $id;
    public string $name;
    public string $speciality;
    public string $category;
    public int $rating;
    public int $feedback;
    public string $location;
    public $about;
}
