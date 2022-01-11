<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = "مدير النظام";
        $user->password = Hash::make('password');
        $user->role = "مدير";
        $user->phone = "0123456789";
        $user->email = "admin@site.com";
        // $user->status = "1";
        $user->save();
    }
}