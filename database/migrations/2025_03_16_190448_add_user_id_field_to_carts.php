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
        Schema::table('carts', function (Blueprint $table) {
            // Ajout de la colonne user_id
            $table->unsignedBigInteger('user_id')->nullable()->after('price');

            // Ajout de la contrainte de clé étrangère
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('carts', function (Blueprint $table) {
            // Suppression de la contrainte de clé étrangère et de la colonne
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
};
