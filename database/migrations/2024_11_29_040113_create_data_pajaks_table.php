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
        Schema::create('data_pajaks', function (Blueprint $table) {
            $table->id();
            $table->string('npwpd')->unique();
            $table->string('namausaha');
            $table->string('jenisusaha');
            $table->text('alamatusaha');
            $table->mediumInteger('teleponusaha');
            $table->string('jenispendapatan');
            $table->date('tanggalpendaftaran');
            $table->string('namapemilik');
            $table->mediumInteger('nikpemilik');
            $table->string('jabatanpemilik');
            $table->text('alamatpemilik');
            $table->mediumInteger('teleponpemilik');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_pajaks');
    }
};
