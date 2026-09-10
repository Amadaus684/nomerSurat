<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('surats', function (Blueprint $table) {
            $table->id();

            $table->string('nomor_surat')->unique();
            $table->date('tanggal_surat');

            $table->foreignId('jenis_surat_id')
                ->constrained('jenis_surats')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreignId('klasifikasi_id')
                ->constrained('klasifikasis')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->string('nama_penduduk')->nullable();
            $table->string('nik', 16)->nullable();
            $table->text('alamat')->nullable();

            $table->text('keperluan');

            $table->date('tanggal_kirim')->nullable();
            $table->string('tujuan')->nullable();

            $table->foreignId('created_by')
                ->constrained('users')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreignId('edited_by')
                ->constrained('users')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('surats');
    }
};