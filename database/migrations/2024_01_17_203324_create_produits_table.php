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
        Schema::create('produits', function (Blueprint $table) {
            $table->id('id');
            $table->string('Nom_Produit');
            $table->float('Prix_Produit');
            $table->string('Description');
            $table->string('Quantite_stocke');
            $table->binary('Image_Produit')->nullable(); // Utilisez le type binary pour stocker les données binaires de l'image


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produits');
    }
};
