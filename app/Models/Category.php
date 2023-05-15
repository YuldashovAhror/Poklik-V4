<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'photo',
        'photo2',
        'name_ru',
        'name_uz',
        'name_en',
    ];
}
