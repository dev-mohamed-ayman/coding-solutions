<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 1. Upgrade site_translations
        Schema::create('site_translations_new', function (Blueprint $table) {
            $table->id();
            $table->string('key', 190)->unique();
            $table->json('value')->nullable();
            $table->timestamps();
        });

        $languages = DB::table('languages')->pluck('code', 'id');
        $oldTranslations = DB::table('site_translations')->get();

        $grouped = [];
        foreach ($oldTranslations as $t) {
            $locale = $languages[$t->language_id] ?? 'en';
            if (!isset($grouped[$t->key])) {
                $grouped[$t->key] = [];
            }
            $grouped[$t->key][$locale] = $t->value;
        }

        foreach ($grouped as $key => $values) {
            DB::table('site_translations_new')->insert([
                'key' => $key,
                'value' => json_encode($values),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        Schema::dropIfExists('site_translations');
        Schema::rename('site_translations_new', 'site_translations');

        // 2. Upgrade content_sections
        Schema::table('content_sections', function (Blueprint $table) {
            $table->json('title_new')->nullable()->after('title');
        });

        $sections = DB::table('content_sections')->get();
        foreach ($sections as $section) {
            $trans = DB::table('content_translations')
                ->where('content_section_id', $section->id)
                ->get();
            
            $values = [];
            foreach ($trans as $t) {
                $locale = $languages[$t->language_id] ?? 'en';
                $values[$locale] = $t->value;
            }
            
            // If no translations found, use the current title as default
            if (empty($values)) {
                $values['en'] = $section->title;
            }

            DB::table('content_sections')->where('id', $section->id)->update([
                'title_new' => json_encode($values)
            ]);
        }

        Schema::table('content_sections', function (Blueprint $table) {
            $table->dropColumn('title');
        });
        Schema::table('content_sections', function (Blueprint $table) {
            $table->renameColumn('title_new', 'title');
        });

        // 3. Upgrade content_blocks
        Schema::table('content_blocks', function (Blueprint $table) {
            $table->json('title')->nullable()->after('type');
            $table->json('body')->nullable()->after('title');
            $table->json('cta_label')->nullable()->after('body');
            $table->json('subtitle')->nullable()->after('cta_label');
            $table->json('tag')->nullable()->after('subtitle');
            $table->json('alt')->nullable()->after('tag');
        });

        $blocks = DB::table('content_blocks')->get();
        foreach ($blocks as $block) {
            $trans = DB::table('content_translations')
                ->where('content_block_id', $block->id)
                ->get();
            
            $groupedTrans = [];
            foreach ($trans as $t) {
                $locale = $languages[$t->language_id] ?? 'en';
                if (!isset($groupedTrans[$t->field])) {
                    $groupedTrans[$t->field] = [];
                }
                $groupedTrans[$t->field][$locale] = $t->value;
            }

            $update = [];
            foreach (['title', 'body', 'cta_label', 'subtitle', 'tag', 'alt'] as $field) {
                if (isset($groupedTrans[$field])) {
                    $update[$field] = json_encode($groupedTrans[$field]);
                }
            }

            if (!empty($update)) {
                DB::table('content_blocks')->where('id', $block->id)->update($update);
            }
        }

        // 4. Optionally drop content_translations if no longer needed
        // Schema::dropIfExists('content_translations');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Reversal logic would be complex, skipping for now as this is a major refactor
    }
};
