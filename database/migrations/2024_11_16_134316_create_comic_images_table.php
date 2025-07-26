<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('comic_images', function (Blueprint $table) {
            $table->id();
            // when parent record is deleted the relationship records will be deleted
            $table->unsignedBigInteger('comic_id');
            $table->string('link');
            $table->text('text')->nullable();
            $table->timestamps();
            $table->softDeletes(); // Add this line for soft deletes
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comic_images');
    }
};
