<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBandsTable extends Migration
{
    /**
     * Creates the bands table.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bands', function (Blueprint $table) {

            // Create our table columns
            $table->increments('id');
            $table->string('name');
            $table->date('start_date')->nullable();
            $table->string('website')->nullable();
            $table->boolean('still_active')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Drops the bands table.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bands');
    }
}
