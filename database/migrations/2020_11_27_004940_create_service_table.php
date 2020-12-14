<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_content', function (Blueprint $table) {
            $table->id();
            $table->string('part')->comment('部分');
            $table->string('name')->comment('模块名');
            $table->string('title')->comment('标题')->nullable();
            $table->text('description')->comment('描述')->nullable();
            $table->text('image')->comment('图片')->nullable();
            $table->string('hoverText')->comment('悬浮字')->nullable();
            $table->text('pageContent')->comment('页面内容')->nullable();
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
        Schema::dropIfExists('service');
    }
}
