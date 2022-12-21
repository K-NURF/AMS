<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
       \App\Models\User::factory(1)->create([
            'email' => 'test@example.com',
            'password' => '$2y$10$T2rH4.lab5y556n.LO3OOO7nzUDAn5Vikp0O//3aAFS9P3//BMst6', // password
            'user_type' => 'admin',
            'religion' => 'Christian',


        ]);
        \App\Models\User::factory(10)->create([
            'user_type' => 'applicant',
            'country' => 'Germany',
        ]);
        
        \App\Models\User::factory(10)->create([
            'user_type' => 'student',
            'course' => 'BICS',
            'time' => '1.1',
            'religion' => 'Christian',
            'high_school' => 'Strathmore School',
            'DOB' => '2000-12-12',
            'password' => '$2y$10$T2rH4.lab5y556n.LO3OOO7nzUDAn5Vikp0O//3aAFS9P3//BMst6', // password

        ]);

 
    }
}
