<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartnerlinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partnerlinks', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('entity')->nullable();
            $table->integer('id_entity')->nullable();
            $table->string('name');
            $table->string('internal_link')->nullable();
            $table->string('redirect301');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('partnerlinks');
    }
}
