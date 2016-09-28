<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('mentor_id')->unsigned();
            $table->integer('student_id')->unsigned();
            $table->integer('employee_id')->unsigned();
            $table->integer('admin_id')->unsigned();
            $table->string('check');
            $table->date('Date');
            $table->timestamps();
        });
        
        Schema::table('attendances', function (Blueprint $table) {
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
        Schema::dropIfExists('attendances');
    }
}
