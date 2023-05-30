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
        Schema::create('books', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('book_category_id');    
            $table->foreignId('user_id')->nullable();                
                // ->constrainted()
                // ->onUpdate('no action')
                // ->onDelete('cascade');
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('author');
            $table->string('publisher');
            $table->string('description')->nullable();
            
            $table->string('cover')->nullable();
            $table->string('pdf_url')->nullable();
            $table->longText('summary')->nullable();

            $table->string('status')->default('CREATED');
            
            $table->boolean('featured')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
