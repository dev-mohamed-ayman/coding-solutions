<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\ContentTranslation;
use App\Models\Language;
use App\Models\SiteTranslation;
use App\Services\ContentService;
use App\Services\SiteTranslationService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class WebsiteController
{
    protected array $sections = [
        'hero' => [
            'title' => 'Hero Section',
            'keys' => [
                'services_bento.kicker' => 'Badge Text',
                'services_bento.title_line1' => 'Headline (Line 1)',
                'services_bento.title_gradient' => 'Headline (Gradient Part)',
                'services_bento.body' => 'Description',
                'services_bento.cta_primary' => 'Primary Button',
                'services_bento.cta_secondary' => 'Secondary Button',
                'services_bento.system_kicker' => 'System Kicker',
                'services_bento.system_status' => 'System Status Text',
                'services_bento.uptime' => 'Uptime Text',
                'services_bento.card_web_title' => 'Web Card Title',
                'services_bento.card_web_body' => 'Web Card Body',
                'services_bento.card_app_title' => 'App Card Title',
                'services_bento.card_app_body' => 'App Card Body',
                'services_bento.card_ai_title' => 'AI Card Title',
                'services_bento.card_ai_body' => 'AI Card Body',
            ]
        ],
        'services' => [
            'title' => 'Services Section',
            'keys' => [
                'services_section.kicker' => 'Badge Text',
                'services_section.title_our' => 'Headline (Part 1)',
                'services_section.title_services' => 'Headline (Gradient Part)',
                'services_section.intro' => 'Description',
                'services_section.svc1_title' => 'Service 1 Title',
                'services_section.svc1_body' => 'Service 1 Body',
                'services_section.svc2_title' => 'Service 2 Title',
                'services_section.svc2_body' => 'Service 2 Body',
                'services_section.svc3_title' => 'Service 3 Title',
                'services_section.svc3_body' => 'Service 3 Body',
                'services_section.svc4_title' => 'Service 4 Title',
                'services_section.svc4_body' => 'Service 4 Body',
                'services_section.svc5_title' => 'Service 5 Title',
                'services_section.svc5_body' => 'Service 5 Body',
                'services_section.svc6_title' => 'Service 6 Title',
                'services_section.svc6_body' => 'Service 6 Body',
            ]
        ],
        'why-us' => [
            'title' => 'Why Choose Us',
            'keys' => [
                'why.kicker' => 'Badge Text',
                'why.title_why' => 'Headline (Part 1)',
                'why.title_choose' => 'Headline (Gradient Part)',
                'why.intro' => 'Description',
                'why.card1_title' => 'Card 1 Title',
                'why.card1_body' => 'Card 1 Body',
                'why.card2_title' => 'Card 2 Title',
                'why.card2_body' => 'Card 2 Body',
                'why.card3_title' => 'Card 3 Title',
                'why.card3_body' => 'Card 3 Body',
                'why.card4_title' => 'Card 4 Title',
                'why.card4_body' => 'Card 4 Body',
            ]
        ],
        'technologies' => [
            'title' => 'Technologies',
            'keys' => [
                'technologies.kicker' => 'Badge Text',
                'technologies.title_main' => 'Headline (Part 1)',
                'technologies.title_gradient' => 'Headline (Gradient Part)',
                'technologies.intro' => 'Description',
                'portfolio.tech_kicker' => 'Portfolio Badge',
                'portfolio.stack_title' => 'Stack Title',
                'portfolio.cloud_title' => 'Cloud Title',
                'portfolio.cloud_body' => 'Cloud Description',
            ]
        ],
        'stats' => [
            'title' => 'Stats',
            'keys' => [
                'stats.projects' => 'Projects Label',
                'stats.success_rate' => 'Success Rate Label',
                'stats.clients' => 'Clients Label',
                'stats.experience' => 'Experience Label',
            ]
        ],
        'contact' => [
            'title' => 'Contact CTA',
            'keys' => [
                'contact.kicker' => 'Badge Text',
                'contact.title_line' => 'Headline (Part 1)',
                'contact.title_gradient' => 'Headline (Gradient Part)',
                'contact.intro' => 'Description',
                'contact.cta_primary' => 'Primary Button',
                'contact.cta_email' => 'Email Button',
            ]
        ],
        'header' => [
            'title' => 'Header Navigation',
            'keys' => [
                'nav.services' => 'Services Link',
                'nav.portfolio' => 'Portfolio Link',
                'nav.about' => 'About Link',
                'nav.contact' => 'Contact Link',
                'nav.cta' => 'CTA Button',
            ]
        ],
        'footer' => [
            'title' => 'Footer',
            'keys' => [
                'footer.rights' => 'Copyright Text',
            ]
        ],
        'about' => [
            'title' => 'About Page',
            'keys' => [
                'about.kicker' => 'Badge Text',
                'about.title' => 'Headline (Part 1)',
                'about.title_gradient' => 'Headline (Gradient Part)',
                'about.intro' => 'Description',
                'about.who_we_are_title' => 'Who We Are Title',
                'about.who_we_are_body' => 'Who We Are Body',
                'about.what_we_do_title' => 'What We Do Title',
                'about.what_we_do_body' => 'What We Do Body',
                'about.how_we_work_title' => 'How We Work Title',
                'about.how_we_work_body' => 'How We Work Body',
                'about.why_us_title' => 'Why Clients Work With Us Title',
                'about.why_us_item1' => 'Reason 1',
                'about.why_us_item2' => 'Reason 2',
                'about.why_us_item3' => 'Reason 3',
                'about.why_us_item4' => 'Reason 4',
                'about.cta_title' => 'CTA Title',
                'about.cta_body' => 'CTA Body',
            ]
        ],
        'process' => [
            'title' => 'Our Process',
            'keys' => [
                'process.kicker' => 'Badge Text',
                'process.title' => 'Headline',
                'process.step1_title' => 'Step 1 Title',
                'process.step1_body' => 'Step 1 Body',
                'process.step2_title' => 'Step 2 Title',
                'process.step2_body' => 'Step 2 Body',
                'process.step3_title' => 'Step 3 Title',
                'process.step3_body' => 'Step 3 Body',
                'process.step4_title' => 'Step 4 Title',
                'process.step4_body' => 'Step 4 Body',
            ]
        ],
    ];

    public function edit(string $section, Request $request): View
    {
        abort_unless(array_key_exists($section, $this->sections), 404);

        $sectionData = $this->sections[$section];
        
        $languages = Language::query()->where('is_active', true)->orderBy('sort_order')->orderBy('name')->get();
        $languageId = (int) $request->query('language_id', $languages->first()?->id ?? 0);
        $language = Language::query()->find($languageId) ?? $languages->first();

        $currentMap = [];
        if ($language) {
            // Priority 1: content_translations
            $contentMap = ContentTranslation::query()
                ->where('language_id', $language->id)
                ->whereNotNull('content_section_id')
                ->whereIn('field', array_keys($sectionData['keys']))
                ->pluck('value', 'field')
                ->all();
                
            // Priority 2: site_translations
            $siteMap = SiteTranslation::query()
                ->where('language_id', $language->id)
                ->whereIn('key', array_keys($sectionData['keys']))
                ->pluck('value', 'key')
                ->all();
                
            $currentMap = array_merge($siteMap, $contentMap);
        }

        return view('dashboard.website.edit', [
            'sectionKey' => $section,
            'section' => $sectionData,
            'languages' => $languages,
            'language' => $language,
            'currentMap' => $currentMap,
        ]);
    }

    public function update(string $section, Request $request): RedirectResponse
    {
        abort_unless(array_key_exists($section, $this->sections), 404);

        $data = $request->validate([
            'language_id' => ['required', 'exists:languages,id'],
            'translations' => ['nullable', 'array'],
            'translations.*' => ['nullable', 'string'],
        ]);

        $language = Language::query()->findOrFail($data['language_id']);
        $translations = $data['translations'] ?? [];

        foreach ($translations as $key => $value) {
            if (! is_string($key) || $key === '') {
                continue;
            }
            
            // 1. Update SiteTranslations
            SiteTranslation::query()->updateOrCreate(
                ['language_id' => $language->id, 'key' => $key],
                ['value' => $value]
            );
            
            // 2. Also update ContentTranslations if they exist to prevent overriding
            ContentTranslation::query()
                ->where('language_id', $language->id)
                ->whereNotNull('content_section_id')
                ->where('field', $key)
                ->update(['value' => $value]);
        }

        SiteTranslationService::forgetLocale($language->code);
        ContentService::forgetAll();

        return redirect()
            ->route('dashboard.website.edit', ['section' => $section, 'language_id' => $language->id])
            ->with('status', "{$this->sections[$section]['title']} translations saved.");
    }
}
