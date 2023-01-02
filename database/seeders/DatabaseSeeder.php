<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Staff;
use App\Models\Units;
use App\Models\School;
use App\Models\Classes;
use App\Models\Lecturer;
use App\Models\unitsLists;
use App\Models\studentClasses;
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
        if(!User::where('email', 'test@example.com')->exists()){
        \App\Models\User::factory(1)->create([
            'email' => 'test@example.com',
            'password' => '$2y$10$T2rH4.lab5y556n.LO3OOO7nzUDAn5Vikp0O//3aAFS9P3//BMst6', // password
            'user_type' => 'admin',
            'religion' => 'Christian',
        ]);
    }
        \App\Models\User::factory(10)->create([
            'user_type' => 'applicant',
            'country' => 'Germany',
            'status'=> '1',
        ]);

        $students = \App\Models\User::factory(6)->create([
            'user_type' => 'student',
            'course' => 'BICS',
            'semester' => '1.1',
            'religion' => 'Christian',
            'high_school' => 'Strathmore School',
            'DOB' => '2000-12-12',
            'password' => '$2y$10$T2rH4.lab5y556n.LO3OOO7nzUDAn5Vikp0O//3aAFS9P3//BMst6', // password

        ]);
        $students = \App\Models\User::factory(4)->create([
            'user_type' => 'student',
            'course' => 'BICS',
            'semester' => '1.1',
            'country' => 'Burundi',
            'religion' => 'Christian',
            'high_school' => 'Strathmore School',
            'DOB' => '2000-12-12',
            'password' => '$2y$10$T2rH4.lab5y556n.LO3OOO7nzUDAn5Vikp0O//3aAFS9P3//BMst6', // password

        ]);

        \App\Models\User::factory(7)->create([
            'user_type' => 'lecturer',
            'religion' => 'Christian',
            'DOB' => '1970-12-12',
            'password' => '$2y$10$T2rH4.lab5y556n.LO3OOO7nzUDAn5Vikp0O//3aAFS9P3//BMst6', // password

        ]);

        \App\Models\User::factory(20)->create([
            'user_type' => 'staff',
            'religion' => 'Christian',
            'DOB' => '1970-12-12',
            'password' => '$2y$10$T2rH4.lab5y556n.LO3OOO7nzUDAn5Vikp0O//3aAFS9P3//BMst6', // password

        ]);

        $schools = ['School of Mathematics', 'School of Business', 'School of Computing', 'School of Engineering'];

        for ($i = 0; $i <= 3; $i++) {
            School::factory()->create([
                'name' => $schools[$i]
            ]);
        }

        for ($i = 22; $i <= 27; $i++) {
            Lecturer::factory()->create([
                'lecturer_id' => $i,
                'school_id' => '3'
            ]);
        }

        Lecturer::factory()->create([
            'lecturer_id' => '28',
            'school_id' => '1'
        ]);

        $units = ['Linear algebra', 'Discrete math', 'Pure mathematics', 'Applied mathematics', 'Business mathematics', 'Entrepreneurship', 'Accounting', 'Economics', 'Business Law', 'Human Resource Management', 'Artificial Intelligence', 'Computer Fundamentals', 'Object Oriented Programming', 'Web Application', 'Mobile Application Development', 'Internet Application Programming', 'Power Mechanics', 'Electrical Installation', 'AutoCAD', 'Physics', 'Civil Engineering Basics'];

        for($i = 0; $i <= 4; $i++){
            unitsLists::factory()->create([
                'name' => $units[$i],
                'school_id' => '1'
            ]);
        }
        for($i = 5; $i <= 9; $i++){
            unitsLists::factory()->create([
                'name' => $units[$i],
                'school_id' => '2'
            ]);
        }
        for($i = 10; $i <= 15; $i++){
            unitsLists::factory()->create([
                'name' => $units[$i],
                'school_id' => '3'
            ]);
        }
        for($i = 16; $i <= 20; $i++){
            unitsLists::factory()->create([
                'name' => $units[$i],
                'school_id' => '4'
            ]);
        }

        for($i = 10; $i <= 15; $i++){
            Units::factory()->create([
                'units_list_id' => $i
            ]);

        }
        $start_time = ['08:00', '09:00', '10:00', '11:00', '12:00', '13:00'] ;
        $end_time = ['09:00', '10:00', '11:00', '12:00', '13:00', '14:00'] ;


        for ($i = 22; $i <= 27; $i++) {
            Classes::factory()->create([ //lecterers in school of computing
                'lecturer_id' => $i,
                'units_id' => ($i - 21),
                'weekday' => ($i - 21),
                'start_time' => $start_time[($i-22)],
                'end_time' => $end_time[($i-22)],
            ]);
        }

        for ($i = 1; $i <= 6; $i++) {
            studentClasses::factory()->create([
                'student_id' => '12',
                'classes_id' => $i
            ]);
        }
        for ($i = 1; $i <= 6; $i++) {
            studentClasses::factory()->create([
                'student_id' => '13',
                'classes_id' => $i
            ]);
        }
        for ($i = 1; $i <= 6; $i++) {
            studentClasses::factory()->create([
                'student_id' => '15',
                'classes_id' => $i
            ]);
        }
        for ($i = 1; $i <= 6; $i++) {
            studentClasses::factory()->create([
                'student_id' => '16',
                'classes_id' => $i
            ]);
        }
        for ($i = 1; $i <= 6; $i++) {
            studentClasses::factory()->create([
                'student_id' => '17',
                'classes_id' => $i
            ]);
        }
        for ($i = 1; $i <= 6; $i++) {
            studentClasses::factory()->create([
                'student_id' => '18',
                'classes_id' => $i
            ]);
        }
        for ($i = 1; $i <= 6; $i++) {
            studentClasses::factory()->create([
                'student_id' => '19',
                'classes_id' => $i
            ]);
        }
        for ($i = 1; $i <= 6; $i++) {
            studentClasses::factory()->create([
                'student_id' => '20',
                'classes_id' => $i
            ]);
        }
        for ($i = 1; $i <= 6; $i++) {
            studentClasses::factory()->create([
                'student_id' => '21',
                'classes_id' => $i
            ]);
        }

        for ($i = 29; $i <= 33; $i++) {
            Staff::factory()->create([
                'staff_id' => $i
            ]);
        }

        for ($i = 34; $i <= 38; $i++) {
            Staff::factory()->create([
                'staff_id' => $i,
                'department' => 'Caffeteria'
            ]);
        }
        for ($i = 39; $i <= 43; $i++) {
            Staff::factory()->create([
                'staff_id' => $i,
                'department' => 'Clinic'
            ]);
        }
        for ($i = 44; $i <= 48; $i++) {
            Staff::factory()->create([
                'staff_id' => $i,
                'department' => 'Labs'
            ]);
        }
    }
}
