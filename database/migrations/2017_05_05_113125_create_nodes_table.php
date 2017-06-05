<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNodesTable extends Migration
{
    public function up()
    {
        Schema::create('nodes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 128);
            $table->tinyInteger('is_show')->default(1);// 1 显示，0 隐藏
            $table->tinyInteger('sort')->default(0);
            $table->string('domain', 128);// 节点的地址
            $table->string('method', 64)->default('chacha20');
            $table->tinyInteger('is_custom_method')->default(1);
            $table->string('info');
            $table->string('status', 64)->default('正常'); // 状态，正常/维护中
            $table->tinyInteger('type')->default(1); // 0 免费，1 收费
            $table->mediumInteger('port')->default(8888);// 免费的节点才需要
            $table->string('passwd')->default("tiantizi.com"); // 免费的节点才需要
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
        Schema::dropIfExists('nodes');
    }
}
