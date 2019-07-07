<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->string('code')->unique()->nullable()->change();
            $table->integer('credit')->nullable();
            $table->integer('hours')->nullable();
            $table->integer('year_of_study')->nullable();
            $table->integer('semester')->nullable();
            $table->unsignedBigInteger('department_id');

            $table->dropColumn('lecturer');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->string('code')->nullable()->change();
            $table->dropColumn('credit');
            $table->dropColumn('hours');
            $table->dropColumn('year_of_study');
            $table->dropColumn('semester');
            $table->dropColumn('department_id');
            $table->dropColumn('lecturer');
        });
    }
}
