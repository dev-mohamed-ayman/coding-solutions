<?php

namespace Database\Seeders;

use App\Models\SiteTranslation;
use Illuminate\Database\Seeder;

class StatsFixSeeder extends Seeder
{
    public function run(): void
    {
        $stats = [
            'stats.projects' => ['en' => 'Projects', 'ar' => 'مشروع'],
            'stats.success_rate' => ['en' => 'Success Rate', 'ar' => 'نسبة النجاح'],
            'stats.clients' => ['en' => 'Clients', 'ar' => 'عميل'],
            'stats.experience' => ['en' => 'Experience', 'ar' => 'سنوات خبرة'],
        ];

        foreach ($stats as $key => $values) {
            $st = SiteTranslation::updateOrCreate(['key' => $key]);
            foreach ($values as $locale => $value) {
                $st->setTranslation('value', $locale, $value);
            }
            $st->save();
        }
    }
}
