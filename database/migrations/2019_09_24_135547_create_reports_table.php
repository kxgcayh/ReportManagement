<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tr_reports', function (Blueprint $table) {
            $table->bigIncrements('id_report');
            $table->string('name');
            $table->boolean('approval');
            $table->boolean('is_active')->nullable();

            $table->unsignedBigInteger('brand_id');
            $table->foreign('brand_id')
                ->references('id')->on('products')
                ->onDelete('cascade');

            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')
                ->references('id_category')->on('ms_categories')
                ->onDelete('cascade');

            $table->unsignedBigInteger('project_id');
            $table->foreign('project_id')
                ->references('id_project')->on('ms_projects')
                ->onDelete('cascade');

            $table->unsignedBigInteger('type_id');
            $table->foreign('type_id')
                ->references('id_type')->on('ms_types')
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
        Schema::dropIfExists('tr_reports');
    }
}
