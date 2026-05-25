<?php
// database/migrations/xxxx_xx_xx_create_kategori_wisata_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('kategori_wisata', function (Blueprint $class) {
            $class->id();
            $class->string('nama_kategori');
            $class->string('slug')->unique();
            $class->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kategori_wisata');
    }
};