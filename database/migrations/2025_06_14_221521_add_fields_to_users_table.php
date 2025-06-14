<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->softDeletes(); // Tilføj soft deletes
            $table->string('slug')->unique()->after('name'); // Slug baseret på navn
            $table->foreignId('role_id')->constrained('roles'); // Antager der findes en 'roles'-tabel
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropSoftDeletes();
            $table->dropColumn('slug');
            $table->dropForeign(['role_id']);
            $table->dropColumn('role_id');
        });
    }
};
