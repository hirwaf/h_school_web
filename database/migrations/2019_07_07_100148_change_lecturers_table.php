<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeLecturersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lecturers', function (Blueprint $table) {
            $table->string('telephone')->unique()->nullable()->change();
            $table->enum('gender', ['Male', 'Female', 'Others']);
            $table->string('email')->unique()->change();
            $table->string('nationality')->nullable();
            $table->string('national_id')->nullable();
            $table->string('passport_number')->nullable();
            $table->string('password');
            $table->boolean('status')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lecturers', function (Blueprint $table) {
            $table->string('telephone')->change();
            $table->dropColumn('gender');
            $table->string('email')->change();
            $table->dropColumn('nationality');
            $table->dropColumn('national_id');
            $table->dropColumn('passport_number');
            $table->dropColumn('password');
            $table->dropColumn('status');
        });
    }
}
