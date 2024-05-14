<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin_Data;
use Illuminate\Support\Facades\Hash;

class newAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = new Admin_Data;

        $admin->Admin_name = "Joy Abdin Sana";
        $admin->Admin_id = "LARAVEL000048";
        $admin->Password = Hash::make("LARAVEL000048");
        $admin->save();

        //
    }
}
