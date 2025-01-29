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
        Schema::create('hours_weeks', function (Blueprint $table) {
            $table->id();

            $table->enum('day', ['Segunda-Feira', 'Terça-Feira', 'Quarta-Feira', 'Quinta-Feira', 'Sexta-Feira', 'Sábado', 'Domingo']);
            $table->boolean('active')->default(true);
            $table->string('start_time')->nullable();
            $table->string('closing_time')->nullable();

            $table->foreignId('business_id')->nullable()->constrained('business')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hours_weeks');
    }
};
