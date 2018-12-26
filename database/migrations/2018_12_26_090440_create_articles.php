<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->default('')->comment('标题');
            $table->string('keywords')->default('')->comment('关键字');
            $table->string('author')->default('')->comment('作者');
            $table->integer('category_id')->default(0)->comment('类别ID');
            $table->integer('order_by')->default(0)->comment('排序');
            $table->integer('is_top')->default(0)->comment('置顶');
            $table->integer('editor')->default(0)->comment('编辑者');
            $table->integer('publishd_time')->default(0)->comment('发布时间');
            $table->tinyInteger('status')->default(1)->comment('状态 1 保存 2 发布');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
