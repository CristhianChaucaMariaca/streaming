<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = [
        'name','status','amount','payday','quota','members'
    ];

    public function users(){
        return $this->belongsToMany(User::class);
    }

    public function services(){
        return $this->belongsToMany(Service::class);
    }

    public function payments(){
        return $this->hasMany(Payment::class);
    }
}
