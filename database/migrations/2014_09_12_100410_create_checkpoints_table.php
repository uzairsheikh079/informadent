<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckpointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkpoints', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->string('checkpoint_name', 100)->nullable();
             $table->longText('privately_insured_cuecard_description')->nullable();
            $table->longText('privately_insured_patient_short_description')->nullable();
            $table->longText('privately_insured_patient_long_description')->nullable();
            $table->longText('privately_insured_doctor_long_description')->nullable();
            $table->longText('legaly_insured_cuecard_description')->nullable();
            $table->longText('legaly_insured_patient_short_description')->nullable();
            $table->longText('legaly_insured_patient_long_description')->nullable();
            $table->longText('legaly_insured_doctor_long_description')->nullable();
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
        Schema::dropIfExists('checkpoints');
    }
}
