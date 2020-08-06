<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Ybazli\Faker\Facades\Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $colleges = [
            "دانشکده مهندسی برق",
            "دانشکده مهندسی کامپیوتر",
            "دانشکده مهندسی عمران",
            "دانشکده مهندسی شیمی",
            "دانشکده مهندسی هسته ای",
        ];
        for($i = 0; $i < 4; $i++) {

            App\College::create([
                'name' => $colleges[$i],
            ]);
        }

        $fields = [
            "کارشناسی",
            "کارشناسی",
            "کارشناسی",
            "کارشناسی",

        ];
        for($i = 0; $i < 4; $i++) {

            App\Field::create([
                'name' => $fields[$i],
                'college_id' => $i+1,
            ]);
        }


        $branches = [
            "گرایش مخابرات",
            "گرایش نرم/سخت",
            "گرایش ساختمان",
            "گرایش نیروگاه",

        ];
        for($i = 0; $i < 4; $i++) {

            App\Branch::create([
                'name' => $branches[$i],
                'field_id' => $i+1,
            ]);
        }




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
            'branch_id' => rand(1,4),
            'password' => Hash::make('password'),
        ]);


        for($i = 0; $i < 40; $i++) {
            App\Advisor::create([
                'fname' => Faker::firstName(),
                'lname' => Faker::lastName(),
                'email' => Faker::email(),
                'branch_id' => rand(1,4),
                'password' => Hash::make('password'), // password
            ]);
        }



        DB::table('students')->insert([
            'fname' => "erfan",
            'lname' => "moeini",
            'email' => "erfan.moeini".'@gmail.com',
            'entry_year' => 1398,
            'student_code' => 9832578,
            'advisor_id' =>rand(1,4),
            'branch_id' => rand(1,4),
            'password' => Hash::make('password'),
        ]);


        for($i = 0; $i < 40; $i++) {
            App\Student::create([
                'fname' => Faker::firstName(),
                'lname' => Faker::lastName(),
                'email' => Faker::email(),
                'entry_year' => 1398,
                'student_code' => rand(9832500,9832999),
                'advisor_id' =>rand(1,4),
                'branch_id' => rand(1,4),
                'password' => Hash::make('password'), // password
            ]);
        }


    }
}
