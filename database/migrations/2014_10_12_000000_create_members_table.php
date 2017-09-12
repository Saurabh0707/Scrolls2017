<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('course');
            $table->integer('year');
            $table->string('student_no');
            $table->string('contact_no');
            $table->boolean('accomodation');
            $table->string('college_name');
            $table->string('password');
            $table->boolean('teamlead')->default(0);
            $table->integer('team_id')->unsigned();
            $table->timestamps();

            $table->foreign('team_id')->references('id')->on('teams');

        });

        //DB::update('ALTER TABLE members AUTO_INCREMENT = 100');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
}
