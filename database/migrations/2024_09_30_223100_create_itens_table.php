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
        Schema::create('itens', function (Blueprint $table) {
            $table->id();
            $table->string('name', 55);
            $table->foreignId('category_id')->constrained('categories', 'id');
            $table->text('description')->nullable();
            $table->decimal('price', 10, 2);
            $table->string('image');
            $table->date('expiration_date');
            $table->timestamps();
            $table->string('sku');
            $table->integer('quantity')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('itens');
    }
};
