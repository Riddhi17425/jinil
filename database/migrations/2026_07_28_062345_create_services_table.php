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
        Schema::create('services', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('category_id')->nullable();

            $table->string('title')->nullable();
            $table->string('url')->nullable();
            $table->string('name')->nullable();

            $table->string('front_image')->nullable();

            $table->longText('short_description')->nullable();

            $table->string('meta_title')->nullable();
            $table->longText('meta_description')->nullable();

            $table->longText('scope_section')->nullable();
            $table->longText('whychoose_section')->nullable();
            $table->longText('process_section')->nullable();

            $table->timestamps();
            $table->softDeletes();

            // Optional Foreign Key
            // $table->foreign('category_id')
            //       ->references('id')
            //       ->on('category')
            //       ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};