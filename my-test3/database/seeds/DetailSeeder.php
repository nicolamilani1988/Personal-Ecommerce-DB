<?php

use Illuminate\Database\Seeder;
use App\Detail;
use App\Customer;

class DetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customers= Customer::all();
        foreach($customers as $customer){

            factory(Detail::class, 1) ->make()->each(function($detail) use($customer){

                $detail -> customer_id = $customer->id;
                $detail -> save();
            });
        }
    }
}
