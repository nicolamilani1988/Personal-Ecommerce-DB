<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [

        'status',
        'country',
        'customer_id'
    ];

    public function customer(){

        return $this->belongsTo(Customer::class);
    }

    public function products(){

        return $this->belongsToMany(Product::class);
    }
}
