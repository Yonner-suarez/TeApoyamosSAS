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
        Schema::table('usuarios', function (Blueprint $table) {
            $table->string('especialidad')->nullable();
            $table->string('ubicacion')->nullable();
            $table->string('foto')->nullable();
            $table->string('perfil_url')->nullable();
        });
    }

    public function down()
    {
        Schema::table('usuarios', function (Blueprint $table) {
            $table->dropColumn(['especialidad', 'ubicacion', 'foto', 'perfil_url']);
        });
    }
};
