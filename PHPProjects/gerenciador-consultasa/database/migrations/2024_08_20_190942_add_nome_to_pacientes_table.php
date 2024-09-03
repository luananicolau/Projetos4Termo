<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('pacientes', function (Blueprint $table) {
            // Adiciona a coluna 'nome' após a coluna 'id'
            $table->string('nome')->after('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('pacientes', function (Blueprint $table) {
            // Remove a coluna 'nome'
            $table->dropColumn('nome');
        });
    }
};
