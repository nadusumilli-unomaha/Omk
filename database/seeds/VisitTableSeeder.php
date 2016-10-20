<?php

use Illuminate\Database\Seeder;

class VisitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
    	$visit_student_0 = Student::where('name','Student')->first();
    	$visit_user_0 = User::whereHas('roles', function ($query) {
                            $query->where('name', 'like', 'Mentor');
                        })->first();

        $visit->check = 'Absent';
        $visit->Date = '2016-10-29';
        $visit->save();
        $visit->students()->attach($visit_student_0);
        $visit->users()->attach($visit_user_0);
    }
}
