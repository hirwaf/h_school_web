<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('departments', function (Blueprint $table) {
            $table->string('name')->unique()->change();
            $table->string('code')->unique()->nullable()->change();
            $table->unsignedBigInteger('college_id');
//            $table->foreign('college_id')->references('id')->on('colleges');
            $table->unsignedBigInteger('hod')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('departments', function (Blueprint $table) {
            $table->string('name')->change();
            $table->string('code')->nullable()->change();
            $table->dropColumn('college_id');
            $table->string('hod')->nullable()->change();
        });
    }
}
