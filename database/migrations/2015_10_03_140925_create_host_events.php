<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHostEvents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('host_events', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('is_shared_host');
            // latest_patch_versions   hstore (php52=5.2.1, etc)
            $table->integer('default_version_id')->unsigned();
            $table->foreign('default_version_id')->references('id')->on('versions');
            $table->enum('patch_policy', ['them', 'you'])->default('you');
            $table->boolean('manual_update_major_minor')->default(false);
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
        Schema::drop('host_events');
    }
}
