<?php
// database/migrations/xxxx_xx_xx_xxxxxx_update_horarios_disponiveis_in_medicos_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateHorariosDisponiveisInMedicosTable extends Migration
{
    public function up()
    {
        Schema::table('medicos', function (Blueprint $table) {
            // Permitir valores nulos
            $table->text('horarios_disponiveis')->nullable()->change();
            // ou definir um valor padrão
            // $table->text('horarios_disponiveis')->default('disponível')->change();
        });
    }

    public function down()
    {
        Schema::table('medicos', function (Blueprint $table) {
            // Reverter a alteração, se necessário
            $table->text('horarios_disponiveis')->nullable(false)->change();
        });
    }
}
