<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceProgressTable extends Migration
{
    public function up()
    {
        Schema::create('service_progress', function (Blueprint $table) {
            $table->id();
            $table->uuid('service_request_id');
            $table->foreign('service_request_id')->references('id')->on('service_request')->onDelete('cascade');
            $table->foreignId('status_id')->constrained('status');
            $table->string('catatan');
            $table->bigInteger('teknisi_id');
            $table->date('tanggal');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('service_progress');
    }
}
