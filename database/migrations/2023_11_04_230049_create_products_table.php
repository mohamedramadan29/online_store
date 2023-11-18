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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            //$table->string('category_id')->nullable();
            $table->foreignId('category_id')->nullable()->references('id')->on('categories')->nullOnDelete();
            $table->string('name');
            $table->string('slug');
            $table->text('short_description');
            $table->text('description');
            $table->string('price');
            $table->string('selling_price')->nullable();
            $table->string('image');
            $table->integer('qty');
            $table->string('tax');
            $table->string('status');
            $table->string('trend');
            $table->string('meta_title');
            $table->text('meta_description');
            $table->text('meta_keywords');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
