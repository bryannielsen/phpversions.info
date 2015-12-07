<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDistributionEvents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('distribution_events', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('distribution_id')->unsigned();
            $table->foreign('distribution_id')->references('id')->on('distributions');
            $table->integer('default_version_id')->unsigned();
            $table->foreign('default_version_id')->references('id')->on('versions');
            $table->date('date');
            $table->boolean('is_confirmed');
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
        Schema::drop('distribution_events');
    }
}
