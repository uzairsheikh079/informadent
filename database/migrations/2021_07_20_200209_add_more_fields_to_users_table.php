<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMoreFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('practice_id')->constrained('practices')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->foreignId('image_id')->constrained('images')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->string('user_salutation', 100)->nullable();
            $table->string('user_title', 100)->nullable();
            $table->string('user_firstname', 100)->nullable();
            $table->string('user_lastname', 100)->nullable();
            $table->string('user_telephone', 100)->nullable()->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
