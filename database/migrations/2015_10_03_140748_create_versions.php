<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVersions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('versions', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('major')->index();
            $table->tinyInteger('minor')->index();
            $table->tinyInteger('patch')->index();
            $table->string('url')->nullable();
            $table->date('release_date');
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
        Schema::drop('versions');
    }
}
