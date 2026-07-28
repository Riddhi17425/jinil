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
        Schema::create('blog', function (Blueprint $table) {
            $table->id();

            $table->string('title')->nullable();
            $table->text('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->date('date')->nullable();

            $table->text('front_image')->nullable();
            $table->text('detail_image')->nullable();

            $table->text('cta_text')->nullable();
            $table->text('cta_image')->nullable();

            $table->text('conclusion')->nullable();

            $table->string('url')->nullable();

            $table->boolean('status')->default(1);

            $table->text('meta_title')->nullable();
            $table->text('meta_description')->nullable();

            $table->softDeletes(); // deleted_at

            $table->longText('title_description')->nullable();

            $table->timestamps(); // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog');
    }
};