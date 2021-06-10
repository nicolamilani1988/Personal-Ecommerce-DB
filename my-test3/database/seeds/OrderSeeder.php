<?php

use Illuminate\Database\Seeder;
use App\Order;
use App\Customer;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Order::class, 40) -> make() 
            -> each(function($order) {
            $customer = Customer::inRandomOrder() -> first();
            $order -> customer() -> associate($customer);
            $order -> save();
        });
    }
}
