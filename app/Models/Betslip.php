<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Betslip extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'bet_amount',
         'bets',
        'Player_1',
        'Player_2',
        'outcome',
        'Player_! score',
        'Player_2 score',




    ];

    protected $casts = [
        'bets' => 'array', // Automatically cast the 'bets' field to an array when retrieved.
    ];

    /**
     * Get the user that owns the betslip.
     */
    public function Player_1()
    {
        return $this->belongsTo(User::class, 'Player_2');
    }



    public function Player_2(){











        return $this->belongsTo(User::class, 'Player_2');
    }
}
