<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Specialist extends Model
{
    use HasFactory;

    public function doctor(): BelongsTo
    {
        return $this->belongsTo(Doctor::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function books(): HasMany
    {
        return $this->hasMany(Book::class);
    }

//    public function scores(): HasMany
//    {
//        return $this->hasMany(Score::class);
//    }

    public function feedbacks(): HasMany
    {
        return $this->hasMany(Feedback::class);
    }

    public function averageScore(): float
    {
        $this->load('feedbacks');
        $sum = 0;
        foreach ($this->feedbacks as $score) {
            $sum += $score->value;
        }
        return $sum/$this->feedbacks->count();
    }

    public static function doctorsSliderPrepare(): Collection
    {
        $doctors = Specialist::with(['user', 'category','feedback'])->get();
        foreach ($doctors as $doctor) {
            $doctor->rating = $doctor->averageScore();
            $doctor->scoresCount = $doctor->scores->count();
        }
        return $doctors;
    }

    public function getNameAndSurname(): string
    {
        return $this->user->getNameAndSurname();
    }

    public function getFullName(): string
    {
        return $this->user->getFullName();
    }

    public function goodScoresPercent(): int
    {
        $allCount = $this->feedbacks()->count();
        $goodCount = $this->feedbacks()->where('value','>',3)->count();
        return round($goodCount/$allCount*100);
    }
}
