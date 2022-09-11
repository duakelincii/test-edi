<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendidikanDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendidikan_data', function (Blueprint $table) {
            $table->unsignedBigInteger('id_entry')->index();
            $table->unsignedBigInteger('id_pendidikan')->index();
            $table->string('nama_pendidikan');
            $table->string('jurusan');
            $table->date('tgl_lulus');
            $table->string('nilai');
            $table->timestamps();

            $table->foreign('id_entry')->references('id')->on('entrydata')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_pendidikan')->references('id')->on('pendidikan')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pendidikan_data');
    }
}
