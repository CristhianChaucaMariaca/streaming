<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suscription extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function group(){
        return $this->belongsTo(Group::class);
    }
}
