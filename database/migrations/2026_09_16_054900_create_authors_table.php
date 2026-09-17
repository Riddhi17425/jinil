<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('authors', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('slug')->unique();

            $table->string('designation')->nullable();
            $table->string('years_of_experience')->nullable();

            $table->string('social_media_name')->nullable();
            $table->string('social_media')->nullable();

            $table->text('description')->nullable();

            $table->string('main_image')->nullable();
            $table->string('social_media_image')->nullable();
            $table->string('thumbnail_image')->nullable();

            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('authors');
    }
}
