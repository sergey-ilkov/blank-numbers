<?php

namespace App\Models\Admin;

// use App\Models\Admin\Actor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [

        'title_uk', 'title_ru',

        'year', 'poster', 'trailer'

    ];

    protected $casts = [

        'title_uk' => 'string',
        'title_ru' => 'string',
        'year' => 'integer',
        'poster' => 'string',
        'trailer' => 'string',
    ];

    public function actors(): BelongsToMany
    {
        return $this->belongsToMany(Actor::class);
    }

    public function celebrities(): BelongsToMany
    {
        return $this->belongsToMany(Celebrity::class);
    }
}