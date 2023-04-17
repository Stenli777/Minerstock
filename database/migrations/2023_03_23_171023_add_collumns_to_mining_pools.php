<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCollumnsToMiningPools extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mining_pools', function (Blueprint $table) {
            $table->boolean('pps')->nullable();
            $table->boolean('pplns')->nullable();
            $table->boolean('solo')->nullable();
            $table->string('country')->nullable();
            $table->string('year_start')->nullable();
            $table->string('partner_link')->nullable();
            $table->boolean('work_in_russia')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mining_pools', function (Blueprint $table) {
            //
        });
    }
}
