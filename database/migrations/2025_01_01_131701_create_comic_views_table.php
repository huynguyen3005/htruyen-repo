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
        Schema::create('comic_views', function (Blueprint $table) {
            $table->id();
            $table->string('comic_id');
            $table->integer('views_daily')->default(0);
            $table->integer('views_weekly')->default(0);
            $table->integer('views_monthly')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comic_views');
    }
};
