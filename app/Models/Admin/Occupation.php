<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Occupation extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_uk',
        'title_ru',
    ];

    protected $casts = [

        'title_uk' => 'string',
        'title_ru' => 'string',
    ];

    public function celebrities(): BelongsToMany
    {
        return $this->belongsToMany(Celebrity::class);
    }
}
