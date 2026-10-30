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
        Schema::create('santris', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pendaftaran_id')->nullable()->constrained('pendaftarans')->nullOnDelete();
            $table->string('registration_number')->nullable();
            $table->string('jenjang');
            $table->string('nama_santri');
            $table->string('jenis_kelamin');
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->unsignedInteger('umur')->nullable();
            $table->text('alamat_lengkap')->nullable();
            $table->string('asal_sekolah')->nullable();
            $table->string('email')->nullable();
            $table->string('no_hp_santri')->nullable();
            $table->string('tinggal_bersama')->nullable();
            $table->string('pas_foto_path')->nullable();
            $table->string('foto_kk_path')->nullable();
            $table->string('foto_raport_path')->nullable();
            $table->string('nama_ayah')->nullable();
            $table->string('no_hp_ayah')->nullable();
            $table->string('pekerjaan_ayah')->nullable();
            $table->string('penghasilan_ayah')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->string('no_hp_ibu')->nullable();
            $table->string('pekerjaan_ibu')->nullable();
            $table->string('penghasilan_ibu')->nullable();
            $table->string('status_santri')->default('aktif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('santris');
    }
};
