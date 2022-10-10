<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromotersTable extends Migration
{
    /**
     * Run the migrations.
     * 推广员列表
     * @return void
     */
    public function up()
    {
        Schema::create('promoters', function (Blueprint $table) {
           $table->increments('id');
            $table->string('username')->comment('用户姓名');
            $table->string('email')->unique()->comment('用户登录名');
            $table->enum('sex',[0,1])->comment('性别');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->tinyInteger('status')->default(1)->comment('账号是否可用');
            $table->string('solt')->comment('盐');
            $table->string('phone')->comment('手机号码');
            $table->rememberToken();
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
        Schema::dropIfExists('promoters');
    }
}
