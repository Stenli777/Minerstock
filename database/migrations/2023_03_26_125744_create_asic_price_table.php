<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsicPriceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asic_price', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('asic_id');
            $table->bigInteger('company_id');
            $table->integer('price_rub')->nullable();
            $table->integer('price_usd')->nullable();
            $table->integer('price_with_vat_rub')->nullable();
            $table->integer('price_with_vat_usd')->nullable();
            $table->boolean('was_in_use')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asic_price');
    }
}
