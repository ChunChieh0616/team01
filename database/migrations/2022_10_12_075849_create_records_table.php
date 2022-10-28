<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('records', function (Blueprint $table) {
            $table->id()->comment('編號')->nullable(false);
            $table->string('school_year',191)->comment('學年')->nullable(false);
            $table->string('semester',191)->comment('學期')->nullable(false);

            $table->foreignId('sid')->comment('學生編號(外部鍵)')->nullable(false)->unsigned();
            $table->foreign('sid')
                ->references('id')->on('students')
                ->onDelete('cascade');

            $table->foreignId('bid')->comment('床位(外部鍵)')->nullable(false)->unsigned();
            $table->foreign('bid')
                ->references('id')->on('beds')
                ->onDelete('cascade');

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
        Schema::dropIfExists('records');
    }
}
