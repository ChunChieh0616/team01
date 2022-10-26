<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(BedTableSeeder::class);
        $this->call(DormitoriesTableSeeder::class);
        $this->call(RecordsTableSeeder::class);
        $this->call(LeavesTableSeeder::class);
        $this->call(LatesTableSeeder::class);
        $this->call(RollcallsTableSeeder::class);
        $this->call(StudentsTableSeeder::class);
    }
}
