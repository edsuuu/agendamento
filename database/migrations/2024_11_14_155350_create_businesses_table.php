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
        Schema::create('businesses', function (Blueprint $table) {
            $table->id();
            $table->string('name', 60);
            $table->string('documents', 18)->unique()->nullable();
            $table->string('address', 60)->nullable();
            $table->string('city')->nullable();
            $table->string('number_address', 10)->nullable();
            $table->string('state', 2)->nullable();
            $table->string('zip', 9)->nullable();
            $table->string('photo')->nullable();

            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');

            $table->foreignId('segment_type_id')->nullable()->constrained('segment_types')->onDelete
            ('cascade')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('businesses');
    }
};
