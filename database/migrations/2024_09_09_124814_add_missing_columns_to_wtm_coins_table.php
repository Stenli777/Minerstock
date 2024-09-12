<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMissingColumnsToWtmCoinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('wtm_coins', function (Blueprint $table) {
            $table->float('block_reward3', 50, 30)->nullable()->after('block_reward24');
            $table->float('block_reward7', 50, 30)->nullable()->after('block_reward3');
            $table->float('difficulty3', 50, 30)->nullable()->after('difficulty24');
            $table->float('difficulty7', 50, 30)->nullable()->after('difficulty3');
            $table->float('exchange_rate3', 50, 30)->nullable()->after('exchange_rate24');
            $table->float('exchange_rate7', 50, 30)->nullable()->after('exchange_rate3');
            $table->string('pool_fee')->nullable()->after('market_cap');
            $table->string('revenue')->nullable()->after('btc_revenue24');
            $table->string('cost')->nullable()->after('revenue');
            $table->string('profit')->nullable()->after('cost');
            $table->string('status')->nullable()->after('profit');
            $table->string('timestamp')->nullable()->change();
            $table->boolean('testing')->default(false)->after('lagging');
            $table->boolean('listed')->default(true)->after('testing');
            $table->string('estimated_rewards24')->nullable()->change();
            $table->string('btc_revenue24')->nullable()->change();
            $table->string('profitability')->nullable()->change();
            $table->string('profitability24')->nullable()->change();
            $table->float('estimated_rewards')->nullable()->change();
            $table->float('estimated_rewards24')->nullable()->change();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('wtm_coins', function (Blueprint $table) {
            $table->dropColumn('block_reward3');
            $table->dropColumn('block_reward7');
            $table->dropColumn('difficulty3');
            $table->dropColumn('difficulty7');
            $table->dropColumn('exchange_rate3');
            $table->dropColumn('exchange_rate7');
            $table->dropColumn('pool_fee');
            $table->dropColumn('revenue');
            $table->dropColumn('cost');
            $table->dropColumn('profit');
            $table->dropColumn('status');
            $table->dropColumn('testing');
            $table->dropColumn('listed');
            $table->string('estimated_rewards24')->nullable(false)->change();
            $table->string('btc_revenue24')->nullable(false)->change();
            $table->string('profitability')->nullable(false)->change();
            $table->string('profitability24')->nullable(false)->change();
            $table->timestamp('timestamp')->nullable()->change();



        });
    }
}
