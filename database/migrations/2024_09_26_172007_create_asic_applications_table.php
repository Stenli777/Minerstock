<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsicApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asic_applications', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('asic_name');
            $table->string('phone');
            $table->string('telegram')->nullable();
            $table->boolean('processed')->default(false);
            $table->timestamps();
        });
    }
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asic_applications');
    }
}
