<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLecturersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('lecturers'))
            Schema::create('lecturers', function (Blueprint $table) {
                $table->increments('id');
                $table->string('names');
                $table->string('telephone');
                $table->string('email');
                $table->timestamps();
                $table->softDeletes();
            });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('lecturers');
    }

}
