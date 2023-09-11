<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceGallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id',
        'photo',
    ];

    public function services()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }
}
