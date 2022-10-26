<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BedTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function generateRandomBedcode() {
        $number = '0123456789';
        $Bedcode = '';
        $numberLength = strlen($number);
        for ($i = 0; $i < 5; $i++) {
            $Bedcode .= $number[rand(0, $numberLength - 1)];
        }
        $Bedcode .= '-';
        $Bedcode .= $number[rand(0, $numberLength - 1)];
        return $Bedcode;
    }
    public function generateRandomBid() {
        $Bid = ['2','4','5','1','3'];
        return $Bid[rand(0, count($Bid)-1)];

    }
    public function generateRandomRoomtype() {
        $Roomtype = ['兩人房','三人房','四人房'];
        return $Roomtype[rand(0, count($Roomtype)-1)];

    }
    public function run()
    {
        for ($i=0; $i<10; $i++){
        $bedcode = $this->generateRandomBedcode();
        $bid = $this->generateRandomBid();
        $roomtype = $this->generateRandomRoomtype();
        $random_datetime = Carbon::now()->subMinutes(rand(1, 55));
        DB::table('beds')->insert([
            'bedcode' => $bedcode,
            'bid' => $bid,
            'roomtype' => $roomtype,
            'created_at' => $random_datetime,
            'updated_at' => $random_datetime
        ]);

        }
    }
}
