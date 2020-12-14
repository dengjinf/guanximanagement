<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_content', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('模块名');
            $table->string('china_address')->comment('中国地址')->nullable();
            $table->string('address')->comment('国外地址')->nullable();
            $table->string('phone')->comment('电话')->nullable();
            $table->string('email')->comment('邮箱')->nullable();
            $table->string('image')->comment('图片')->nullable();
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
        Schema::dropIfExists('contact');
    }
}
