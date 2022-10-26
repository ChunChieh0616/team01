<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('students')->insert([
            "number"=> "D1094181008",
            "class" => "資網三A",
            "name" => "楊竣捷",
            "address" => "桃園市龜山區萬壽路一段300號",
            "phone" => "02-82093214",
            "nationality" => "台灣",
            "guardian" => "王零二",
            "salutation" => "母",
            "remark" => " ",
        ]);
    }
}
