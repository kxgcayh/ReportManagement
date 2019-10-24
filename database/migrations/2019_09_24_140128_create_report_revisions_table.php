<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportRevisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
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
        Schema::dropIfExists('tr_report_revs');
    }
}
