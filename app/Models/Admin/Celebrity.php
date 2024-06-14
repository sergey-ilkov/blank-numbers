<?php

namespace App\Models\Admin;

use App\Models\Admin\Square;
use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Celebrity extends Model
{
    use HasFactory;
    use Filterable;


    protected $fillable = [

        'name_uk', 'surname_uk', 'gender_uk',  'description_uk',

        'name_ru', 'surname_ru', 'gender_ru',  'description_ru',

        'day', 'month', 'year', 'published'

    ];

    protected $casts = [

        'name_uk' => 'string',
        'surname_uk' => 'string',
        'gender_uk' => 'string',
        'description_uk' => 'string',
        'name_ru' => 'string',
        'surname_ru' => 'string',
        'gender_ru' => 'string',
        'description_ru' => 'string',

        'day' => 'integer',
        'month' => 'integer',
        'year' => 'integer',
        'published' => 'boolean',
    ];

    public function square(): HasOne
    {
        return $this->hasOne(Square::class);
    }

    public function occupations(): BelongsToMany
    {
        return $this->belongsToMany(Occupation::class);
    }

    public function movies(): BelongsToMany
    {
        return $this->belongsToMany(Movie::class);
    }

    public function connections(): BelongsToMany
    {
        return $this->belongsToMany(Celebrity::class, 'celebrity_connection', 'celebrity_id', 'connection_id');
    }
}