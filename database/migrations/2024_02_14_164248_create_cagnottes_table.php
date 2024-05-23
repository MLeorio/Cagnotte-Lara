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
        Schema::create('cagnottes', function (Blueprint $table) {
            $table->id();
            $table->string('montant')->nullable(false);
            $table->string('moyen_paye')->nullable(false);
            $table->string('donnateur');
            $table->string('tel_donnateur');

            $table->foreignId('projet_id')
            ->constrained()
            ->cascadeOnDelete()
            ->cascadeOnUpdate();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cagnottes');
    }
};
