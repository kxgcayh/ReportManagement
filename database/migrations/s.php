<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

    Schema::create('tr_productions', function (Blueprint $table) {
        $table->bigIncrements('id_production');
        $table->boolean('is_active')->nullable();
        $table->string('name');
        $table->unsignedBigInteger('created_by')->nullable();
        $table->unsignedBigInteger('updated_by')->nullable();
        $table->timestamps();
    });

    Schema::create('tr_products', function (Blueprint $table) {
        $table->bigIncrements('id_product');

        $table->unsignedBigInteger('production_id')->nullable();
        $table->foreign('production_id')
                ->refrences('id_production')->on('tr_productions')
                ->onUpdate('cascade')->onDelete('cascade');

        $table->boolean('is_active')->nullable();
        $table->string('name');
        $table->text('detail');
        $table->unsignedBigInteger('created_by')->nullable();
        $table->unsignedBigInteger('updated_by')->nullable();
        $table->timestamps();
    });
