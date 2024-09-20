<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToAppTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('apps', function (Blueprint $table) {
            $table->string("mobile_images")->nullable();
            $table->string("lang")->nullable();
            $table->string("platforms")->nullable();
            $table->text("links")->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('apps', function (Blueprint $table) {
            $table->dropColumn("mobile_images");
            $table->dropColumn("lang");
            $table->dropColumn("platforms");
            $table->dropColumn("links");
        });
    }
}
