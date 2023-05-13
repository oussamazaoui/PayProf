<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paiements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('enseignant_id')->constrained()->onDelete('cascade');
            $table->foreignId('etablissement_id')->constrained()->onDelete('cascade');
            $table->integer('VH');
            $table->integer('Taux_H');
            $table->unsignedFloat('Brut', 7, 2);
            $table->unsignedFloat('IR', 7, 2)->default(0, 05);
            $table->unsignedFloat('Net', 7, 2);
            $table->string('Annee_univ', 9)->default('2022/2023');
            $table->string('Semestre', 2)->default('S2');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paiements');
    }
};