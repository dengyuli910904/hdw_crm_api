<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlatUserInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plat_user_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username')->comment('用户名称');
            $table->string('phone')->comment('用户手机号码');
            $table->string('ip')->comment('用户请求IP');
            $table->string('source')->comment('数据来源 web');
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
        Schema::dropIfExists('plat_user_infos');
    }
}
