<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramKeahliansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('program_keahlians', function (Blueprint $table) {
            $table->id();
            $table->string('nama_program')->unique();
            $table->string('slug');
            $table->string('singkatan');
            $table->string('foto_utama');
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
        Schema::dropIfExists('program_keahlians');
    }
}
