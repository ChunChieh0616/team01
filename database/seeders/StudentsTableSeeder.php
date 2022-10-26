<?php

namespace Database\Seeders;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
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
    public function generateRandomGuardianName() {
        $first_name_G = $this->generateRandomString(rand(2, 15));
        $first_name_G = strtolower($first_name_G);
        $first_name_G = ucfirst($first_name_G);
        $last_name_G = $this->generateRandomString(rand(2, 15));
        $last_name_G = strtolower($last_name_G);
        $last_name_G = ucfirst($last_name_G);
        $GuardianName = $first_name_G . " ". $last_name_G;
        return $GuardianName;
    }
    public function generateRandomNumber() {
        $number = '0123456789';
        $class_number = 'D';
        $numberLength = strlen($number);
        for ($i = 0; $i < 10; $i++) {
            $class_number .= $number[rand(0, $numberLength - 1)];
        }
        return $class_number;
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

    public function generateRandomNationality() {
        $positions = ['美國', '土耳其', '法國', '印度', '非洲', '中國', '塞爾維亞', '英國', '台灣'];
        return $positions[rand(0, count($positions)-1)];

    }
    public function generateRandomClass() {
        $class = ['資網三A', '資網一B', '財金二C', '資網一A', '機械二C', '電子三A', '遊戲四B', '資管二C', '電機四B'];
        return $class[rand(0, count($class)-1)];

    }
    public function generateRandomSalutation() {
        $salutation = ['父','母','姊','祖父','祖母'];
        return $salutation[rand(0, count($salutation)-1)];

    }
    // public function generateRandomAddress() {
    //     $address = '桃園市龜山區龜山里123巷10弄20號3樓';
        
    //     return $address;
    // }
    public function run()
    {
        for ($i=0; $i<10; $i++)
        {
            $name = $this->generateRandomName();
            $ClassNumber = $this->generateRandomNumber();
            $Class = $this->generateRandomClass();
            //$Address = $this ->generateRandomAddress();
            $Phone = $this ->generateRandomPhone();
            $nationality = $this ->generateRandomNationality();
            $Salutation = $this ->generateRandomSalutation();
            $GuardianName=$this->generateRandomGuardianName();
            $random_datetime = Carbon::now()->subMinutes(rand(1, 55));
            
            DB::table('students')->insert([
                'number' => $ClassNumber,
                'class' => $Class,
                'name' => $name,
                'address' => '桃園市龜山區龜山里123巷10弄20號3樓',
                'phone' => $Phone,
                'nationality' => $nationality,
                'guardian' => $GuardianName,
                'salutation' => $Salutation,
                'created_at' => $random_datetime,
                'updated_at' => $random_datetime
            ]);
        }
    }    
}
