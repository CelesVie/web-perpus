<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Ubah enum dari 7,8,9 menjadi 10,11,12
        DB::statement("ALTER TABLE siswas MODIFY COLUMN kelas ENUM('10', '11', '12') NOT NULL");
    }

    public function down(): void
    {
        // Kalau mau rollback, balik ke semula
        DB::statement("ALTER TABLE siswas MODIFY COLUMN kelas ENUM('7', '8', '9') NOT NULL");
    }
};
