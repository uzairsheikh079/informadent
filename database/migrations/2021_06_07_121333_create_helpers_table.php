<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHelpersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('helpers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('practice_id')->constrained('practices')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->string('helper_name', 100)->nullable();
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
        Schema::dropIfExists('helpers');
    }
}
