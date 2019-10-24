<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ms_types', function (Blueprint $table) {
            $table->bigIncrements('id_type');
            $table->string('name');
            $table->boolean('is_active')->nullable();

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
        Schema::dropIfExists('ms_types');
    }
}
