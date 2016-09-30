<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMentorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mentors', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('lastName');
            $table->string('firstName');
            $table->integer('admin_id')->unsigned();
            $table->integer('employee_id')->unsigned();
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->integer('zip');
            $table->string('email');
            $table->integer('phone');
            $table->string('type');
            $table->timestamps();
        });

        Schema::table('mentors', function (Blueprint $table) {
           $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');
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
        Schema::dropIfExists('mentors');
    }
}
