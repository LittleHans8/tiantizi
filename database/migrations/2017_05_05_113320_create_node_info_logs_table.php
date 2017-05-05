<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNodeInfoLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('node_info_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('node_id');
            $table->float('uptime'); // cat /proc/uptime 运行时间，以秒为单位
            $table->string('load',32); // cat /proc/loadavg 负载情况
            $table->integer('log_time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('node_info_logs');
    }
}
