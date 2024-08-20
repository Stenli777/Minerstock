<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppAppTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_app_tags', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('app_id');
            $table->unsignedBigInteger('app_tag_id');

            $table->timestamps();

            $table->index('app_id','app_tag_app_idx');
            $table->index('app_tag_id','app_tag_tag_idx');

            $table->foreign('app_id','app_tag_app_fk')->on('apps')->references('id');
            $table->foreign('app_tag_id','app_tag_tag_fk')->on('app_tags')->references('id');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('app_app_tags');
    }
}
