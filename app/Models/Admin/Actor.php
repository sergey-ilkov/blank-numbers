<?php

namespace App\Models\Admin;

// use App\Models\Admin\Movie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Actor extends Model
{
    use HasFactory;

    protected $fillable = [

        'name_uk', 'surname_uk',

        'name_ru', 'surname_ru'

    ];



    protected $casts = [

        'name_uk' => 'string',
        'surname_uk' => 'string',
        'name_ru' => 'string',
        'surname_ru' => 'string',
    ];

    public function movies(): BelongsToMany
    {
        return $this->belongsToMany(Movie::class);
    }
}
