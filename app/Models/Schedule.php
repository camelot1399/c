<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Schedule extends Model
{
    use HasFactory;
    protected $fillable = ['day','start_time','end_time','duration'];

    public function specialist(): BelongsTo
    {
        return $this->belongsTo(Specialist::class);
    }
}
