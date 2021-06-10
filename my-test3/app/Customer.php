<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [

        'name',
        'billing'
    ];

    public function orders(){

        return $this->hasMany(Order::class);
    }

    public function detail()
    {
        return $this->hasOne(Detail::class);
    }
}
