<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_id',
        'name',
        'phone',
        'width',
        'height',
    ];

    public function types()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }
}
