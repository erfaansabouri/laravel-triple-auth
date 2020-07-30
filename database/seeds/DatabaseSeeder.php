<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'fname' => "morteza",
            'lname' => "keshtkaran",
            'email' => "morteza.keshtkaran".'@gmail.com',
            'password' => Hash::make('password'),
        ]);

        DB::table('advisors')->insert([
            'fname' => "mohammad",
            'lname' => "taheri",
            'email' => "mohammad.taheri".'@gmail.com',
            'password' => Hash::make('password'),
        ]);

        DB::table('students')->insert([
            'fname' => "erfan",
            'lname' => "moeini",
            'email' => "erfan.moeini".'@gmail.com',
            'entry_year' => 1398,
            'student_code' => 9832578,
            'password' => Hash::make('password'),
        ]);
    }
}
