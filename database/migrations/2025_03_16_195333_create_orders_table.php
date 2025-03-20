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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('name_food')->nullable();
            $table->integer('quantity')->nullable(); // Utilisation d'un type entier pour la quantité
            $table->decimal('price', 8, 2)->nullable(); // Utilisation d'un type décimal pour le prix
            $table->string('image')->nullable();
            $table->string('delivery_status')->default('En attente');

            // Ajout de la relation avec l'utilisateur
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
