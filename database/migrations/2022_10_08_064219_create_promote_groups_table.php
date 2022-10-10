<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromoteGroupsTable extends Migration
{
    /**
     * Run the migrations.
     * 推广数据
     * @return void
     */
    public function up()
    {
        Schema::create('promote_groups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('url')->comment('群网址');
            $table->string('name')->comment('群名称');
            $table->integer('members_count')->default(0)->comment('群成员数量');
            $table->string('pictures')->comment('群截图');
            $table->integer('active_members')->comment('实际活跃人数');
            $table->integer('status')->default(0)->comment('0 未完成，1 已完成');
            $table->unsignedInteger('promoter_id')->comment('推广人员id');
            $table->string('opterator')->comment('操作人');
            $table->timestamps();
            $table->softDeletes();
            //添加外键
            $table->foreign('promoter_id')->references('id')->on('promoters');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('promote_groups');
    }
}
