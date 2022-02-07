<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/** 折扣券可大量生產 */
class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->index()->unique();
            $table->string('title');
            $table->string('code')->index()->unique();
            $table->unsignedInteger('type'); // 折扣類型
            $table->unsignedInteger('amount'); // 折扣類型
            $table->unsignedInteger('expire_in_days'); // 折扣類型
            $table->unsignedBigInteger('condition_id')->nullable()->index(); // 抽獎條件
            $table->unsignedBigInteger('prize_id')->nullable()->index(); // 抽中的獎項
            $table->unsignedBigInteger('user_id')->index()->nullable()->comment('派發後設定持有者');
            $table->dateTime('expired_at')->index()->nullable()->comment('派發後設定過期時間');
            $table->dateTime('used_at')->index()->nullable()->comment('使用後設定時間');
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
        Schema::dropIfExists('coupons');
    }
}
