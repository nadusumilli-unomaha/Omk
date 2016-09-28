<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grades', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('subject');
            $table->string('period');
            $table->string('actual');
            $table->integer('mentor_id')->unsigned();
            $table->integer('student_id')->unsigned();
            $table->integer('employee_id')->unsigned();
            $table->integer('admin_id')->unsigned();
            $table->string('comments');
            $table->timestamps();
        });
        
        Schema::table('grades', function (Blueprint $table) {
           $table->foreign('mentor_id')->references('id')->on('mentors')->onDelete('cascade');
           $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');
           $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
           $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grades');
    }
}
