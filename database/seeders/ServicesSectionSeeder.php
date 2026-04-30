<?php

namespace Database\Seeders;

use App\Models\ContentBlock;
use App\Models\ContentPage;
use Illuminate\Database\Seeder;

class ServicesSectionSeeder extends Seeder
{
    public function run(): void
    {
        $home = ContentPage::where('slug', 'home')->first();
        if (!$home) return;

        $services = [
            [
                'icon' => 'web',
                'color' => 'primary',
                'title' => ['en' => 'Web Development', 'ar' => 'تطوير المواقع'],
                'body' => [
                    'en' => 'Custom, high-performance websites built with the latest technologies to ensure a seamless user experience.',
                    'ar' => 'مواقع إلكترونية مخصصة وعالية الأداء مبنية بأحدث التقنيات لضمان تجربة مستخدم سلسة.'
                ],
            ],
            [
                'icon' => 'shopping_cart',
                'color' => 'purple',
                'title' => ['en' => 'E-Commerce Solutions', 'ar' => 'حلول التجارة الإلكترونية'],
                'body' => [
                    'en' => 'Scalable and secure online stores tailored to your business needs, maximizing conversions and sales.',
                    'ar' => 'متاجر إلكترونية قابلة للتوسع وآمنة مصممة خصيصاً لاحتياجات عملك، مما يزيد من التحويلات والمبيعات.'
                ],
            ],
            [
                'icon' => 'smartphone',
                'color' => 'emerald',
                'title' => ['en' => 'Mobile App Development', 'ar' => 'تطوير تطبيقات الجوال'],
                'body' => [
                    'en' => 'Native and cross-platform mobile applications that provide intuitive and engaging user experiences.',
                    'ar' => 'تطبيقات جوال أصلية ومتعددة المنصات توفر تجارب مستخدم بديهية وجذابة.'
                ],
            ],
            [
                'icon' => 'campaign',
                'color' => 'rose',
                'title' => ['en' => 'Digital Marketing', 'ar' => 'التسويق الرقمي'],
                'body' => [
                    'en' => 'Data-driven marketing strategies to increase your online visibility and attract your target audience.',
                    'ar' => 'استراتيجيات تسويق قائمة على البيانات لزيادة ظهورك على الإنترنت وجذب جمهورك المستهدف.'
                ],
            ],
            [
                'icon' => 'brush',
                'color' => 'amber',
                'title' => ['en' => 'UI/UX Design', 'ar' => 'تصميم واجهة وتجربة المستخدم'],
                'body' => [
                    'en' => 'Beautiful, user-centric designs that not only look great but also enhance functionality and user flow.',
                    'ar' => 'تصاميم جميلة تتمحور حول المستخدم لا تبدو رائعة فحسب، بل تعزز أيضاً الوظائف وتدفق المستخدم.'
                ],
            ],
            [
                'icon' => 'cloud',
                'color' => 'sky',
                'title' => ['en' => 'Cloud Solutions', 'ar' => 'حلول السحابة'],
                'body' => [
                    'en' => 'Reliable cloud hosting and architecture to ensure your applications run smoothly and securely at scale.',
                    'ar' => 'استضافة ومعمارية سحابية موثوقة لضمان تشغيل تطبيقاتك بسلاسة وأمان على نطاق واسع.'
                ],
            ],
        ];

        foreach ($services as $idx => $svc) {
            $block = ContentBlock::updateOrCreate(
                [
                    'content_page_id' => $home->id,
                    'zone' => 'services.items',
                    'sort_order' => $idx,
                ],
                [
                    'type' => 'service_item',
                    'payload' => [
                        'icon' => $svc['icon'],
                        'color' => $svc['color'],
                    ],
                    'is_active' => true,
                ]
            );

            foreach ($svc['title'] as $locale => $value) {
                $block->setTranslation('title', $locale, $value);
            }
            foreach ($svc['body'] as $locale => $value) {
                $block->setTranslation('body', $locale, $value);
            }
            $block->save();
        }
    }
}
