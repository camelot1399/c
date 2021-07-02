<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctors extends Model
{
    use HasFactory;

    public $doctors = [
        [
            'name' => 'Диедра Спанглер',
            'speciality' => 'MDS - Пародонтология и оральная имплантология, BDS',
            'rating' => 5,
            'location' => 'Флорида, США',
            'photo' => 'doctor-01.jpg'

        ],
        [
            'name' => 'Николай Чавес',
            'speciality' => 'BDS, MDS - Челюстно-лицевая хирургия',
            'rating' => 5,
            'location' => 'Нью-Йорк, США',
            'photo' => 'doctor-02.jpg'

        ],
        [
            'name' => 'Бедилия Эллиот',
            'speciality' => 'MBBS, MD - Лечебное дело, DNB - Кардиология',
            'rating' => 5,
            'location' => 'Джорджия, США',
            'photo' => 'doctor-03.jpg'

        ],
        [
            'name' => 'Александра Фостер',
            'speciality' => 'MBBS, MS - Общая хирургия, MCh - Урология',
            'rating' => 5,
            'location' => 'Нью-Йорк, США',
            'photo' => 'doctor-04.jpg'

        ],
        [
            'name' => 'Диедра Спанглер',
            'speciality' => 'MDS - Пародонтология и оральная имплантология, BDS',
            'rating' => 5,
            'location' => 'Флорида, США',
            'photo' => 'doctor-01.jpg'

        ],
        [
            'name' => 'Николай Чавес',
            'speciality' => 'BDS, MDS - Челюстно-лицевая хирургия',
            'rating' => 5,
            'location' => 'Нью-Йорк, США',
            'photo' => 'doctor-02.jpg'

        ],
        [
            'name' => 'Бедилия Эллиот',
            'speciality' => 'MBBS, MD - Лечебное дело, DNB - Кардиология',
            'rating' => 5,
            'location' => 'Джорджия, США',
            'photo' => 'doctor-03.jpg'

        ],
        [
            'name' => 'Александра Фостер',
            'speciality' => 'MBBS, MS - Общая хирургия, MCh - Урология',
            'rating' => 5,
            'location' => 'Нью-Йорк, США',
            'photo' => 'doctor-04.jpg'

        ],
    ];
}
