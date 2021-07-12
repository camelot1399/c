<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $table = 'feedback';

    protected $fillable = [
        'user_id',
        'name',
        'surname',
        'specialist_id',
        'body_text'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function specialist()
    {
        return $this->belongsTo(Specialist::class);
    }

    public function getNameAndSurname(): string
    {
        return isset($this->user_id) ? $this->user->getNameAndSurname() : $this->name . ' ' . $this->surname;
    }

    public function getFullName(): string
    {
        return isset($this->user_id) ? $this->user->getFullName() : $this->surname . ' ' . $this->name . ' ' . $this->second_name;
    }
}
