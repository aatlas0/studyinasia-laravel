@extends('layouts.app')

@section('title', __('faq.title'))

@section('content')

<section class="bg-primary py-20">
    <div class="container-custom mx-auto px-4 text-center">
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">{{ __('faq.title') }}</h1>
        <p class="text-white/80 max-w-2xl mx-auto">{{ __('faq.subtitle') }}</p>
    </div>
</section>

<section class="section-padding">
    <div class="container-custom mx-auto px-4">
        <div class="max-w-3xl mx-auto">
            @php
            $locale = app()->getLocale();
            $faqs = [
                ['fr' => ["Quels sont les critères d'admission pour étudier en Chine?", "Les critères varient selon le programme. Généralement, vous aurez besoin d'un diplôme de baccalauréat avec de bonnes notes, un passeport valide, et parfois un certificat HSK pour les programmes en chinois."], 'ar' => ['ما هي معايير القبول للدراسة في الصين؟', 'تختلف المعايير حسب البرنامج. عموماً، ستحتاج إلى شهادة البكالوريا بدرجات جيدة، جواز سفر ساري المفعول، وأحياناً شهادة HSK للبرامج باللغة الصينية.'], 'en' => ["What are the admission requirements to study in China?", "Requirements vary by program. Generally, you'll need a high school diploma with good grades, a valid passport, and sometimes an HSK certificate for Chinese-taught programs."]],
                ['fr' => ["Combien coûte une année d'études en Chine?", "Les frais de scolarité varient de 15,000 à 50,000 CNY par an. Les frais de vie sont d'environ 3,000-5,000 CNY par mois dans les grandes villes."], 'ar' => ['كم تكلف سنة دراسية في الصين؟', 'تتراوح الرسوم الدراسية بين 15,000 و 50,000 يوان صيني سنوياً. تكاليف المعيشة حوالي 3,000-5,000 يوان شهرياً في المدن الكبرى.'], 'en' => ["How much does a year of study in China cost?", "Tuition fees range from 15,000 to 50,000 CNY per year. Living costs are about 3,000-5,000 CNY per month in major cities."]],
                ['fr' => ["Comment obtenir une bourse pour étudier en Chine?", "Il existe plusieurs types de bourses : la bourse CSC (gouvernement chinois), les bourses provinciales, et les bourses universitaires. Study In Asia vous accompagne dans la candidature."], 'ar' => ['كيف يمكنني الحصول على منحة للدراسة في الصين؟', 'هناك عدة أنواع من المنح: منحة CSC (الحكومة الصينية)، المنح الإقليمية، والمنح الجامعية. Study In Asia تساعدك في التقديم.'], 'en' => ["How can I get a scholarship to study in China?", "There are several types of scholarships: CSC scholarship (Chinese government), provincial scholarships, and university scholarships. Study In Asia helps you apply."]],
                ['fr' => ["Combien de temps faut-il pour obtenir un visa étudiant?", "Le processus de visa prend généralement 2-4 semaines après avoir reçu votre lettre d'admission (JW202)."], 'ar' => ['كم من الوقت يستغرق الحصول على تأشيرة طالب؟', 'تستغرق عملية التأشيرة عادة 2-4 أسابيع بعد استلام خطاب القبول (JW202).'], 'en' => ["How long does it take to get a student visa?", "The visa process typically takes 2-4 weeks after receiving your admission letter (JW202)."]],
                ['fr' => ["Les diplômes chinois sont-ils reconnus au Maroc?", "Oui, les diplômes des universités chinoises accréditées sont reconnus internationalement et au Maroc. Nous travaillons uniquement avec des universités figurant sur la liste du Ministère de l'Éducation chinois."], 'ar' => ['هل الشهادات الصينية معترف بها في المغرب؟', 'نعم، الشهادات من الجامعات الصينية المعتمدة معترف بها دولياً وفي المغرب. نحن نعمل فقط مع الجامعات المدرجة في قائمة وزارة التعليم الصينية.'], 'en' => ["Are Chinese degrees recognized in Morocco?", "Yes, degrees from accredited Chinese universities are recognized internationally and in Morocco."]],
                ['fr' => ["Est-il nécessaire de parler chinois pour étudier en Chine?", "Non, de nombreux programmes sont enseignés entièrement en anglais. Pour les programmes en chinois, un niveau HSK 4-5 est généralement requis."], 'ar' => ['هل من الضروري التحدث بالصينية للدراسة في الصين؟', 'لا، العديد من البرامج تُدرَّس بالكامل باللغة الإنجليزية. للبرامج بالصينية، عادة ما يُطلب مستوى HSK 4-5.'], 'en' => ["Is it necessary to speak Chinese to study in China?", "No, many programs are taught entirely in English. For Chinese-taught programs, HSK level 4-5 is usually required."]],
                ['fr' => ["Comment Study In Asia m'accompagne-t-il?", "Nous offrons un accompagnement complet : orientation personnalisée, préparation du dossier, recherche de bourses, assistance visa, réservation de vol, accueil à l'aéroport, et support continu."], 'ar' => ['كيف ترافقني Study In Asia؟', 'نقدم مرافقة شاملة: توجيه شخصي، إعداد الملف، البحث عن المنح، المساعدة في التأشيرة، حجز الرحلة، الاستقبال في المطار، والدعم المستمر.'], 'en' => ["How does Study In Asia support me?", "We offer complete support: personalized guidance, application preparation, scholarship search, visa assistance, flight booking, airport pickup, and ongoing support."]],
                ['fr' => ["Quand dois-je commencer le processus de candidature?", "Nous recommandons de commencer au moins 6-8 mois avant la date de rentrée souhaitée. Pour les bourses CSC, les délais sont généralement en janvier-avril."], 'ar' => ['متى يجب أن أبدأ عملية التقديم؟', 'نوصي بالبدء قبل 6-8 أشهر على الأقل من تاريخ الدخول المطلوب. لمنح CSC، المواعيد عادة في يناير-أبريل.'], 'en' => ["When should I start the application process?", "We recommend starting at least 6-8 months before your desired start date. For CSC scholarships, deadlines are typically January-April."]],
            ];
            @endphp

            <div class="space-y-4" x-data="{ open: null }">
                @foreach($faqs as $i => $faq)
                <div class="card px-6 overflow-hidden">
                    <button @click="open = open === {{ $i }} ? null : {{ $i }}"
                            class="w-full text-start py-5 flex items-center justify-between font-medium gap-4">
                        <span>{{ $faq[$locale][0] }}</span>
                        <svg class="w-5 h-5 text-primary flex-shrink-0 transition-transform" :class="open === {{ $i }} ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div x-show="open === {{ $i }}" x-collapse class="text-muted-foreground pb-5">
                        {{ $faq[$locale][1] }}
                    </div>
                </div>
                @endforeach
            </div>

            <div class="mt-12 text-center rounded-2xl p-8" style="background-color: color-mix(in srgb, var(--color-secondary) 50%, transparent);">
                <h3 class="text-xl font-bold mb-2">{{ __('faq.more') }}</h3>
                <p class="text-muted-foreground mb-6">{{ __('faq.moreDesc') }}</p>
                <a href="{{ route('contact') }}" class="btn-primary">{{ __('nav.contact') }}</a>
            </div>
        </div>
    </div>
</section>

@endsection
