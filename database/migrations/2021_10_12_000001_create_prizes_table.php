<?php

use App\Models\Prize;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/** 獎池，從中抽出獎品可得折扣券 */
class CreatePrizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prizes', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->index()->unique();
            $table->string('title');
            $table->unsignedInteger('rate')->comment('中獎率: 所有獎項加總後計算機率');
            $table->unsignedTinyInteger('type')->default(0)->comment('獎項類型[0:落空,1:贈送折扣券]');
            $table->unsignedTinyInteger('coupon_type')->default(0)->comment('產出的折扣券類型[0:折現金,1:打折]');
            $table->unsignedInteger('coupon_amount')->default(0)->comment('產出的折扣券[折扣額度]');
            $table->unsignedInteger('coupon_expire_in_days')->default(30)->comment('產出的折扣券[有效天數]');
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
        Schema::dropIfExists('prizes');
    }
}
