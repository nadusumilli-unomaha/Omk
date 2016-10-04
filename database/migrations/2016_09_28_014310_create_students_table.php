<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('lastName');
            $table->string('firstName');
            $table->date('dob');
            $table->string('gender');
            $table->string('grade');
            $table->string('city');
            $table->string('state');
            $table->integer('zip');
            $table->string('email');
            $table->integer('phone');
            $table->string('school');
            $table->integer('admin_id')->unsigned();
            $table->integer('employee_id')->unsigned();
            $table->integer('mentor_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('students', function (Blueprint $table) {
           $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');
           $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
           $table->foreign('mentor_id')->references('id')->on('mentors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
