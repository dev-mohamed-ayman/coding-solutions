<?php

namespace Database\Seeders;

use App\Models\ContentBlock;
use App\Models\ContentPage;
use Illuminate\Database\Seeder;

class StatsBlockSeeder extends Seeder
{
    public function run(): void
    {
        $home = ContentPage::where('slug', 'home')->first();
        if (!$home) return;

        $stats = [
            [
                'target' => '150',
                'suffix' => '+',
                'title' => ['en' => 'Projects', 'ar' => 'مشروع'],
            ],
            [
                'target' => '98',
                'suffix' => '%',
                'title' => ['en' => 'Success Rate', 'ar' => 'نسبة النجاح'],
            ],
            [
                'target' => '50',
                'suffix' => '+',
                'title' => ['en' => 'Clients', 'ar' => 'عميل'],
            ],
            [
                'target' => '5',
                'suffix' => 'Y+',
                'title' => ['en' => 'Experience', 'ar' => 'سنوات خبرة'],
            ],
        ];

        foreach ($stats as $idx => $stat) {
            $block = ContentBlock::updateOrCreate(
                [
                    'content_page_id' => $home->id,
                    'zone' => 'stats.items',
                    'sort_order' => $idx,
                ],
                [
                    'type' => 'stat_item',
                    'payload' => [
                        'target' => $stat['target'],
                        'suffix' => $stat['suffix'],
                    ],
                    'is_active' => true,
                ]
            );

            foreach ($stat['title'] as $locale => $value) {
                $block->setTranslation('title', $locale, $value);
            }
            $block->save();
        }
    }
}
