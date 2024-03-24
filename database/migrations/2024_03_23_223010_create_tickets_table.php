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
        Schema::create('tickets', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('title');
            $table->string('category')->nullable();
            $table->enum('status', ['open', 'closed', 'in_progress'])->default('open');
            $table->enum('priority', ['low', 'medium', 'high'])->default('medium');
            $table->foreignUlid('user_id')->constrained('users')->onDelete('cascade');
            $table->longText('message');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
