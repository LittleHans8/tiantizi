<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGiftCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gift_codes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->tinyInteger('type');// 0 一个月 1 一个季度（三个月），2 半年 ，3 一年，4 两年
            $table->tinyInteger('is_used')->default(0);//  0 未用，1 已经使用
            $table->unsignedSmallInteger('transfer_value'); // 礼品卡代表的流量数额,GB 为单位
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
        Schema::dropIfExists('gift_codes');
    }
}
