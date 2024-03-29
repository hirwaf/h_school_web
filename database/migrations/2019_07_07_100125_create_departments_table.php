<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDepartmentsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('departments'))
            Schema::create('departments', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->string('code')->nullable();
                $table->string('hod')->nullable();
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
        Schema::drop('departments');
    }

}
