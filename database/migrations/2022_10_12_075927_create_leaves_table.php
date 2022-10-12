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
            $table->integer('sid')->comment('學生編號(外部鍵)')->nullable(false)->unsigned();
            $table->integer('did')->comment('宿別(外部鍵)')->nullable(false)->unsigned();
            $table->date('start')->comment('外宿日起')->nullable(false);
            $table->date('end')->comment('外宿日訖')->nullable(false);
            $table->string('reason',191)->comment('外宿原因')->nullable(false);
            $table->boolean('check')->comment('樓長審核')->nullable(false);
            $table->boolean('housemaster_check')->comment('宿舍輔導員審核')->nullable(false);
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
