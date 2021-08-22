<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_data', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('practice_id')->constrained('practices')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->foreignId('image_id')->constrained('images')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->string('user_salutation', 100)->nullable();
            $table->string('user_title', 100)->nullable();
            $table->string('user_firstname', 100)->nullable();
            $table->string('user_lastname', 100)->nullable();
            $table->string('user_telephone', 100)->nullable()->unique();
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
        Schema::dropIfExists('user_data');
    }
}
