<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTelponDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('telpon_data', function (Blueprint $table) {
            $table->unsignedBigInteger('id_entry')->index()->primary('id_entry');
            $table->string('nomor_telepon')->unique();
            $table->timestamps();

                $table->foreign('id_entry')
                        ->references('id')->on('entrydata')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('telpon_data');
    }
}
