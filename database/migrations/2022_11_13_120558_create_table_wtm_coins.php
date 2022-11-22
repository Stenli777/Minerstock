<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableWtmCoins extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wtm_coins', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('coin_id');
            $table->string('name');
            $table->string('tag');
            $table->string('algorithm');
            $table->string('block_time');
            $table->float('block_reward',50,30);
            $table->float('block_reward24',50,30);
            $table->integer('last_block');
            $table->float('difficulty',50,30);
            $table->float('difficulty24',50,30);
            $table->string('nethash');
            $table->float('exchange_rate',50,30);
            $table->float('exchange_rate24',50,30);
            $table->float('exchange_rate_vol',50,30);
            $table->string('exchange_rate_curr');
            $table->string('market_cap');
            $table->string('estimated_rewards');
            $table->string('estimated_rewards24');
            $table->string('btc_revenue');
            $table->string('btc_revenue24');
            $table->integer('profitability');
            $table->integer('profitability24');
            $table->boolean('lagging');
            $table->timestamp('timestamp')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wtm_coins');
    }
}
