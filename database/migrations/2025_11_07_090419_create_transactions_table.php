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
        Schema::create('transactions', function (Blueprint $table) {
             $table->id(); // Primary key
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // User who initiated transaction
            $table->enum('type', ['credit', 'debit', 'refund', 'transfer']); // Transaction type
            $table->decimal('amount', 15, 2); // Amount
            $table->char('currency', 3)->default('EUR'); // Currency code
            $table->enum('status', ['pending', 'completed', 'failed', 'reversed'])->default('pending'); // Status
            $table->string('reference_id')->nullable()->unique(); // External reference ID
            $table->text('description')->nullable(); // Optional description
            $table->json('metadata')->nullable(); // Extra info in JSON
            $table->timestamps(); // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
