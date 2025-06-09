<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('carousel_items', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable(); // Optional title for the slide
            $table->json('image_path'); // to store multiple image paths as JSON
            $table->string('caption')->nullable(); // Optional caption text
            $table->text('description')->nullable(); // Longer description if needed
            $table->string('link_url')->nullable(); // URL to link the slide to
            $table->string('link_text')->nullable(); // Text for the link button
            $table->boolean('is_active')->default(true); // Whether the slide is active
            $table->integer('order')->default(0); // Sorting order
            $table->timestamps(); // created_at and updated_at columns
            $table->softDeletes(); // Optional: for soft deletion
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('carousel_items');
    }
};
