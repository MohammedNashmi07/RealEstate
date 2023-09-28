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
        // Drop the 'features' table if it exists
        if (Schema::hasTable('features')) {
            Schema::dropIfExists('features');
        }

        // Drop the 'property_has_features' table if it exists
        if (Schema::hasTable('property_has_features')) {
            Schema::dropIfExists('property_has_features');
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
