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
        Schema::create('peminjamen', function (Blueprint $table) {
            $table->id();
            $table->string('namapeminjam');
            $table->string('namabarang');
            $table->foreignId('gudangid')->constrained('gudangs')->onDelete('cascade');
            $table->integer('stok');
            $table->enum('status', ['dipinjam', 'dikembalikan', 'tersedia']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjamen');
    }
};
