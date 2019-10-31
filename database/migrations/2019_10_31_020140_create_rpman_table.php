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
            $table->boolean('is_active')->nullable();
            $table->timestamps();
        });

        Schema::create('tr_departements', function (Blueprint $table) {
            $table->bigIncrements('id_departement');
            $table->string('name');
            $table->boolean('is_active')->nullable();

            $table->unsignedBigInteger('location_id');
            $table->foreign('location_id')
                ->references('id_location')->on('ms_locations')
                ->onDelete('cascade');
            $table->timestamps();
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
            $table->string('password');

            $table->unsignedBigInteger('departement_id')->nullable();
            $table->foreign('departement_id')
                ->references('id_departement')->on('tr_departements')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->boolean('is_active')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('ms_password_resets', function (Blueprint $table) {
            $table->string('email');
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('ms_categories', function (Blueprint $table) {
            $table->bigIncrements('id_category');
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

        Schema::create('ms_machines', function (Blueprint $table) {
            $table->bigIncrements('id_machine');
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

        Schema::create('ms_projects', function (Blueprint $table) {
            $table->bigIncrements('id_project');
            $table->string('name');
            $table->text('description')->nullable();
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

        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('detail');
            $table->timestamps();
        });

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

        Schema::create('tr_report_revs', function (Blueprint $table) {
            $table->bigIncrements('id_report_rev');
            $table->string('name');
            $table->boolean('is_active')->nullable();

            $table->unsignedBigInteger('report_id');
            $table->foreign('report_id')
                ->references('id_report')->on('tr_reports')
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
        Schema::dropIfExists('products');
        Schema::dropIfExists('tr_reports');
        Schema::dropIfExists('tr_report_revs');
    }
}
