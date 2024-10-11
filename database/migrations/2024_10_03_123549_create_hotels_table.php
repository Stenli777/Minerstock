<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('alias');
            $table->text('description');
            $table->foreignId('location_id')->constrained();
            $table->decimal('price_per_month', 8, 2);
            $table->integer('min_devices');
            $table->decimal('power', 5, 2);
            $table->foreignId('energy_type_id')->constrained();
            $table->json('pictures');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hotels');
    }
}
