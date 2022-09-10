<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntrydataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entrydata', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nik')->unique();
            $table->date('birthday');
            $table->enum('jk',['Laki-Laki','Perempuan']);
            $table->string('agama');
            $table->string('status');
            $table->enum('goldar',['A','B','AB','O']);
            $table->string('ex_salary');
            $table->string('emergency_call');
            $table->string('pic_profile');
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
        Schema::dropIfExists('entrydata');
    }
}
