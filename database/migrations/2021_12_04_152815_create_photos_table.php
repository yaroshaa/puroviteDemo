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
        Schema::create('photos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('language_id');
            $table->unsignedBigInteger( 'categories_photos_id');
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->string('meta_keys')->nullable();
            $table->text('meta_description')->nullable();
            $table->text( 'photos')->nullable();
            $table->text( 'icon')->nullable();
            $table->text( 'tags')->nullable();
            $table->timestamps();

            $table->foreign('categories_photos_id')->references('id')->on('categories_photos')->onDelete('cascade');
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
        Schema::dropIfExists('photos');
        Schema::enableForeignKeyConstraints();

    }
};
