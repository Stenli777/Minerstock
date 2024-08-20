<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apps', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->string('description', 255)->nullable();
            $table->text('content')->nullable();
            $table->string('alias', 255)->nullable();
            $table->string('img', 255)->nullable();
            $table->tinyInteger('active');
            $table->string('referral_link', 255)->nullable();
            $table->string('hashed_link', 255)->nullable();
            $table->bigInteger('app_category_id')->unsigned()->index()->nullable();
            $table->foreign('app_category_id','app_category_fk')->on('app_categories')->references('id');
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
        Schema::dropIfExists('apps');
    }
}
