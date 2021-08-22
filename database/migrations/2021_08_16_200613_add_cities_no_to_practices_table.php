<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCitiesNoToPracticesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('practices', function (Blueprint $table) {
            $table->string('street_no')->nullable();
            $table->string('house_no')->nullable();
            $table->string('post_code')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('practices', function (Blueprint $table) {
            $table->dropColumn('street_no');
            $table->dropColumn('house_no');
            $table->dropColumn('post_code');
            $table->dropColumn('city');
            $table->dropColumn('country');
        });
    }
}
