<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User_data;
use Faker\Factory as Faker;

class user_dataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for($i=1;$i<=40;$i++){

            $user_data = new User_data;
            $user_data->name = $faker->name;
            $user_data->username = $faker->userName;
            // $user_data->mobile  = ''; // Replace with your desired phone number prefix
            $user_data->mobile = $faker->numerify('##########'); // Replace 10 with the desired length of phone number
            $user_data->email = $faker->email;
            $user_data->gender =  $faker->randomElement(['m', 'f', 'o']);
            $user_data->dob = $faker->date;
            $password = $faker->password;
            $user_data->password = bcrypt($password); // hash and salt the password
            $user_data->confirm_pass = bcrypt($password); // hash and salt the confirmation password
            $user_data->save();
        }
    }
}
