<?php

namespace App\Models;

use Database\Factories\BookFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Book
 *
 * @property int $id
 * @property int $specialist_id
 * @property int $user_id
 * @property string $time
 * @property string $name
 * @property string $surname
 * @property string $second_name
 * @property string $email
 * @property string $phone
 * @property string $description
 * @property int $age
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static BookFactory factory(...$parameters)
 * @method static Builder|Book newModelQuery()
 * @method static Builder|Book newQuery()
 * @method static Builder|Book query()
 * @method static Builder|Book whereAge($value)
 * @method static Builder|Book whereCreatedAt($value)
 * @method static Builder|Book whereDescription($value)
 * @method static Builder|Book whereEmail($value)
 * @method static Builder|Book whereFirstName($value)
 * @method static Builder|Book whereId($value)
 * @method static Builder|Book wherePhone($value)
 * @method static Builder|Book whereSecondName($value)
 * @method static Builder|Book whereSpecialistId($value)
 * @method static Builder|Book whereTime($value)
 * @method static Builder|Book whereUpdatedAt($value)
 * @method static Builder|Book whereUserId($value)
 * @mixin \Eloquent
 */
class Book extends Model
{
    use HasFactory;
    protected $attributes = [];
    protected $fillable = [
        'specialist_id',
        'user_id',
        'datetime',
        'name',
        'surname',
        'second_name',
        'email',
        'phone',
        'description',
        'age',];


    public function client()
    {
        return $this->belongsTo(User::class,'user_id')->first();
    }

//    public function __get($key)
//    {
//        return $this->attributes[$key];
//    }


}
