<?php

use App\Models\Asic;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnAliasToAsics extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('asics', function (Blueprint $table) {
          $table->string('alias')->nullable();
        });
        $collection = Asic::all();
        foreach ($collection as $asic){$asic->save();}
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('asics', function (Blueprint $table) {
            //
        });
    }
}
