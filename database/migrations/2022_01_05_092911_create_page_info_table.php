<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePageInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page_info', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('language_id');
            $table->unsignedBigInteger('page_id');
            $table->string('name')->nullable();
            $table->string('tags')->nullable();
            $table->string('meta_keys')->nullable();
            $table->string('meta_description')->nullable();
            $table->timestamps();


            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
            $table->foreign('page_id')->references('id')->on('pages')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('page_info');
        Schema::enableForeignKeyConstraints();
    }
}
