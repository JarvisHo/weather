<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConditionPrizeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('condition_prize', function (Blueprint $table) {
            $table->unsignedBigInteger('condition_id')->nullable()->index(); // 抽獎條件
            $table->unsignedBigInteger('prize_id')->nullable()->index(); // 抽中的獎項
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('condition_prize');
    }
}
