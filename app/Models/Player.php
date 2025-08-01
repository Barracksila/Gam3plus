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

public function getCountryFlagUrlAttribute()
{
    $map = [
        'USA' => 'us',
        'United Kingdom' => 'gb',
        'Nigeria' => 'ng',
        'France' => 'fr',
        'Germany' => 'de',
        'India' => 'in',
        // Add more as needed
    ];

    $code = $map[$this->Country] ?? 'un'; // fallback
    return "https://flagcdn.com/{$code}.svg";
}
}
