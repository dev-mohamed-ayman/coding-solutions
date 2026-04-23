<?php

namespace Database\Seeders;

use App\Models\Language;
use App\Models\SiteTranslation;
use Illuminate\Database\Seeder;

class SiteContentSeeder extends Seeder
{
    public function run(): void
    {
        /** @var array{en: array<string, string>, ar: array<string, string>} $bundles */
        $bundles = require database_path('seeders/data/site_strings.php');

        $en = Language::query()->updateOrCreate(
            ['code' => 'en'],
            [
                'name' => 'English',
                'native_name' => 'English',
                'direction' => 'ltr',
                'is_active' => true,
                'is_default' => true,
                'sort_order' => 0,
            ]
        );

        $ar = Language::query()->updateOrCreate(
            ['code' => 'ar'],
            [
                'name' => 'Arabic',
                'native_name' => 'العربية',
                'direction' => 'rtl',
                'is_active' => true,
                'is_default' => false,
                'sort_order' => 1,
            ]
        );

        $this->seedLanguage($en->id, $bundles['en']);
        $this->seedLanguage($ar->id, $bundles['ar']);
    }

    /**
     * @param  array<string, string>  $lines
     */
    private function seedLanguage(int $languageId, array $lines): void
    {
        foreach ($lines as $key => $value) {
            SiteTranslation::query()->updateOrCreate(
                ['language_id' => $languageId, 'key' => $key],
                ['value' => $value]
            );
        }
    }
}
