<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asics', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->bigInteger('hashrate');
            $table->integer('algorithm_id')->nullable();
            $table->integer('producer_id')->nullable();
            $table->date('sales_data_start')->nullable();
            $table->integer('consumption');
            $table->string('packing_size')->nullable();
            $table->integer('weight_brutto')->nullable();
            $table->string('dimensions');
            $table->integer('weight_netto');
            $table->integer('noise');
            $table->integer('chips')->nullable();
            $table->float('efficiency')->nullable();
            $table->string('img')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asics');
    }
}
