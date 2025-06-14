<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveSubjectKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('subjects', function (Blueprint $table) {
            $table->dropForeign('subjects_my_class_id_foreign');
            $table->dropUnique('subjects_my_class_id_name_unique');
        });
    }

    public function down()
    {
    }
}
