<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beds', function (Blueprint $table) {
            $table->id()->comment('編號')->nullable(false);
            $table->string('bedcode',191)->comment('床位代碼')->nullable(false);

            $table->foreignId('did')->unsigned()->comment('宿別(外部鍵)')->nullable(false);
            $table->foreign('did')
                ->references('id')->on('dormitories')
                ->onDelete('cascade');

            $table->string('roomtype',191)->comment('住房類型')->nullable(false);
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
        Schema::dropIfExists('beds');
    }
}
