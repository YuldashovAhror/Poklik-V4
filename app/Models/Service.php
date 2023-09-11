<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'main_photo',
        'second_photo',
        'name_uz',
        'name_ru',
        'name_en',
        'title_uz',
        'title_ru',
        'title_en',
        'discription_uz',
        'discription_ru',
        'discription_en',
        'ok',
    ];

    public function comments()
    {
        return $this->hasMany(ServiceComment::class);
    }

    public function galleries()
    {
        return $this->hasMany(ServiceGallery::class);
    }

    public function Images()
    {
        return $this->hasMany(ServiceImage::class);
    }
}
