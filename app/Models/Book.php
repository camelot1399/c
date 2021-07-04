<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Book
 *
 * @property int $id
 * @property int $specialist_id
 * @property int $user_id
 * @property string $time
 * @property string $first_name
 * @property string $second_name
 * @property string $email
 * @property string $phone
 * @property string $description
 * @property int $age
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\BookFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Book newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Book newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Book query()
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereAge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereSecondName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereSpecialistId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereUserId($value)
 * @mixin \Eloquent
 */
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
}
