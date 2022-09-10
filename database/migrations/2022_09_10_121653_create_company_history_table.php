<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_history', function (Blueprint $table) {
            $table->unsignedBigInteger('id_entry')->index()->primary('id_entry');
            $table->string('company_name');
            $table->string('last_position');
            $table->string('last_salary');
            $table->date('tgl_exit');
            $table->timestamps();

            $table->foreign('id_entry')->references('id')->on('entrydata')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_history');
    }
}
