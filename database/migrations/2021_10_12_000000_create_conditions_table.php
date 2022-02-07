<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * 可抽獎的條件，在完成洗車紀錄後檢查
 * 符合條件可抽獎，獎項
 */
class CreateConditionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conditions', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->index()->unique();
            $table->string('title')->comment('標題');
            $table->unsignedTinyInteger('target')->comment('0:洗車次數,1:項目,2:標籤')->default(0)->index();
            $table->unsignedBigInteger('target_id')->nullable()->comment('可指定特定項目或標籤')->index();
            $table->unsignedInteger('threshold')->comment('次數門檻');
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
        Schema::dropIfExists('conditions');
    }
}
