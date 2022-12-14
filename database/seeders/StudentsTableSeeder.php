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
        $positions = ['??????', '?????????', '??????', '??????', '??????', '??????', '????????????', '??????', '??????'];
        return $positions[rand(0, count($positions)-1)];

    }
    public function generateRandomClass() {
        $class = ['?????????A', '?????????B', '?????????C', '?????????A', '?????????C', '?????????A', '?????????B', '?????????C', '?????????B'];
        return $class[rand(0, count($class)-1)];

    }
    public function generateRandomSalutation() {
        $salutation = ['???','???','???','??????','??????'];
        return $salutation[rand(0, count($salutation)-1)];

    }
    // public function generateRandomAddress() {
    //     $address = '???????????????????????????123???10???20???3???';
        
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
                'address' => '???????????????????????????123???10???20???3???',
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
