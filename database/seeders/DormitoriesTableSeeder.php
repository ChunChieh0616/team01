<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DormitoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function generateRandomDName($i) {
        $dname = ['男一宿', '女一宿', '女二宿', '涵青館'];
        return $dname[$i];

    }
    public function generateRandomString($length = 10) {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    public function generateRandomName() {
        $first_name = $this->generateRandomString(rand(2, 15));
        $first_name = strtolower($first_name);
        $first_name = ucfirst($first_name);
        $last_name = $this->generateRandomString(rand(2, 15));
        $last_name = strtolower($last_name);
        $last_name = ucfirst($last_name);
        $name = $first_name . " ". $last_name;
        return $name;
    }
    public function generateRandomPhone() {
        $number = '0123456789';
        $phone_number = '09-';
        $numberLength = strlen($number);
        for ($i = 0; $i < 8; $i++) {
            $phone_number .= $number[rand(0, $numberLength - 1)];
        }
        return $phone_number;
    }

    public function run()
    {
        for ($i=0; $i<4; $i++){
            $name = $this->generateRandomName();
            $dname = $this->generateRandomDName($i);
            $phone_number = $this->generateRandomPhone();
            $random_datetime = Carbon::now()->subMinutes(rand(1, 55));
            DB::table('dormitories')->insert([
                'name' => $dname,
                'housemaster' => $name,
                'contact' => $phone_number,
                'created_at' => $random_datetime,
                'updated_at' => $random_datetime
            ]);
        }
        
    }
}
