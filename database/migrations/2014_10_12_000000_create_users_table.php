<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     * ss-mu 需要的字段 port,u,d,transfer_enable,passwd,switch,enable,method,email,id
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 128);
            $table->string('email', 64)->unique();
            $table->string('password');
            $table->rememberToken();
            $table->mediumInteger('port')->nullable()->unique(); // 端口号，开通后才给端口号
            $table->string('passwd')->default('0');// 密码,开通服务后才给端口号
            $table->bigInteger('u')->default(0);// upload
            $table->bigInteger('d')->default(0);// d
            $table->string('method', 64)->default('chacha20');
            $table->bigInteger('transfer_enable')->default(0); // 每个月默认可以多少
            $table->tinyInteger('enable')->default(1);
            $table->tinyInteger('switch')->default(1);
            $table->tinyInteger('is_vip')->default(0);
            $table->softDeletes();
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
        Schema::dropIfExists('users');
    }
}
