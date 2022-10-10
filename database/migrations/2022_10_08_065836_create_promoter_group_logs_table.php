<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromoterGroupLogsTable extends Migration
{
    /**
     * Run the migrations.
     * 推广人员群操作日志表
     * @return void
     */
    public function up()
    {
        Schema::create('promoter_group_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('promote_group_id')->comment('群id');
            $table->integer('status')->default(0)->comment('0 未完成，1 已完成');
            $table->unsignedInteger('promoter_id')->comment('推广人员id');
            $table->timestamps();
            $table->foreign('promoter_id')->references('id')->on('promoters');
            $table->foreign('promote_group_id')->references('id')->on('promote_groups');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('promoter_group_logs');
    }
}
