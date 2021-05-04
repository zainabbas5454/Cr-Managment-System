<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrToStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cr_to_students', function (Blueprint $table) {
            $table->id();
            $table->string('subject');
            $table->string('description');
            $table->string('department');
            $table->string('section');
            $table->string('semester');
            $table->boolean('isRead')->default(1);
            $table->string('reg_no');

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
        Schema::dropIfExists('cr_to_students');
    }
}
