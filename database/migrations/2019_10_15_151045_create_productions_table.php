<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tr_productions', function (Blueprint $table) {
            $table->bigIncrements('id_production');
            $table->string('name');
            $table->unsignedBigInteger('location_id');
            $table->foreign('location_id')
                ->references('id_location')->on('ms_locations')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tr_productions');
    }
}
