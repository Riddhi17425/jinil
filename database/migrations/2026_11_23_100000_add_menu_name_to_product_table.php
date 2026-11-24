<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (! Schema::hasColumn('product', 'menu_name')) {
            Schema::table('product', function (Blueprint $table) {
                $table->string('menu_name')->nullable()->after('name');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('product', 'menu_name')) {
            Schema::table('product', function (Blueprint $table) {
                $table->dropColumn('menu_name');
            });
        }
    }
};
