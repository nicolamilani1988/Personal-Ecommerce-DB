<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [

        'name',
        'price',
        'supplier',
        'img'
    ];

    public function orders(){

        return $this->belongsToMany(Order::class);
    }
}
