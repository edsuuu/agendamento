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
        Schema::create('procedures', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->text('description');
            $table->decimal('price', 10, 2);
            $table->float('duration');
            $table->string('photo', 255)->nullable();

            $table->foreignId('procedure_category_id')->nullable()->constrained('procedure_categories')->onDelete('cascade')->onUpdate('cascade');

            $table->foreignId('business_id')->constrained('businesses')->onDelete('cascade')
	            ->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('procedures');
    }
};
