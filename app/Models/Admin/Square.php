<?php

namespace App\Models\Admin;

use App\Models\Admin\Celebrity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Square extends Model
{
    use HasFactory;


    protected $fillable = [

        'extra_number_one', 'extra_number_two', 'extra_number_three',  'extra_number_four',

        'number_one', 'number_four', 'number_seven',
        'number_two', 'number_five', 'number_eight',
        'number_three', 'number_six', 'number_nine',

        'goal', 'family', 'habits', 'self_esteem',
        'everyday_life', 'talents', 'spirituality', 'temperament',

    ];

    protected $casts = [

        'extra_number_one' => 'integer',
        'extra_number_two' => 'integer',
        'extra_number_three' => 'integer',
        'extra_number_four' => 'integer',

        'number_one' => 'integer',
        'number_four' => 'integer',
        'number_seven' => 'integer',
        'number_two' => 'integer',
        'number_five' => 'integer',
        'number_eight' => 'integer',
        'number_three' => 'integer',
        'number_six' => 'integer',
        'number_nine' => 'integer',

        'goal' => 'integer',
        'family' => 'integer',
        'habits' => 'integer',
        'self_esteem' => 'integer',
        'everyday_life' => 'integer',
        'talents' => 'integer',
        'spirituality' => 'integer',
        'temperament' => 'integer',

    ];

    public function celebrity(): BelongsTo
    {
        return $this->belongsTo(Celebrity::class);
    }
}