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
        Schema::create('contracts', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('company_id')->constrained('companies')->onDelete('cascade');
            $table->foreignUlid('category_id')->constrained('categories')->onDelete('restrict');
            $table->foreignUlid('department_id')->constrained('departments')->onDelete('restrict');
            $table->string('title');
            $table->longText('comment')->nullable();
            $table->date('expiry_date');
            $table->date('start_date');
            $table->string('status')->nullable();
            $table->string('contract_filepath')->nullable();
            $table->string('contract_filename')->nullable();
            $table->string('contract_filesize')->nullable();
            $table->string('contact_person')->nullable();
            $table->string('scope')->nullable();
            $table->string('code')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contracts');
    }
};
