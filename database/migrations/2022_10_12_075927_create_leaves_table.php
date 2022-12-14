<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leaves', function (Blueprint $table) {
            $table->id()->comment('編號')->nullable(false);

            $table->foreignId('sbid')->comment('學生編號(外部鍵)')->nullable(false)->unsigned();
            $table->foreign('sbid')
                ->references('id')->on('records')
                ->onDelete('cascade');

            $table->date('start')->comment('外宿日起')->nullable(false);
            $table->date('end')->comment('外宿日訖')->nullable(false);
            $table->string('reason',191)->comment('外宿原因')->nullable(false);
            $table->boolean('check')->comment('樓長審核')->nullable(false);
            $table->boolean('housemaster_check')->comment('宿舍輔導員審核')->nullable(false);
            // 底下是建立與修改時間
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
        Schema::dropIfExists('leaves');
    }
}
