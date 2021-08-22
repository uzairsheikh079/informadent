<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFindingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('findings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->json('document_id')->nullable();
            $table->foreignId('diagnose_id')->constrained('diagnosis')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->json('image_id')->nullable();
            $table->string('finding_name', 100)->nullable();
            $table->longText('privately_insured_cuecard_description')->nullable();
            $table->longText('privately_insured_patient_short_description')->nullable();
            $table->longText('privately_insured_patient_long_description')->nullable();
            $table->longText('privately_insured_doctor_long_description')->nullable();
            $table->longText('legaly_insured_cuecard_description')->nullable();
            $table->longText('legaly_insured_patient_short_description')->nullable();
            $table->longText('legaly_insured_patient_long_description')->nullable();
            $table->longText('legaly_insured_doctor_long_description')->nullable();
            $table->string('step', 100)->nullable();
            $table->string('slug', 100)->nullable();
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
        Schema::dropIfExists('findings');
    }
}
