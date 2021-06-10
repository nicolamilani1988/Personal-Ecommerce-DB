<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('details', function (Blueprint $table) {

            $table -> foreign('customer_id', 'detail-customer')
                   -> references('id')
                   -> on('customers');
        });

        Schema::table('orders', function (Blueprint $table) {

            $table -> foreign('customer_id', 'order-customer')
                   -> references('id')
                   -> on('customers');
        });

        Schema::table('order_product', function (Blueprint $table) {

            $table -> foreign('order_id', 'order-product')
                   -> references('id')
                   -> on('orders');
            $table -> foreign('product_id', 'product-order')
                   -> references('id')
                   -> on('products');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('details', function (Blueprint $table) {

            $table -> dropforeign('detail-customer');
        });
        
        Schema::table('orders', function (Blueprint $table) {

            $table -> dropforeign('order-customer');
        });

        Schema::table('order_product', function (Blueprint $table) {

            $table -> dropforeign('order-product');
            $table -> dropforeign('product-order');
        });
    }
}
