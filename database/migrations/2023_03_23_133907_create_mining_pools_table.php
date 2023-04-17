<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMiningPoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mining_pools', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('alias')->nullable();
            $table->string('name')->nullable();
            $table->text('content')->nullable();
            $table->decimal('pool_fee', 5, 2)->nullable();
            $table->string('mobile_app_ios')->nullable();
            $table->string('mobile_app_android')->nullable();
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
        Schema::dropIfExists('mining_pools');
    }
}
