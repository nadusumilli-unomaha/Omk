<?php

use Illuminate\Database\Seeder;

class GradeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$grade_student_0 = Student::where('name','Student')->first();

        $grade->subject = 'Mathematics';
        $grade->period = '3 credits';
        $grade->actual = '4.0';
        $grade->comments = 'He did very well in the class';
        $grade->save();
        $grade->students()->attach($grade_student_0);
    }
}
