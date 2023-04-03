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
        Schema::create('blog_content', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('language_id');
            $table->unsignedBigInteger('blog_id');
            $table->string('name')->nullable();
            $table->text('content')->nullable();
            $table->string('meta_keys')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();

            $table->foreign('blog_id')->references('id')->on('blog')->cascadeOnDelete();
            $table->foreign('language_id')->references('id')->on('languages');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('blog_content');
        Schema::enableForeignKeyConstraints();
    }
};
