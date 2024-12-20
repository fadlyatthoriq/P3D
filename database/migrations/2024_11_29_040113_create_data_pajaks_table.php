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
            $table->decimal('latitude', 30, 20);
            $table->decimal('longitude', 30, 20);
            $table->string('teleponusaha');
            $table->string('jenispendapatan');
            $table->date('tanggalpendaftaran');
            $table->string('namapemilik');
            $table->string('nikpemilik');
            $table->string('jabatanpemilik');
            $table->text('alamatpemilik');
            $table->string('teleponpemilik');
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
