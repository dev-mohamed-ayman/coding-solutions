<?php

namespace Database\Seeders;

use App\Models\ContentTranslation;
use App\Models\Language;
use App\Models\SiteTranslation;
use App\Services\ContentService;
use App\Services\SiteTranslationService;
use Illuminate\Database\Seeder;

class UpdateWebsiteContentSeeder extends Seeder
{
    public function run(): void
    {
        $enData = [
            // Hero Section
            'services_bento.kicker' => 'Welcome to Coding Solutions',
            'services_bento.title_line1' => 'Software Solutions That',
            'services_bento.title_gradient' => 'Drive Real Business Growth',
            'services_bento.body' => 'We design and develop custom digital solutions that help businesses scale with confidence.',
            'services_bento.cta_primary' => 'Get Started',
            'services_bento.cta_secondary' => 'Learn More',
        
            // Services Section
            'services_section.kicker' => 'Our Integrated Services',
            'services_section.title_our' => 'We offer a range of technical solutions',
            'services_section.title_services' => 'designed to support your business goals.',
            'services_section.intro' => 'We provide tailored digital solutions designed to help businesses operate more efficiently and grow with confidence.',
            
            'services_section.svc1_title' => 'Web Development',
            'services_section.svc1_body' => 'Custom websites built for performance, usability, and business growth.',
            
            'services_section.svc2_title' => 'CRM Systems',
            'services_section.svc2_body' => 'We develop custom CRM platforms that simplify customer management and improve team performance.',
            
            'services_section.svc3_title' => 'ERP Systems',
            'services_section.svc3_body' => 'We build ERP systems that help businesses automate operations and manage resources efficiently.',
            
            'services_section.svc4_title' => 'WhatsApp Integration',
            'services_section.svc4_body' => 'WhatsApp API integration solutions that help businesses automate communication and improve customer engagement.',
            
            'services_section.svc5_title' => 'E-Commerce Platforms',
            'services_section.svc5_body' => 'Scalable and secure e-commerce solutions tailored to your business needs.',
            'services_section.svc6_title' => 'Custom Software',
            'services_section.svc6_body' => 'Bespoke software solutions tailored to solve specific business challenges.',
        
            // Why Choose Us
            'why.kicker' => 'Why Choose Us',
            'why.title_why' => 'Why Clients',
            'why.title_choose' => 'Work With Us',
            'why.intro' => 'We start by understanding each business\'s needs, then we design and develop solutions that are practical, scalable, and aligned with real goals.',
            
            'why.card1_title' => 'Practical Approach',
            'why.card1_body' => 'A practical approach to digital problem-solving.',
            'why.card2_title' => 'Reliable Support',
            'why.card2_body' => 'Reliable support and long-term scalability.',
            'why.card3_title' => 'Performance & Usability',
            'why.card3_body' => 'Strong focus on performance and usability.',
            'why.card4_title' => 'Tailored Solutions',
            'why.card4_body' => 'Tailored solutions for real business needs.',
        
            // Technologies
            'technologies.kicker' => 'Built with Trusted Technologies',
            'technologies.title_main' => 'We use modern and',
            'technologies.title_gradient' => 'reliable technologies',
            'technologies.intro' => 'To build scalable, high-performance digital solutions (React, Laravel, etc.).',
            
            // Stats
            'stats.projects' => '+50 Delivered Projects',
            'stats.success_rate' => 'High Success Rate',
            'stats.clients' => 'Happy Clients',
            'stats.experience' => 'Years of Experience',
        
            // Contact CTA
            'contact.kicker' => 'Contact Us',
            'contact.title_line' => 'Ready to Grow',
            'contact.title_gradient' => 'Your Business?',
            'contact.intro' => 'Tell us about your project, and we\'ll help you turn your idea into a scalable digital product.',
            'contact.cta_primary' => 'Chat Us Now',
            'contact.cta_email' => 'Email Us',
        
            // Process
            'process.kicker' => 'Our Process',
            'process.title' => 'How We Work',
            'process.step1_title' => 'Understand Business Needs',
            'process.step1_body' => 'We start by understanding your core business requirements.',
            'process.step2_title' => 'Plan the Right Solution',
            'process.step2_body' => 'We map out the architecture and features of your solution.',
            'process.step3_title' => 'Design and Develop',
            'process.step3_body' => 'We bring the solution to life with modern technologies.',
            'process.step4_title' => 'Launch and Support',
            'process.step4_body' => 'We deploy the product and provide continuous support.',
        
            // About Page
            'about.kicker' => 'About Us',
            'about.title' => 'Who Are',
            'about.title_gradient' => 'We?',
            'about.intro' => 'We are a digital solutions company focused on building practical, scalable, and business-driven software solutions.',
            'about.who_we_are_title' => 'Who We Are',
            'about.who_we_are_body' => 'Coding Solutions is a technology company dedicated to helping businesses build, improve, and scale through custom software solutions.',
            'about.what_we_do_title' => 'What We Do',
            'about.what_we_do_body' => 'We specialize in web development, CRM and ERP systems, WhatsApp integrations, and tailored digital solutions.',
            'about.how_we_work_title' => 'Our Vision',
            'about.how_we_work_body' => 'To be the leading digital solutions provider that transforms business ideas into scalable software.',
            'about.why_us_title' => 'Why Clients Work With Us',
            'about.why_us_item1' => 'Practical approach to problem solving.',
            'about.why_us_item2' => 'Reliable support and long-term scalability.',
            'about.why_us_item3' => 'Strong focus on performance.',
            'about.why_us_item4' => 'Tailored solutions for real needs.',
            'about.cta_title' => 'Let\'s Build Something',
            'about.cta_body' => 'We\'re here to help you turn business needs into practical digital solutions.',
        ];
        
        $arData = [
            // Hero Section
            'services_bento.kicker' => 'مرحباً بك في Coding Solutions',
            'services_bento.title_line1' => 'حلول برمجية مخصصة',
            'services_bento.title_gradient' => 'تساعد على نمو أعمالك',
            'services_bento.body' => 'نقدم خدمات تصميم وتطوير حلول رقمية مخصصة تساعد الشركات على التوسع وتحقيق نمو مستدام بثقة.',
            'services_bento.cta_primary' => 'ابدأ الآن',
            'services_bento.cta_secondary' => 'اكتشف المزيد',
        
            // Services Section
            'services_section.kicker' => 'خدماتنا المتكاملة',
            'services_section.title_our' => 'نقدم مجموعة من الحلول التقنية والبرمجية',
            'services_section.title_services' => 'المصممة لدعم أهداف أعمالك.',
            'services_section.intro' => 'نقدم حلولاً رقمية وبرمجية مخصصة تساعد الشركات على تحسين كفاءة العمل وتنظيم العمليات، ودعم النمو بثقة.',
            
            'services_section.svc1_title' => 'تصميم وتطوير المواقع الإلكترونية',
            'services_section.svc1_body' => 'نطور مواقع إلكترونية احترافية تجمع بين الأداء العالي، وسهولة الاستخدام، ودعم نمو الأعمال.',
            
            'services_section.svc2_title' => 'أنظمة إدارة الأعمال (CRM)',
            'services_section.svc2_body' => 'نوفر أنظمة CRM مخصصة تساعد الشركات على إدارة العملاء بكفاءة، وتحسين أداء فرق العمل.',
            
            'services_section.svc3_title' => 'أنظمة تخطيط الموارد (ERP)',
            'services_section.svc3_body' => 'نوفر حلول ERP متكاملة تساعد الشركات على أتمتة العمليات اليومية، وإدارة شؤون العمليات.',
            
            'services_section.svc4_title' => 'خدمات ربط واتساب API',
            'services_section.svc4_body' => 'نقدم حلول ربط واتساب API التي تساعد الشركات على أتمتة التواصل مع العملاء، وتحسين سرعة الاستجابة.',
            
            'services_section.svc5_title' => 'منصات التجارة الإلكترونية',
            'services_section.svc5_body' => 'منصات متكاملة وآمنة لدعم مبيعاتك عبر الإنترنت.',
            'services_section.svc6_title' => 'برمجيات مخصصة',
            'services_section.svc6_body' => 'حلول برمجية مخصصة لتلبية احتياجات أعمالك الدقيقة.',
        
            // Why Choose Us
            'why.kicker' => 'لماذا تختارنا؟',
            'why.title_why' => 'لماذا يختارنا',
            'why.title_choose' => 'عملاؤنا؟',
            'why.intro' => 'نبدأ أولاً بفهم احتياجات كل نشاط تجاري، ثم نعمل على تصميم وتطوير حلول رقمية وبرمجية عملية، قابلة للتوسع.',
            
            'why.card1_title' => 'منهج عملي',
            'why.card1_body' => 'منهج عملي في حل المشكلات الرقمية والبرمجية.',
            'why.card2_title' => 'دعم فني موثوق',
            'why.card2_body' => 'دعم فني موثوق وقابلية للتوسع على المدى الطويل.',
            'why.card3_title' => 'أداء وسهولة استخدام',
            'why.card3_body' => 'تركيز قوي على الأداء وسهولة الاستخدام.',
            'why.card4_title' => 'حلول مخصصة',
            'why.card4_body' => 'حلول برمجية مخصصة تناسب احتياجات الأعمال الفعلية.',
        
            // Technologies
            'technologies.kicker' => 'نعتمد على تقنيات موثوقة',
            'technologies.title_main' => 'نستخدم أحدث',
            'technologies.title_gradient' => 'التقنيات الموثوقة',
            'technologies.intro' => 'لتطوير حلول رقمية وبرمجية عالية الأداء، وقابلة للتوسع (مثل React و Laravel وغيرها).',
            
            // Stats
            'stats.projects' => '+50 مشروع ناجح',
            'stats.success_rate' => 'نسبة نجاح عالية',
            'stats.clients' => 'عملاء سعداء',
            'stats.experience' => 'سنوات من الخبرة',
        
            // Contact CTA
            'contact.kicker' => 'تواصل معنا',
            'contact.title_line' => 'جاهز لتطوير',
            'contact.title_gradient' => 'شركتك؟',
            'contact.intro' => 'شاركنا تفاصيل مشروعك، وسنساعدك على تحويل فكرتك إلى حل رقمي متكامل وقابل للتوسع.',
            'contact.cta_primary' => 'تواصل معنا الآن عبر الواتساب',
            'contact.cta_email' => 'البريد الإلكتروني',
        
            // Process
            'process.kicker' => 'آلية عملنا',
            'process.title' => 'كيف نعمل',
            'process.step1_title' => 'نفهم احتياجات أعمالك',
            'process.step1_body' => 'نبدأ بتحليل متطلبات عملك وفهمها بعمق.',
            'process.step2_title' => 'نضع الحل البرمجي المناسب',
            'process.step2_body' => 'نخطط لبنية النظام ومميزاته.',
            'process.step3_title' => 'نصمم ونطوّر الحل باحترافية',
            'process.step3_body' => 'نقوم ببرمجة النظام باستخدام أحدث التقنيات.',
            'process.step4_title' => 'نطلق المشروع ونوفر الدعم المستمر',
            'process.step4_body' => 'نضمن عمل النظام بسلاسة ونقدم الدعم المستمر.',
        
            // About Page
            'about.kicker' => 'نبذة عنّا',
            'about.title' => 'من',
            'about.title_gradient' => 'نحن؟',
            'about.intro' => 'نحن شركة متخصصة في الحلول الرقمية والبرمجية، نركّز على تطوير حلول عملية، قابلة للتوسع.',
            'about.who_we_are_title' => 'من نحن؟',
            'about.who_we_are_body' => 'Coding Solutions هي شركة تقنية متخصصة في مساعدة الشركات على بناء أعمالها وتطويرها والتوسع فيها من خلال حلول برمجية مخصصة.',
            'about.what_we_do_title' => 'ماذا نقدم؟',
            'about.what_we_do_body' => 'نتخصص في تصميم وتطوير المواقع الإلكترونية، وأنظمة CRM و ERP، وخدمات ربط واتساب API.',
            'about.how_we_work_title' => 'رؤيتنا',
            'about.how_we_work_body' => 'أن نكون المزود الرائد للحلول الرقمية التي تحول أفكار الأعمال إلى برمجيات قابلة للتوسع.',
            'about.why_us_title' => 'لماذا يختارنا عملاؤنا؟',
            'about.why_us_item1' => 'حلول برمجية مخصصة تناسب احتياجات الأعمال الفعلية.',
            'about.why_us_item2' => 'تركيز قوي على الأداء وسهولة الاستخدام.',
            'about.why_us_item3' => 'دعم فني موثوق وقابلية للتوسع.',
            'about.why_us_item4' => 'منهج عملي في حل المشكلات الرقمية.',
            'about.cta_title' => 'لنبنِ معاً حلاً يدعم نمو أعمالك',
            'about.cta_body' => 'نحن هنا لمساعدتك على تحويل احتياجات عملك إلى حلول رقمية وبرمجية عملية وفعالة.',
        ];

        $languages = Language::query()->get();
        $enLang = $languages->firstWhere('code', 'en');
        $arLang = $languages->firstWhere('code', 'ar');

        if ($enLang) {
            $this->seedTranslations($enLang->id, $enData);
        }

        if ($arLang) {
            $this->seedTranslations($arLang->id, $arData);
        }

        SiteTranslationService::flushAll();
        ContentService::forgetAll();
    }

    private function seedTranslations(int $languageId, array $data): void
    {
        foreach ($data as $key => $value) {
            // Update SiteTranslation
            SiteTranslation::query()->updateOrCreate(
                ['language_id' => $languageId, 'key' => $key],
                ['value' => $value]
            );

            // Update ContentTranslation if exists
            ContentTranslation::query()
                ->where('language_id', $languageId)
                ->where('field', $key)
                ->whereNotNull('content_section_id')
                ->update(['value' => $value]);
        }
    }
}
