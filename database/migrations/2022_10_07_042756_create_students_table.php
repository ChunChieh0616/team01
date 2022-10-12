<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id()->comment('編號')->nullable(false);
            $table->string('number',191)->comment('學號')->nullable(false);
            $table->string('class',191)->comment('班級')->nullable(false);
            $table->string('name',191)->comment('姓名')->nullable(false);
            $table->string('address',191)->comment('地址')->nullable(true);
            $table->string('phone',191)->comment('電話')->nullable(true);
            $table->string('nationality',191)->comment('國籍')->nullable(true);
            $table->string('guardian',191)->comment('關係人')->nullable(false);
            $table->string('salutation',191)->comment('稱謂')->nullable(false);
            $table->string('remark',191)->comment('備註')->nullable(true);
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
        Schema::dropIfExists('students');
    }
}
