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
            $table->bigIncrements('id');
            $table->bigInteger('std_id')->unique();
            $table->string('surname');
            $table->string('other_name');
            $table->date('date_of_birth');
            $table->enum('gender', ['Male', 'Female', 'Others']);
            $table->enum('marital_status', ['Married', 'Widowed', 'Separated', 'Divorced', 'Single'])->default('Single');
            $table->string('mother_names')->nullable();
            $table->string('father_names')->nullable();
            $table->string('guardian_names')->nullable();
            $table->string('nationality')->nullable();
            $table->string('country_residence')->nullable();
            $table->string('national_id', 16)->unique();
            $table->string('passport_number')->unique();
            $table->string('index_number_s_6')->unique()->nullable();
            $table->string('previous_education')->nullable();
            $table->string('qualification_obtained')->nullable();
            $table->string('year_of_completion',4 )->nullable();
            $table->string('physics_disability')->nullable();
            $table->string('next_kin_phone_number')->nullable();
            $table->enum('status', ['applicant', 'student', 'alumni'])->default('applicant');
            $table->string('email')->unique()->nullable();
            $table->string('telephone')->unique()->nullable();
            $table->string('password')->nullable();
            $table->unsignedBigInteger('college_id');
            $table->unsignedBigInteger('department_id');
            $table->timestamps();
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
