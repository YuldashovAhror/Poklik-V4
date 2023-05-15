<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voice extends Model
{
    use HasFactory;

    protected $fillable = [
        'voice',
        'name_uz',
        'name_ru',
        'name_en',
        'type_uz',
        'type_ru',
        'type_en',
    ];
}
