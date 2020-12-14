<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_content', function (Blueprint $table) {
            $table->id();
            $table->string('part')->comment('部分');
            $table->string('name')->comment('模块名');
            $table->text('description')->comment('描述')->nullable();
            $table->text('description_fr')->comment('描述')->nullable();
            $table->text('image')->comment('图片')->nullable();
            $table->text('image_fr')->comment('图片')->nullable();
            $table->text('page_content')->comment('页面内容')->nullable();
            $table->text('page_content_fr')->comment('页面内容')->nullable();
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
        Schema::dropIfExists('about');
    }
}
