<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->boolean('is_active')->nullable();

            $table->unsignedBigInteger('location_id');
            $table->foreign('location_id')
                ->references('id_location')->on('ms_locations')
                ->onDelete('cascade');

            $table->timestamps();
            $table->unsignedBigInteger('created_by');
            $table->foreign('created_by')
                ->references('id')->on('tr_users')
                ->onDelete('cascade');

            $table->unsignedBigInteger('updated_by');
            $table->foreign('updated_by')
                ->references('id')->on('tr_users')
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
