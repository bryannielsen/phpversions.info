<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDistributions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('distributions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('family');
            $table->string('name');
            $table->string('version_major');
            $table->string('version_minor');
            $table->string('url');
            $table->date('released_on');
            $table->date('supported_until');
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
        Schema::drop('distributions');
    }
}
