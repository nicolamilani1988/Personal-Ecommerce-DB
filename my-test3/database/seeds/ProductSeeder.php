<?php

use Illuminate\Database\Seeder;
use App\Product;
use App\Order;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Product::class, 100) -> create()
            -> each(function($product) {
            $orders = Order::inRandomOrder() 
                        -> limit(rand(1,3))
                        -> get();
            $product -> orders() -> attach($orders);
            $product -> save();
        });
    }
}
