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
        Schema::create('kosts', function (Blueprint $table) {
            $table->integer('id_kost')->autoIncrement();
            $table->foreignId('id_pemilik')->onDelete('cascade');
            $table->foreignId('id_kategori');
            $table->string('nama_kost');
            $table->text('alamat');
            $table->text('fasilitas')->nullable();
            $table->decimal('harga_per_bulan', 10, 2);
            $table->enum('status', ['tersedia', 'tidak tersedia']);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kosts');
    }
};
