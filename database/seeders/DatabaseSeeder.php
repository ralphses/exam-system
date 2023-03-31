<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Course;
use App\Models\School;
use App\Models\User;
use Illuminate\Database\Seeder;
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

        School::create([
            "name" => "Federal University of Lafia",
            "email" => "exams@fulafia.edu.ng"
        ]);

        User::factory()->create([
            "school_id" => 1,
            "name" => "Dominic A",
            "role" => "LEVEL ADVISER",
            "email" => "exams@fulafia.edu.ng",
            "password" => Hash::make("exams@fulafia.edu.ng"),
            "remember_token" => null,
            "email_verified_at" => date("Y-m-d h:m:s")
        ]);

        User::factory()->create([
            "school_id" => 1,
            "name" => "Abdullahi Mohammed",
            "role" => "INVIGILATOR",
            "email" => "abdul.exams@fulafia.edu.ng",
            "password" => Hash::make("abdul.exams@fulafia.edu.ng"),
            "remember_token" => null,
            "email_verified_at" => date("Y-m-d h:m:s")
        ]);

        Course::create([
            "school_id" => 1,
            "title" => "General Mathematics I",
            "code" => "MTH111",
            "unit" => 3
        ]);

        Course::create([
            "school_id" => 1,
            "title" => "General Mathematics II",
            "code" => "MTH121",
            "unit" => 3
        ]);

        Course::create([
            "school_id" => 1,
            "title" => "Introduction to Computer Science",
            "code" => "CSC111",
            "unit" => 3
        ]);

        Course::create([
            "school_id" => 1,
            "title" => "Introduction to Problem Solving and Algorithms",
            "code" => "CSC121",
            "unit" => 3
        ]);

        Course::create([
            "school_id" => 1,
            "title" => "Management Information Science",
            "code" => "CSC222",
            "unit" => 2
        ]);

    }
}
