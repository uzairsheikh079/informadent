<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePracticesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('practices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('clinic_id')->constrained('clinics')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->foreignId('image_id')->constrained('images')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->string('practice_name', 100)->nullable();
            $table->string('practice_email', 100)->unique()->nullable();
            $table->string('practice_address', 100)->nullable();
            $table->string('practice_telephone', 100)->nullable()->unique(); 
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
        Schema::dropIfExists('practices');
    }
}
