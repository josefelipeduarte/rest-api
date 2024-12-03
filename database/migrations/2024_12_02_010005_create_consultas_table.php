<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('consultas', function (Blueprint $table) {
        $table->id();
        $table->string('motorista');
        $table->string('buony');
        $table->string('consulta');
        $table->string('destino');
        $table->string('tipo');
        $table->string('filial');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultas');
    }
};
