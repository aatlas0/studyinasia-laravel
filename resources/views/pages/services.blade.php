@extends('layouts.app')

@section('title', __('nav.services'))
@section('meta_description', __('services.subtitle'))

@section('content')

<section class="bg-primary py-20">
    <div class="container-custom mx-auto px-4 text-center">
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">{{ __('services.title') }}</h1>
        <p class="text-white/80 max-w-2xl mx-auto">{{ __('services.subtitle') }}</p>
    </div>
</section>

<section class="section-padding">
    <div class="container-custom mx-auto px-4">
        <div class="grid md:grid-cols-2 gap-8">
            @php
            $services = [
                ['key' => 'orientation', 'features_fr' => ['Bilan personnalisé des compétences', 'Sélection des meilleures universités', "Analyse des critères d'admission", 'Conseil stratégique personnalisé'], 'features_ar' => ['تقييم شخصي للمهارات', 'اختيار أفضل الجامعات', 'تحليل معايير القبول', 'نصائح استراتيجية شخصية'], 'features_en' => ['Personalized skills assessment', 'Best university selection', 'Admission criteria analysis', 'Personalized strategic advice']],
                ['key' => 'dossier', 'features_fr' => ['Rédaction et mise en forme du CV', 'Lettre de motivation personnalisée', 'Traduction certifiée des documents', 'Suivi de candidature en temps réel'], 'features_ar' => ['كتابة وتنسيق السيرة الذاتية', 'رسالة تحفيز شخصية', 'ترجمة معتمدة للوثائق', 'متابعة الطلب في الوقت الحقيقي'], 'features_en' => ['CV writing and formatting', 'Personalized motivation letter', 'Certified document translation', 'Real-time application tracking']],
                ['key' => 'visa', 'features_fr' => ['Préparation du dossier visa', 'Prise de rendez-vous consulat', "Simulation d'entretien", 'Assurance voyage et santé'], 'features_ar' => ['إعداد ملف التأشيرة', 'حجز موعد القنصلية', 'محاكاة المقابلة', 'تأمين السفر والصحة'], 'features_en' => ['Visa file preparation', 'Consulate appointment booking', 'Interview simulation', 'Travel and health insurance']],
                ['key' => 'support', 'features_fr' => ["Réservation de billet d'avion", "Accueil à l'aéroport", 'Installation dans le logement', 'Support 24/7 pendant vos études'], 'features_ar' => ['حجز تذكرة الطيران', 'الاستقبال في المطار', 'الاستقرار في السكن', 'دعم 24/7 خلال دراستك'], 'features_en' => ['Flight ticket booking', 'Airport pickup', 'Housing settlement', '24/7 support during your studies']],
            ];
            $locale = app()->getLocale();
            @endphp

            @foreach($services as $service)
            <div class="card p-8 hover-lift">
                <div class="w-14 h-14 rounded-xl flex items-center justify-center mb-4" style="background-color: color-mix(in srgb, var(--color-primary) 10%, transparent);">
                    <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-3">{{ __("services.{$service['key']}.title") }}</h3>
                <p class="text-muted-foreground mb-6">{{ __("services.{$service['key']}.desc") }}</p>
                <ul class="space-y-2">
                    @foreach($service["features_{$locale}"] as $feature)
                    <li class="flex items-center gap-2 text-sm">
                        <svg class="w-5 h-5 text-primary flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        {{ $feature }}
                    </li>
                    @endforeach
                </ul>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Testimonials --}}
<section class="section-padding" style="background-color: color-mix(in srgb, var(--color-secondary) 30%, transparent);">
    <div class="container-custom mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">{{ __('testimonials.title') }}</h2>
        </div>
        @php
        $testimonials = [
            ['name' => 'Ahmed Benali', 'program' => 'MBBS - Peking University', 'emoji' => '👨‍⚕️',
             'text_fr' => "Grâce à Study In Asia, j'ai pu intégrer une des meilleures universités de médecine en Chine. Leur accompagnement a été exceptionnel du début à la fin.",
             'text_ar' => 'بفضل Study In Asia، تمكنت من الالتحاق بواحدة من أفضل جامعات الطب في الصين. كانت مرافقتهم استثنائية من البداية إلى النهاية.',
             'text_en' => 'Thanks to Study In Asia, I was able to join one of the best medical universities in China. Their support was exceptional from start to finish.'],
            ['name' => 'Fatima Zahra', 'program' => 'Business - Shanghai Jiao Tong', 'emoji' => '👩‍💼',
             'text_fr' => "Le processus était simple et transparent. L'équipe m'a guidée à chaque étape et j'ai obtenu une bourse complète!",
             'text_ar' => 'كانت العملية بسيطة وشفافة. أرشدني الفريق في كل خطوة وحصلت على منحة كاملة!',
             'text_en' => 'The process was simple and transparent. The team guided me every step of the way and I got a full scholarship!'],
            ['name' => 'Youssef El Amrani', 'program' => 'Engineering - Tsinghua University', 'emoji' => '👨‍🔬',
             'text_fr' => "Étudier en Chine a changé ma vie. Study In Asia m'a permis de réaliser mon rêve d'intégrer Tsinghua.",
             'text_ar' => 'الدراسة في الصين غيرت حياتي. Study In Asia مكنتني من تحقيق حلمي بالالتحاق بجامعة تسينغهوا.',
             'text_en' => 'Studying in China changed my life. Study In Asia helped me achieve my dream of joining Tsinghua.'],
        ];
        @endphp
        <div class="grid md:grid-cols-3 gap-6">
            @foreach($testimonials as $t)
            <div class="card p-6">
                <div class="flex items-center gap-4 mb-4">
                    <div class="text-4xl">{{ $t['emoji'] }}</div>
                    <div>
                        <h4 class="font-semibold">{{ $t['name'] }}</h4>
                        <p class="text-sm text-primary">{{ $t['program'] }}</p>
                    </div>
                </div>
                <p class="text-muted-foreground text-sm italic">"{{ $t["text_{$locale}"] }}"</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
