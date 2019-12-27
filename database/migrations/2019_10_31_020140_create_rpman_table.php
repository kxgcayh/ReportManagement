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
            $table->boolean('is_active')->nullable();
            $table->string('name');
            $table->string('description')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();
        });
        Schema::create('tr_departements', function (Blueprint $table) {
            $table->bigIncrements('id_departement');
            $table->unsignedBigInteger('location_id')->nullable();
            $table->boolean('is_active')->nullable();
            $table->string('name');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
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
            $table->unsignedBigInteger('departement_id')->nullable();
            $table->boolean('is_active')->nullable();
            $table->string('name');
            $table->string('email');
            $table->rememberToken();
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();
        });
        Schema::create('ms_password_resets', function (Blueprint $table) {
            $table->string('email');
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });
        Schema::create('ms_categories', function (Blueprint $table) {
            $table->bigIncrements('id_category');
            $table->boolean('is_active')->nullable();
            $table->string('name');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();
        });
        Schema::create('ms_machines', function (Blueprint $table) {
            $table->bigIncrements('id_machine');
            $table->boolean('is_active')->nullable();
            $table->string('name');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();

        });
        Schema::create('ms_projects', function (Blueprint $table) {
            $table->bigIncrements('id_project');
            $table->boolean('is_active')->nullable();
            $table->string('name');
            $table->text('description')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();
        });
        Schema::create('ms_types', function (Blueprint $table) {
            $table->bigIncrements('id_type');
            $table->boolean('is_active')->nullable();
            $table->string('name');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();
        });
        Schema::create('tr_productions', function (Blueprint $table) {
            $table->bigIncrements('id_production');
            $table->unsignedBigInteger('location_id')->nullable();
            $table->boolean('is_active')->nullable();
            $table->string('name');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();
        });

        Schema::create('tr_products', function (Blueprint $table) {
            $table->bigIncrements('id_product');
            $table->unsignedBigInteger('production_id')->nullable();
            $table->boolean('is_active')->nullable();
            $table->string('name');
            $table->text('detail');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();
        });

        Schema::create('tr_brands', function (Blueprint $table) {
            $table->bigIncrements('id_brand');
            $table->unsignedBigInteger('product_id')->nullable();
            $table->boolean('is_active')->nullable();
            $table->string('name');
            $table->text('detail');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();
        });

        Schema::create('tr_reports', function (Blueprint $table) {
            $table->bigIncrements('id_report');
            $table->unsignedBigInteger('brand_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('machine_id');
            $table->unsignedBigInteger('production_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('project_id');
            $table->unsignedBigInteger('type_id');
            $table->boolean('is_active')->nullable();
            $table->boolean('approval')->nullable();
            $table->string('name');
            $table->string('file')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();
        });
        Schema::create('tr_report_revs', function (Blueprint $table) {
            $table->bigIncrements('id_report_rev');
            $table->unsignedBigInteger('report_id');
            $table->boolean('is_active')->nullable();
            $table->string('name');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
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
        Schema::dropIfExists('tr_products');
        Schema::dropIfExists('tr_brands');
        Schema::dropIfExists('tr_reports');
        Schema::dropIfExists('tr_report_revs');
    }
}
