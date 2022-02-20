<?php

namespace App\Models;

use App\Casts\DateFormated;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

    protected $fillable = [
        'log',
        'category'
    ];

    protected $casts = [
        'created_at' => DateFormated::class
    ];
}
