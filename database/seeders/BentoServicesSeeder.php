<?php

namespace Database\Seeders;

use App\Models\ContentBlock;
use App\Models\ContentPage;
use App\Models\Language;
use Illuminate\Database\Seeder;

class BentoServicesSeeder extends Seeder
{
    public function run(): void
    {
        $home = ContentPage::where('slug', 'home')->first();
        if (!$home) return;

        $cards = [
            [
                'icon' => 'web',
                'color' => 'blue',
                'title' => ['en' => 'Web Dev', 'ar' => 'تطوير المواقع'],
                'body' => [
                    'en' => 'High-performance, editorial websites built with React, Next.js, and modern CSS architectures.',
                    'ar' => 'مواقع إلكترونية عالية الأداء مبنية باستخدام React و Next.js ومعماريات CSS الحديثة.'
                ],
            ],
            [
                'icon' => 'smartphone',
                'color' => 'violet',
                'title' => ['en' => 'App Dev', 'ar' => 'تطوير التطبيقات'],
                'body' => [
                    'en' => 'Cross-platform mobile experiences that feel native, utilizing Flutter and React Native expertise.',
                    'ar' => 'تجارب تطبيقات جوال متعددة المنصات تبدو وكأنها أصلية، باستخدام خبرات Flutter و React Native.'
                ],
            ],
            [
                'icon' => 'psychology',
                'color' => 'emerald',
                'title' => ['en' => 'AI Solutions', 'ar' => 'حلول الذكاء الاصطناعي'],
                'body' => [
                    'en' => 'Integrating LLMs and custom machine learning models into your business workflow.',
                    'ar' => 'دمج نماذج اللغة الكبيرة (LLMs) ونماذج تعلم الآلة المخصصة في سير عمل عملك.'
                ],
            ],
        ];

        foreach ($cards as $idx => $card) {
            $block = ContentBlock::updateOrCreate(
                [
                    'content_page_id' => $home->id,
                    'zone' => 'services_bento.cards',
                    'sort_order' => $idx,
                ],
                [
                    'type' => 'service_card',
                    'payload' => [
                        'icon' => $card['icon'],
                        'color' => $card['color'],
                    ],
                    'is_active' => true,
                ]
            );

            foreach ($card['title'] as $locale => $value) {
                $block->setTranslation('title', $locale, $value);
            }
            foreach ($card['body'] as $locale => $value) {
                $block->setTranslation('body', $locale, $value);
            }
            $block->save();
        }
    }
}
