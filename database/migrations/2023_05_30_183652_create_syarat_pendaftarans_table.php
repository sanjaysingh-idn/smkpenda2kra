<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSyaratPendaftaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('syarat_pendaftarans', function (Blueprint $table) {
            $table->id();
            $table->enum('status', ['dibuka', 'ditutup'])->default('dibuka');
            $table->longText('content');
            $table->string('author');
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
        Schema::dropIfExists('syarat_pendaftarans');
    }
}
