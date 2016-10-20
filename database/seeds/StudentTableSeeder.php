<?php

use Illuminate\Database\Seeder;

class StudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$student_mentor_0 = User::whereHas('roles', function ($query) {
                            $query->where('name', 'like', 'Mentor');
                        })->first();

        $student = new Student();
        $student->firstName = 'Student';
        $student->lastName = 'test';
        $student->email = 'Student@gmail.com';
        $student->address = '7595 woodsworth plaza apt 4';
        $student->city = 'Omaha';
        $student->state = 'NE';
        $student->zip = '68135'; 
        $student->phone = '4027776666';
        $student->save();
        $student->users()->attach($student_mentor_0);
    }
}
