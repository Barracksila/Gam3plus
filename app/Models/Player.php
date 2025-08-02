<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    // If your table name is players, no need to specify table property
    // Otherwise:
    // protected $table = 'players';

    // Fillable or guarded depending on your setup
    protected $fillable = [
        'Player_Name',
        'Country',
        'Avatar',
        'email',
        'Phone_Number',
        // any other columns
    ];

    public $timestamps = false; // If your table doesn't have created_at, updated_at
}
