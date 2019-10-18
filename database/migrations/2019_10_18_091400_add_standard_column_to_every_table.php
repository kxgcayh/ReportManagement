<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStandardColumnToEveryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // ms_locations
        Schema::table('ms_locations', function (Blueprint $table) {
            $table->boolean('is_active')->nullable()->default(false)->after('description');

            $table->unsignedBigInteger('created_by')->nullable();
            $table->foreign('created_by')
                ->references('id')->on('tr_users')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->unsignedBigInteger('updated_by')->nullable();
            $table->foreign('updated_by')
                ->references('id')->on('tr_users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        // tr_departements
        Schema::table('tr_departements', function (Blueprint $table) {
            $table->boolean('is_active')->nullable()->after('name');

            $table->unsignedBigInteger('created_by')->nullable();
            $table->foreign('created_by')
                ->references('id')->on('tr_users')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->unsignedBigInteger('updated_by')->nullable();
            $table->foreign('updated_by')
                ->references('id')->on('tr_users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        // tr_users
        Schema::table('tr_users', function (Blueprint $table) {
            $table->boolean('is_active')->default(false)->after('password');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // ms_locations
        Schema::table('ms_locations', function(Blueprint $table) {
            $table->dropForeign(['created_by']);
            $table->dropForeign(['updated_by']);

            $table->dropColumn('created_by');
            $table->dropColumn('updated_by');
            $table->dropColumn('is_active');
        });

        // tr_departements
        Schema::table('tr_departements', function(Blueprint $table) {
            $table->dropForeign(['created_by']);
            $table->dropForeign(['updated_by']);

            $table->dropColumn('created_by');
            $table->dropColumn('updated_by');
            $table->dropColumn('is_active');
        });

        // tr_users
        Schema::table('tr_users', function (Blueprint $table) {
            $table->dropColumn('is_active');
        });
    }
}
