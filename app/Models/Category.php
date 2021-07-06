<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $attributes = [];
    protected $fillable = [
        'name',
        'parent_id',
    ];

    public function specialist()
    {
        return $this->hasMany(Specialist::class);
    }
}
