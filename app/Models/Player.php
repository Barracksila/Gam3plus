<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $table = '_player';
    protected $primaryKey = 'Player_id';
    public $timestamps = true;
    protected $fillable = [
        'Player_Name',
        'Country',
        'email',
        'Avatar',
        'Phone_Number'
    ];
}
