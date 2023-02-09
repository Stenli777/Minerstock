<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToAsicCompanies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('asic_companies', function (Blueprint $table) {
            $table->integer('price_vat_rub')->nullable();
            $table->integer('price_vat_usd')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('asic_companies', function (Blueprint $table) {
            $table->dropColumn('price_vat_rub');
            $table->dropColumn('price_vat_usd');
        });
    }
}
