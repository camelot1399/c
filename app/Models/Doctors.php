<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctors extends Model
{
    use HasFactory;

    public array $doctors = [
        [
            'name' => 'Диедра Спанглер',
            'speciality' => 'MDS - Пародонтология и оральная имплантология, BDS',
            'rating' => 1,
            'location' => 'Флорида, США',
            'photo' => 'doctor-01.jpg',
            'coast' => 500,
            'status' => 1
        ],
        [
            'name' => 'Николай Чавес',
            'speciality' => 'BDS, MDS - Челюстно-лицевая хирургия',
            'rating' => 4,
            'location' => 'Нью-Йорк, США',
            'photo' => 'doctor-02.jpg',
            'coast' => 500,
            'status' => 1
        ],
        [
            'name' => 'Бедилия Эллиот',
            'speciality' => 'MBBS, MD - Лечебное дело, DNB - Кардиология',
            'rating' => 2,
            'location' => 'Джорджия, США',
            'photo' => 'doctor-03.jpg',
            'coast' => 500,
            'status' => 0
        ],
        [
            'name' => 'Александра Фостер',
            'speciality' => 'MBBS, MS - Общая хирургия, MCh - Урология',
            'rating' => 1,
            'location' => 'Нью-Йорк, США',
            'photo' => 'doctor-04.jpg',
            'coast' => 500,
            'status' => 1
        ],
        [
            'name' => 'Диедра Спанглер',
            'speciality' => 'MDS - Пародонтология и оральная имплантология, BDS',
            'rating' => 5,
            'location' => 'Флорида, США',
            'photo' => 'doctor-01.jpg',
            'coast' => 500,
            'status' => 1
        ],
        [
            'name' => 'Николай Чавес',
            'speciality' => 'BDS, MDS - Челюстно-лицевая хирургия',
            'rating' => 5,
            'location' => 'Нью-Йорк, США',
            'photo' => 'doctor-02.jpg',
            'coast' => 500,
            'status' => 1
        ],
        [
            'name' => 'Бедилия Эллиот',
            'speciality' => 'MBBS, MD - Лечебное дело, DNB - Кардиология',
            'rating' => 3,
            'location' => 'Джорджия, США',
            'photo' => 'doctor-03.jpg',
            'coast' => 500,
            'status' => 1
        ],
        [
            'name' => 'Александра Фостер',
            'speciality' => 'MBBS, MS - Общая хирургия, MCh - Урология',
            'rating' => 2,
            'location' => 'Нью-Йорк, США',
            'photo' => 'doctor-04.jpg',
            'coast' => 500,
            'status' => 1

        ],
    ];
    public int $start_time = 9;
    public int $end_time = 11;
    public int $duration = 1;
}
