<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('service_request', function (Blueprint $table) {
            $table->json('kelengkapan');
            $table->json('jenis_layanan');
        });

        Schema::create('settings',function(Blueprint $table){
            $table->string('id')->primary();
            $table->longText('value');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('service_request', function (Blueprint $table) {
            $table->dropColumn('kelengkapan');
            $table->dropColumn('jenis_layanan');
        });
        Schema::drop('settings');
    }
};
