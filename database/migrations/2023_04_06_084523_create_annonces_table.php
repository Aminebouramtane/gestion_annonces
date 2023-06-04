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
        Schema::create('annonces', function (Blueprint $table) {
            $table->id();
            $table->string("titre", 70);
            $table->text("description");
            $table->enum("type", ["Appartement", "Terrain", "Maison", "Villa", "Magasin"]);
           $table->string("ville", 50);
           $table->integer("superficie");
           $table->boolean("neuf");
           $table->decimal("prix",12, 2);
           $table->enum("etat",["en cours", "validé", "signalé"]);
           $table->foreignId("user_id")->constrained("users");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('annonces');
    }
};
