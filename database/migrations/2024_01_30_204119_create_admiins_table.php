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
        Schema::create('admiins', function (Blueprint $table) {
        $table->id('id_admin');
        $table->string('nom_admin')->nullable();

        $table->foreignId('id_compte')->constrained('comptes', 'id_compte');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admiins');
    }
};
