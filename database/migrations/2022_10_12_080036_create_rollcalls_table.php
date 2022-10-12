<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRollcallsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rollcalls', function (Blueprint $table) {
            $table->id()->comment('編號')->nullable(false);
            $table->date('date')->comment('點名日期')->nullable(false);
            $table->integer('bid')->comment('床位編號(外部鍵)')->nullable(false)->unsigned();
            $table->boolean('presence')->comment('在場與否')->nullable(false);
            $table->boolean('leaves')->comment('外宿')->nullable(false);
            $table->boolean('late')->comment('晚歸')->nullable(false);
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
        Schema::dropIfExists('rollcalls');
    }
}
