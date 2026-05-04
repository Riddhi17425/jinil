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
        $columns = [
            'title_brief' => 'string',
            'service_note' => 'text',
            'working_principal_desc' => 'text',
            'configuration_title' => 'string',
            'configuration_description' => 'text',
            'industries' => 'json',
            'blast_wheels_image' => 'string',
            'blast_wheels' => 'json',
            'main_components' => 'json',
            'tech_specifications' => 'json',
            'application_desc' => 'text',
            'applications' => 'json',
            'advantages_desc' => 'text',
            'advantages' => 'json',
            'design_features_desc' => 'text',
            'design_features' => 'json',
            'selection_guidelines_desc' => 'text',
            'selection_guidelines' => 'json',
            'operational_features_desc' => 'text',
            'operational_features' => 'json',
            'operational_accessories' => 'json',
            'faqs' => 'json',
        ];

        foreach ($columns as $column => $type) {
            if (!Schema::hasColumn('product', $column)) {
                Schema::table('product', function (Blueprint $table) use ($column, $type) {
                    if ($type === 'string') {
                        $table->string($column)->nullable();
                    } elseif ($type === 'text') {
                        $table->text($column)->nullable();
                    } else {
                        $table->json($column)->nullable();
                    }
                });
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $columns = [
            'title_brief',
            'service_note',
            'working_principal_desc',
            'configuration_title',
            'configuration_description',
            'industries',
            'blast_wheels_image',
            'blast_wheels',
            'main_components',
            'tech_specifications',
            'application_desc',
            'applications',
            'advantages_desc',
            'advantages',
            'design_features_desc',
            'design_features',
            'selection_guidelines_desc',
            'selection_guidelines',
            'operational_features_desc',
            'operational_features',
            'operational_accessories',
            'faqs',
        ];

        foreach ($columns as $column) {
            if (Schema::hasColumn('product', $column)) {
                Schema::table('product', function (Blueprint $table) use ($column) {
                    $table->dropColumn($column);
                });
            }
        }
    }
};
