<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    //make attributes of PLayer Models

protected $fillable=[


'Player_1',
'Player_2',
'Name',
'Country',
'email',
'Avatar',
'Phone_Number',
];

protected $Hidden=[

'Password',
'email',

];

//Optionaly define the Player relationships if necessary


public function Player_1(){


return $this->belongsTo(User::class, 'Player_1');


}


public function Player_2(){


return $this->belongsTo(User::class, 'Player_2');
}
}
