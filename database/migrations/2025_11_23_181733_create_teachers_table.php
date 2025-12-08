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
    Schema::create('teachers', function (Blueprint $table) {
        $table->id();
        $table->string('full_name');
        $table->string('email')->unique();
        $table->string('phone');
        $table->string('subject');          
        $table->date('date_of_birth')->nullable();
        $table->string('qualification')->nullable(); 
        $table->string('address')->nullable();
        $table->enum('gender', ['male', 'female']);
        $table->date('hired_at');
        $table->enum('status', ['active', 'on_leave', 'inactive'])->default('active');
        $table->decimal('salary', 8, 2);
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
