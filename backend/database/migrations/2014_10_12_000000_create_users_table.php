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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique(); // Changed to username and made it unique if it's a unique field
            $table->string('first_name'); // Renamed 'prenom' to 'first_name' for clarity
            $table->string('email')->unique(); // Email should remain unique
            $table->string('password');
            $table->enum('permission', ['admin', 'super_admin', 'stagiaire']);
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
        

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
