<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChanePriceType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cartitems', function (Blueprint $table) {
            $table->integer('qty')->change();
            $table->bigInteger('price')->change();
        });
        Schema::table('orderitems', function (Blueprint $table) {
            $table->integer('qty')->change();
            $table->bigInteger('price')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
