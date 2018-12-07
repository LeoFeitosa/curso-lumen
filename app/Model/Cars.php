<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cars extends Model
{
    protected $table = 'cars';

    protected $fillable = [
        'name',
        'description',
        'model',
        'date'
    ];

    /*Convert date para timestamp */
    protected $casts = [
        'date' => 'Timestamp'
    ];
}