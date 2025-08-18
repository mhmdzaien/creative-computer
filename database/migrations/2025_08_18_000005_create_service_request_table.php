<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceRequestTable extends Migration
{
    public function up()
    {
        Schema::create('service_request', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nomor');
            $table->string('pelanggan');
            $table->string('kontak_pelanggan');
            $table->string('barang');
            $table->string('category_id');
            $table->date('tanggal_masuk');
            $table->date('estimasi_selesai');
            $table->bigInteger('teknisi_id');
            $table->float('estimasi_biaya');
            $table->text('keluhan');
            $table->bigInteger('current_progress_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('service_request');
    }
}
