<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RollcallsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function generateRandomSbid($i) {
        $sbid = ['1','2','3','4','5','6','7','8','9','10'];
        return $sbid[$i];

    }
    public function run()
    {
        for($i=0;$i<10;$i++){
            $random_datetime = Carbon::now()->subMinutes(rand(1, 55));
            $sbid= $this ->generateRandomSbid($i);
            
            DB::table('rollcalls')->insert([
                'date' => $random_datetime,
                'sbid' => $sbid,
                'created_at' => $random_datetime,
                'updated_at' => $random_datetime
            ]);
        }
        
        
    }
}
