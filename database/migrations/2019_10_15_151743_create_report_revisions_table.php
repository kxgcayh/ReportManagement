<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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

            $table->unsignedBigInteger('report_id');
            $table->foreign('report_id')
                ->references('id_report')->on('tr_reports')
                ->onDelete('cascade');
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
        Schema::dropIfExists('tr_report_revs');
    }
}
