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
        Schema::create('chapters', function (Blueprint $table) {
            $table->id();
            $table->string('comic_id');
            $table->string('title');
            $table->decimal('chapter_name', 10, 2); // the name or the number of the chapter
            $table->string('chapter_title')->nullable();
            $table->string('chapter_path')->nullable(); // optional chapter path, default is images links of the chapter
            $table->date('release_at')->nullable();
            $table->timestamps();
            $table->softDeletes(); // Add this line for soft deletes
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chapters');
    }
};
