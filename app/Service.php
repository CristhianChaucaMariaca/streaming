<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable =
    ['name','description','price'];

    public function groups(){
        return $this->belongsToMany(Group::class);
    }
}
