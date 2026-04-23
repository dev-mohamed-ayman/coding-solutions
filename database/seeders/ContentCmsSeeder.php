<?php

namespace Database\Seeders;

use App\Models\ContentBlock;
use App\Models\ContentPage;
use App\Models\ContentSection;
use App\Models\ContentTranslation;
use App\Models\Language;
use App\Services\ContentService;
use Illuminate\Database\Seeder;

class ContentCmsSeeder extends Seeder
{
    public function run(): void
    {
        /** @var array<string, array<string, string>> $bundles */
        $bundles = require database_path('seeders/data/site_strings.php');

        $home = ContentPage::query()->updateOrCreate(
            ['slug' => 'home'],
            ['name' => 'Homepage', 'is_active' => true]
        );

        $sectionGroups = [
            'header' => ['title' => 'Header', 'keys' => ['nav.services', 'nav.portfolio', 'nav.about', 'nav.contact', 'nav.cta']],
            'footer' => ['title' => 'Footer', 'keys' => ['footer.rights']],
            'services_bento' => ['title' => 'Hero Bento', 'keys' => ['services_bento.kicker', 'services_bento.title_line1', 'services_bento.title_gradient', 'services_bento.body', 'services_bento.cta_primary', 'services_bento.cta_secondary', 'services_bento.system_kicker', 'services_bento.system_status', 'services_bento.uptime', 'services_bento.card_web_title', 'services_bento.card_web_body', 'services_bento.card_app_title', 'services_bento.card_app_body', 'services_bento.card_ai_title', 'services_bento.card_ai_body']],
            'stats' => ['title' => 'Stats', 'keys' => ['stats.projects', 'stats.success_rate', 'stats.clients', 'stats.experience']],
            'services' => ['title' => 'Services Section', 'keys' => ['services_section.kicker', 'services_section.title_our', 'services_section.title_services', 'services_section.intro', 'services_section.svc1_title', 'services_section.svc1_body', 'services_section.svc2_title', 'services_section.svc2_body', 'services_section.svc3_title', 'services_section.svc3_body', 'services_section.svc4_title', 'services_section.svc4_body', 'services_section.svc5_title', 'services_section.svc5_body', 'services_section.svc6_title', 'services_section.svc6_body']],
            'why_choose_us' => ['title' => 'Why Choose Us', 'keys' => ['why.kicker', 'why.title_why', 'why.title_choose', 'why.intro', 'why.card1_title', 'why.card1_body', 'why.card2_title', 'why.card2_body', 'why.card3_title', 'why.card3_body', 'why.card4_title', 'why.card4_body']],
            'technologies' => ['title' => 'Technologies', 'keys' => ['technologies.kicker', 'technologies.title_main', 'technologies.title_gradient', 'technologies.intro']],
            'portfolio' => ['title' => 'Portfolio Strip', 'keys' => ['portfolio.tech_kicker', 'portfolio.stack_title', 'portfolio.cloud_title', 'portfolio.cloud_body']],
            'projects' => ['title' => 'Projects', 'keys' => ['projects.kicker', 'projects.title_featured', 'projects.title_projects', 'projects.intro', 'projects.p1_title', 'projects.p1_body', 'projects.p1_alt', 'projects.p2_title', 'projects.p2_body', 'projects.p2_alt', 'projects.p3_title', 'projects.p3_body', 'projects.p3_alt', 'projects.view_all']],
            'testimonials' => ['title' => 'Testimonials', 'keys' => ['testimonials.kicker', 'testimonials.title_what', 'testimonials.title_clients', 'testimonials.intro', 'testimonials.t1_quote', 'testimonials.t1_name', 'testimonials.t1_role', 'testimonials.t2_quote', 'testimonials.t2_name', 'testimonials.t2_role', 'testimonials.t3_quote', 'testimonials.t3_name', 'testimonials.t3_role']],
            'contact_cta' => ['title' => 'Contact CTA', 'keys' => ['contact.kicker', 'contact.title_line', 'contact.title_gradient', 'contact.intro', 'contact.cta_primary', 'contact.cta_email']],
        ];

        $sections = [];
        $order = 0;
        foreach ($sectionGroups as $key => $meta) {
            $section = ContentSection::query()->updateOrCreate(
                ['content_page_id' => $home->id, 'section_key' => $key],
                [
                    'title' => $meta['title'],
                    'schema' => ['fields' => $meta['keys']],
                    'sort_order' => $order++,
                ]
            );
            $sections[$key] = $section;
        }

        foreach (Language::query()->get() as $language) {
            $bundle = $bundles[$language->code] ?? [];
            foreach ($sections as $sectionKey => $section) {
                /** @var array{keys: array<int, string>} $sectionMeta */
                $sectionMeta = $sectionGroups[$sectionKey];
                foreach ($sectionMeta['keys'] as $fieldKey) {
                    ContentTranslation::query()->updateOrCreate(
                        [
                            'language_id' => $language->id,
                            'content_section_id' => $section->id,
                            'content_block_id' => null,
                            'field' => $fieldKey,
                        ],
                        ['value' => $bundle[$fieldKey] ?? $fieldKey]
                    );
                }
            }
        }

        $projectCards = [
            [
                'tag' => 'CRM',
                'image_url' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                'tech' => ['Laravel', 'Vue.js', 'Tailwind'],
                'title_key' => 'projects.p1_title',
                'body_key' => 'projects.p1_body',
                'alt_key' => 'projects.p1_alt',
            ],
            [
                'tag' => 'E-Commerce',
                'image_url' => 'https://images.unsplash.com/photo-1661956602116-aa6865609028?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                'tech' => ['Next.js', 'Stripe', 'React'],
                'title_key' => 'projects.p2_title',
                'body_key' => 'projects.p2_body',
                'alt_key' => 'projects.p2_alt',
            ],
            [
                'tag' => 'SaaS',
                'image_url' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                'tech' => ['Python', 'Django', 'PostgreSQL'],
                'title_key' => 'projects.p3_title',
                'body_key' => 'projects.p3_body',
                'alt_key' => 'projects.p3_alt',
            ],
        ];

        foreach ($projectCards as $idx => $card) {
            $block = ContentBlock::query()->updateOrCreate(
                [
                    'content_page_id' => $home->id,
                    'zone' => 'projects.cards',
                    'sort_order' => $idx,
                ],
                [
                    'type' => 'project_card',
                    'is_active' => true,
                    'payload' => [
                        'image_url' => $card['image_url'],
                        'tech' => $card['tech'],
                    ],
                ]
            );

            foreach (Language::query()->get() as $language) {
                $bundle = $bundles[$language->code] ?? [];
                ContentTranslation::query()->updateOrCreate(
                    ['language_id' => $language->id, 'content_block_id' => $block->id, 'content_section_id' => null, 'field' => 'title'],
                    ['value' => $bundle[$card['title_key']] ?? '']
                );
                ContentTranslation::query()->updateOrCreate(
                    ['language_id' => $language->id, 'content_block_id' => $block->id, 'content_section_id' => null, 'field' => 'body'],
                    ['value' => $bundle[$card['body_key']] ?? '']
                );
                ContentTranslation::query()->updateOrCreate(
                    ['language_id' => $language->id, 'content_block_id' => $block->id, 'content_section_id' => null, 'field' => 'alt'],
                    ['value' => $bundle[$card['alt_key']] ?? '']
                );
                ContentTranslation::query()->updateOrCreate(
                    ['language_id' => $language->id, 'content_block_id' => $block->id, 'content_section_id' => null, 'field' => 'tag'],
                    ['value' => $card['tag']]
                );
            }
        }

        ContentService::forgetAll();
    }
}
