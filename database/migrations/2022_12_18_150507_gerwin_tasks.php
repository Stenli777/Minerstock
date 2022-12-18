<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class GerwinTasks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gerwin_tasks', function (Blueprint $table) {
            $table->id();

            $table->string('gerwin_id');
            $table->unsignedBigInteger('asic_id');
            $table->string('task_type');
            $table->string('task_data', 1000);
            $table->string('task_result', 3000)->nullable();
            $table->string('task_status', 100);

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
        Schema::dropIfExists('gerwin_tasks');
    }
}
