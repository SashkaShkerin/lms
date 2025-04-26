<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyColumnEvents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->text('description')->nullable()->change();

            $table->integer('teacher_id')->nullable()->change();
            $table->integer('class_id')->nullable()->change();
            $table->integer('subject_id')->nullable()->change();

            $table->dateTimeTz('start_time')->nullable()->change();
            $table->dateTimeTz('end_time')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
