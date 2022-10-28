<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lates', function (Blueprint $table) {
            $table->id()->comment('編號')->nullable(false);

            $table->foreignId('sbid')->comment('學生編號(外部鍵)')->nullable(false)->unsigned();
            $table->foreign('sbid')
                ->references('id')->on('records')
                ->onDelete('cascade');

            $table->date('start')->comment('長期晚歸日起')->nullable(false);
            $table->date('end')->comment('長期晚歸日訖')->nullable(false);
            $table->string('reason',191)->comment('長期晚歸原因')->nullable(false);
            $table->string('company',191)->comment('單位名稱')->nullable(false);
            $table->string('contact',191)->comment('連絡電話')->nullable(false);
            $table->string('address',191)->comment('聯絡地址')->nullable(false);
            $table->date('back_time')->comment('預計每日返回宿舍時間')->nullable(false);
            $table->boolean('file_data')->comment('佐證圖檔資料')->nullable(false);
            $table->boolean('file_check')->comment('佐證資料審核')->nullable(false);
            $table->boolean('check')->comment('樓長審核')->nullable(false);
            $table->boolean('chief_check')->comment('總樓長審核')->nullable(false);
            $table->boolean('housenaster_check')->comment('宿舍輔導員審核')->nullable(false);
            $table->boolean('admin_check')->comment('行政審核')->nullable(false);
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
        Schema::dropIfExists('lates');
    }
}
