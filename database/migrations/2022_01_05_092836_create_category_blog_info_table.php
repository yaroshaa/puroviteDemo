<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up():void
    {
        Schema::create('category_blog_info', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('categories_blog_id');
            $table->unsignedBigInteger('language_id');
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->string('meta_keys')->nullable();
            $table->text('meta_description')->nullable();
            $table->timestamps();

            $table->foreign('categories_blog_id')->references('id')->on('categories_blog')->onDelete('cascade');
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down():void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('category_blog_info');
        Schema::enableForeignKeyConstraints();
    }
};
