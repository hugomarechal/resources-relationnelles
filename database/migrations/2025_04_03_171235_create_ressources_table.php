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
        Schema::create('ressources', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->text('description');
            $table->string('nom_fichier');
            $table->boolean('restreint');
            $table->string('url');
            $table->boolean('valide');
            $table->timestamps();

            $table->foreignId('utilisateur_id')->constrained()->onDelete('restrict');
            $table->foreignId('ressource_categorie_id')->constrained()->onDelete('restrict');
            $table->foreignId('ressource_type_id')->constrained()->onDelete('restrict');
            $table->foreignId('relation_type_id')->constrained()->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ressources');
    }
};
