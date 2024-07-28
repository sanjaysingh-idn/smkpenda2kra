<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSambutanKepalaSekolahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sambutan_kepala_sekolahs', function (Blueprint $table) {
            $table->id();
            $table->string('kepala_sekolah');
            $table->string('foto');
            $table->longText('desc');
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
        Schema::dropIfExists('sambutan_kepala_sekolahs');
    }
}
