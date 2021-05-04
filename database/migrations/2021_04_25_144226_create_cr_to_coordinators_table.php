<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrToCoordinatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cr_to_coordinators', function (Blueprint $table) {
            $table->id();

            $table->string('subject');
            $table->string('description');
            $table->string('department');
            $table->string('semester');
            $table->string('section');
            $table->string('reg_no');
            $table->boolean('isRead')->default(1);

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
        Schema::dropIfExists('cr_to_coordinators');
    }
}
