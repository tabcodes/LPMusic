<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlbumsTable extends Migration
{
    /**
     * Creates the albums table and establishes the foreign key(s).
     *
     * @return void
     */
    public function up()
    {
        Schema::create('albums', function (Blueprint $table) {

            // Create our table columns
            $table->increments('id');
            $table->integer('band_id')->unsigned();
            $table->string('name');
            $table->date('recorded_date')->nullable();
            $table->date('release_date')->nullable();
            $table->integer('number_of_tracks')->nullable();
            $table->string('label')->nullable();
            $table->string('producer')->nullable();
            $table->string('genre')->nullable();
            $table->timestamps();

        });

        Schema::table('albums', function (Blueprint $table) {

            // Add our foreign key 
            $table->foreign('band_id')->references('id')->on('bands')->onDelete('cascade');

        });


    }

    /**
     * Drops the albums table.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('albums');
    }
}
