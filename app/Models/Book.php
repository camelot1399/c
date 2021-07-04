<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $attributes = [];
    protected $fillable = [
        'specialist_id',
        'user_id',
        'time',
        'first_name',
        'second_name',
        'email',
        'phone',
        'description',
        'age',];


    public function client()
    {
        return $this->belongsTo(User::class,'user_id')->first();
    }

    public function __get($key)
    {
        return $this->attributes[$key];
    }


}
