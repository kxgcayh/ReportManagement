<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyColum extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ms_locations', function (Blueprint $table) {
            $table->foreign('created_by')
                ->references('id')->on('tr_users')
                ->onDelete('cascade');
            $table->foreign('updated_by')
                ->references('id')->on('tr_users')
                ->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('tr_departements', function (Blueprint $table) {
            $table->foreign('location_id')
                ->references('id_location')->on('ms_locations')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('created_by')
                ->references('id')->on('tr_users')
                ->onDelete('cascade');
            $table->foreign('updated_by')
                ->references('id')->on('tr_users')
                ->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('tr_users', function (Blueprint $table) {
            $table->foreign('departement_id')
                ->references('id_departement')->on('tr_departements')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('created_by')
                ->references('id')->on('tr_users')
                ->onDelete('cascade');
            $table->foreign('updated_by')
                ->references('id')->on('tr_users')
                ->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('ms_categories', function (Blueprint $table) {
            $table->foreign('created_by')
                ->references('id')->on('tr_users')
                ->onDelete('cascade');
            $table->foreign('updated_by')
                ->references('id')->on('tr_users')
                ->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('ms_machines', function (Blueprint $table) {
            $table->foreign('created_by')
                ->references('id')->on('tr_users')
                ->onDelete('cascade');
            $table->foreign('updated_by')
                ->references('id')->on('tr_users')
                ->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('ms_projects', function (Blueprint $table) {
            $table->foreign('created_by')
                ->references('id')->on('tr_users')
                ->onDelete('cascade');
            $table->foreign('updated_by')
                ->references('id')->on('tr_users')
                ->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('ms_types', function (Blueprint $table) {
            $table->foreign('created_by')
                ->references('id')->on('tr_users')
                ->onDelete('cascade');
            $table->foreign('updated_by')
                ->references('id')->on('tr_users')
                ->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('tr_productions', function (Blueprint $table) {
            $table->foreign('location_id')
                ->references('id_location')->on('ms_locations')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('created_by')
                ->references('id')->on('tr_users')
                ->onDelete('cascade');
            $table->foreign('updated_by')
                ->references('id')->on('tr_users')
                ->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('tr_products', function (Blueprint $table) {
            $table->foreign('production_id')
                ->references('id_production')->on('tr_productions')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('created_by')
                ->references('id')->on('tr_users')
                ->onDelete('cascade');
            $table->foreign('updated_by')
                ->references('id')->on('tr_users')
                ->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('tr_brands', function (Blueprint $table) {
            $table->foreign('product_id')
                ->references('id_product')->on('tr_products')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('created_by')
                ->references('id')->on('tr_users')
                ->onDelete('cascade');
            $table->foreign('updated_by')
                ->references('id')->on('tr_users')
                ->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('tr_reports', function (Blueprint $table) {
            $table->foreign('brand_id')
                ->references('id_brand')->on('tr_brands')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('category_id')
                ->references('id_category')->on('ms_categories')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('machine_id')
                ->references('id_machine')->on('ms_machines')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('production_id')
                ->references('id_production')->on('tr_productions')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('product_id')
                ->references('id_product')->on('tr_products')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('project_id')
                ->references('id_project')->on('ms_projects')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('type_id')
                ->references('id_type')->on('ms_types')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('created_by')
                ->references('id')->on('tr_users')
                ->onDelete('cascade');
            $table->foreign('updated_by')
                ->references('id')->on('tr_users')
                ->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('tr_report_revs', function (Blueprint $table) {
            $table->foreign('report_id')
                ->references('id_report')->on('tr_reports')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('created_by')
                ->references('id')->on('tr_users')
                ->onDelete('cascade');
            $table->foreign('updated_by')
                ->references('id')->on('tr_users')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ms_locations', function (Blueprint $table) {
            $table->dropForeign(['created_by']);
            $table->dropForeign(['updated_by']);
        });

        Schema::table('tr_departements', function (Blueprint $table) {
            $table->dropForeign(['location_id']);
            $table->dropForeign(['created_by']);
            $table->dropForeign(['updated_by']);
        });

        Schema::table('tr_users', function (Blueprint $table) {
            $table->dropForeign(['departement_id']);
            $table->dropForeign(['created_by']);
            $table->dropForeign(['updated_by']);
        });

        Schema::table('ms_categories', function (Blueprint $table) {
            $table->dropForeign(['created_by']);
            $table->dropForeign(['updated_by']);
        });

        Schema::table('ms_machines', function (Blueprint $table) {
            $table->dropForeign(['created_by']);
            $table->dropForeign(['updated_by']);
        });

        Schema::table('ms_projects', function (Blueprint $table) {
            $table->dropForeign(['created_by']);
            $table->dropForeign(['updated_by']);
        });

        Schema::table('ms_types', function (Blueprint $table) {
            $table->dropForeign(['created_by']);
            $table->dropForeign(['updated_by']);
        });

        Schema::table('tr_productions', function (Blueprint $table) {
            $table->dropForeign(['location_id']);
            $table->dropForeign(['created_by']);
            $table->dropForeign(['updated_by']);
        });

        Schema::table('tr_products', function (Blueprint $table) {
            $table->dropForeign(['production_id']);
            $table->dropForeign(['created_by']);
            $table->dropForeign(['updated_by']);
        });

        Schema::table('tr_brands', function (Blueprint $table) {
            $table->dropForeign(['product_id']);
            $table->dropForeign(['created_by']);
            $table->dropForeign(['updated_by']);
        });

        Schema::table('tr_reports', function (Blueprint $table) {
            $table->dropForeign(['brand_id']);
            $table->dropForeign(['category_id']);
            $table->dropForeign(['machine_id']);
            $table->dropForeign(['production_id']);
            $table->dropForeign(['product_id']);
            $table->dropForeign(['project_id']);
            $table->dropForeign(['type_id']);
            $table->dropForeign(['created_by']);
            $table->dropForeign(['updated_by']);
        });

        Schema::table('tr_reports_revs', function (Blueprint $table) {
            $table->dropForeign(['created_by']);
            $table->dropForeign(['updated_by']);
        });
    }
}
