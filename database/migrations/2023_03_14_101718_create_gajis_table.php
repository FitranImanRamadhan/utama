<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gajis', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('gapok');
            $table->string('tnj_istri');
            $table->string('tnj_anak');
            $table->string('tnj_umum');
            $table->string('tnj_beras');
            $table->string('pph');
            $table->string('tnj_struktural');
            $table->string('tnj_fungsional');
            $table->string('tnj_terpencil');
            $table->string('pembulatan');
            $table->string('tnj_kinerja');
            $table->string('tnj_makan');
            $table->string('total_gaji');
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
        Schema::dropIfExists('gajis');
    }
};
