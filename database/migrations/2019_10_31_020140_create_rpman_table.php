<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRpmanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        Schema::create('ms_locations', function (Blueprint $table) {
            $table->bigIncrements('id_location');
            $table->string('name');
            $table->string('description')->nullable();
        });
        Schema::create('tr_departements', function (Blueprint $table) {
            $table->bigIncrements('id_departement');
            $table->string('name');
            $table->unsignedBigInteger('location_id')->nullable();
            $table->foreign('location_id')
                ->references('id_location')->on('ms_locations')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
        Schema::create('ms_failed_jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('connection');
            $table->text('queue');
            $table->longText('payload');
            $table->longText('exception');
            $table->timestamp('failed_at')->useCurrent();
        });
        Schema::create('tr_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->string('password');
            $table->unsignedBigInteger('departement_id')->nullable();
            $table->foreign('departement_id')
                ->references('id_departement')->on('tr_departements')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
        Schema::create('ms_password_resets', function (Blueprint $table) {
            $table->string('email');
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });
        Schema::create('ms_categories', function (Blueprint $table) {
            $table->bigIncrements('id_category');
            $table->string('name');
        });
        Schema::create('ms_machines', function (Blueprint $table) {
            $table->bigIncrements('id_machine');
            $table->string('name');
        });
        Schema::create('ms_projects', function (Blueprint $table) {
            $table->bigIncrements('id_project');
            $table->string('name');
            $table->text('description')->nullable();
        });
        Schema::create('ms_types', function (Blueprint $table) {
            $table->bigIncrements('id_type');
            $table->string('name');
        });
        Schema::create('tr_productions', function (Blueprint $table) {
            $table->bigIncrements('id_production');
            $table->string('name');
            $table->unsignedBigInteger('location_id')->nullable();
            $table->foreign('location_id')
                ->references('id_location')->on('ms_locations')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
        Schema::create('tr_brands', function (Blueprint $table) {
            $table->bigIncrements('id_brand');
            $table->string('name');
            $table->text('detail');
        });

        Schema::create('tr_reports', function (Blueprint $table) {
            $table->bigIncrements('id_report');
            $table->string('name');
            $table->boolean('approval');
            $table->unsignedBigInteger('brand_id');
            $table->foreign('brand_id')
                ->references('id_brand')->on('tr_brands')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')
                ->references('id_category')->on('ms_categories')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->unsignedBigInteger('project_id');
            $table->foreign('project_id')
                ->references('id_project')->on('ms_projects')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->unsignedBigInteger('type_id');
            $table->foreign('type_id')
                ->references('id_type')->on('ms_types')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
        Schema::create('tr_report_revs', function (Blueprint $table) {
            $table->bigIncrements('id_report_rev');
            $table->string('name');
            $table->unsignedBigInteger('report_id');
            $table->foreign('report_id')
                ->references('id_report')->on('tr_reports')
                ->onUpdate('cascade')
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
        Schema::dropIfExists('ms_locations');
        Schema::dropIfExists('tr_departements');
        Schema::dropIfExists('ms_failed_jobs');
        Schema::dropIfExists('tr_users');
        Schema::dropIfExists('ms_password_resets');
        Schema::dropIfExists('ms_categories');
        Schema::dropIfExists('ms_machines');
        Schema::dropIfExists('ms_projects');
        Schema::dropIfExists('ms_types');
        Schema::dropIfExists('tr_productions');
        Schema::dropIfExists('tr_brands');
        Schema::dropIfExists('tr_reports');
        Schema::dropIfExists('tr_report_revs');
    }
}
