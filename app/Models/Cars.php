<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cars extends Model
{
    protected $table = 'api';

    /**Colunas que do BD  */
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

    public $timestamps = false;
}