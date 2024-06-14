<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blocking extends Model
{
    use HasFactory;

    protected $fillable = [

        'ip', 'path',

        'count', 'blocking',

    ];

    protected $casts = [

        'ip' => 'string',
        'path' => 'string',

        'count' => 'integer',
        'blocking' => 'boolean',

    ];
}
