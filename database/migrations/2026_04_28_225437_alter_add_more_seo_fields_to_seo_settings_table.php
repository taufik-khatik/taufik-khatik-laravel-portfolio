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
        Schema::table('seo_settings', function (Blueprint $table) {
            // page type (home, portfolio, portfolio-details, blogs, blog-details)
            $table->string('page_slug')->nullable()->unique()->after('id');

            // OG tags
            $table->boolean('og_enabled')->default(false);
            $table->string('og_title')->nullable();
            $table->text('og_description')->nullable();
            $table->text('og_image')->nullable();

            // Twitter card
            $table->boolean('twitter_enabled')->default(false);
            $table->string('twitter_title')->nullable();
            $table->text('twitter_description')->nullable();
            $table->text('twitter_image')->nullable();

            // Canonical
            $table->text('canonical_url')->nullable();

            // Robots (index/noindex - follow/nofollow)
            $table->string('robots')->default('index,follow');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('seo_settings', function (Blueprint $table) {
            // always drop unique first to avoid SQL errors
            if (Schema::hasColumn('seo_settings', 'page_slug')) {
                $table->dropUnique(['page_slug']);
            }

            $table->dropColumn([
                'page_slug',
                'og_enabled', 'og_title', 'og_description', 'og_image',
                'twitter_enabled', 'twitter_title', 'twitter_description', 'twitter_image',
                'canonical_url',
                'robots',
            ]);
        });
    }
};
