<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('events', function (Blueprint $table) {
            $table->string('type')->nullable()->after('image_url');
            $table->string('category')->nullable()->after('type');
            $table->string('link')->nullable()->after('category');
            $table->string('references')->nullable()->after('link');
        });
    }

    public function down(): void
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn(['type', 'category', 'link', 'references']);
        });
    }
};

