<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('Description');
            $table->integer('mentor_id')->unsigned();
            $table->integer('attendance_id')->unsigned();
            $table->integer('student_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('notes', function (Blueprint $table) {
           $table->foreign('attendance_id')->references('id')->on('attendances')->onDelete('cascade');
           $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
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
        Schema::dropIfExists('notes');
    }
}
