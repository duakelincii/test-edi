<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlamatDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alamat_data', function (Blueprint $table) {
            $table->unsignedBigInteger('id_entry')->index();
            $table->text('alamat_ktp');
            $table->text('alamat_dom');
            $table->timestamps();


            $table->foreign('id_entry')->references('id')->on('entrydata')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alamat_data');
    }
}
