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
        Schema::create('product', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('category_id')->nullable();

            $table->longText('industries')->nullable();

            $table->string('title')->nullable();
            $table->string('title_brief', 1000)->nullable();
            $table->string('url')->nullable();
            $table->string('name')->nullable();

            $table->text('service_note')->nullable();

            $table->longText('working_principle_desc')->nullable();

            $table->string('configuration_title')->nullable();
            $table->longText('configuration_description')->nullable();

            $table->text('front_image')->nullable();
            $table->string('detail_image', 500)->nullable();

            $table->text('short_description')->nullable();

            $table->string('feature_product')->nullable();

            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();

            $table->string('blast_wheels_image')->nullable();
            $table->longText('blast_wheels')->nullable();

            $table->longText('main_components')->nullable();
            $table->longText('tech_specifications')->nullable();

            $table->text('application_desc')->nullable();
            $table->longText('applications')->nullable();

            $table->text('advantages_desc')->nullable();
            $table->longText('advantages')->nullable();

            $table->text('design_features_desc')->nullable();
            $table->longText('design_features')->nullable();

            $table->text('selection_guidelines_desc')->nullable();
            $table->longText('selection_guidelines')->nullable();

            $table->text('optional_features_desc')->nullable();
            $table->longText('optional_features')->nullable();

            $table->longText('operational_accessories')->nullable();

            $table->text('optional_accessories_desc')->nullable();

            $table->longText('faqs')->nullable();
            $table->text('faqs_desc')->nullable();

            $table->string('why_choose_title')->nullable();
            $table->string('why_choose_description', 1000)->nullable();

            $table->text('related_industries_desc')->nullable();

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
        Schema::dropIfExists('product');
    }
};