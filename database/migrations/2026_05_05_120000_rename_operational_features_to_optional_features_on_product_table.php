<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Rename legacy operational_features* columns to optional_features* (MySQL).
     */
    public function up(): void
    {
        if (!Schema::hasTable('product')) {
            return;
        }

        if (Schema::getConnection()->getDriverName() !== 'mysql') {
            return;
        }

        if (Schema::hasColumn('product', 'operational_features_desc')
            && !Schema::hasColumn('product', 'optional_features_desc')) {
            DB::statement('ALTER TABLE `product` CHANGE `operational_features_desc` `optional_features_desc` TEXT NULL');
        }

        if (Schema::hasColumn('product', 'operational_features')
            && !Schema::hasColumn('product', 'optional_features')) {
            DB::statement('ALTER TABLE `product` CHANGE `operational_features` `optional_features` JSON NULL');
        }
    }

    /**
     * Reverse the column renames.
     */
    public function down(): void
    {
        if (!Schema::hasTable('product')) {
            return;
        }

        if (Schema::getConnection()->getDriverName() !== 'mysql') {
            return;
        }

        if (Schema::hasColumn('product', 'optional_features_desc')
            && !Schema::hasColumn('product', 'operational_features_desc')) {
            DB::statement('ALTER TABLE `product` CHANGE `optional_features_desc` `operational_features_desc` TEXT NULL');
        }

        if (Schema::hasColumn('product', 'optional_features')
            && !Schema::hasColumn('product', 'operational_features')) {
            DB::statement('ALTER TABLE `product` CHANGE `optional_features` `operational_features` JSON NULL');
        }
    }
};
