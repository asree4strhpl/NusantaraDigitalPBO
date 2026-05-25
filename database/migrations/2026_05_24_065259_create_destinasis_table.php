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
        Schema::create('destinasis', function (Blueprint $table) {
            $table->id();
          $table->unsignedBigInteger('kategori_wisata_id')->nullable();

            $table->string('nama_wisata');
            $table->string('slug')->unique();
            $table->string('lokasi');
            $table->enum('kategori', ['alam', 'budaya', 'kuliner', 'religi']);
            $table->string('gambar')->nullable();
            $table->decimal('harga_tiket', 10, 2)->default(0);
            $table->decimal('rating', 2, 1)->default(0.0);
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->enum('status', ['aktif', 'tidak_aktif'])->default('aktif');
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('destinasis');
    }
};
