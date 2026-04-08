@extends('layouts.app')

@section('title', __('about.title'))

@section('content')

<section class="bg-primary py-20">
    <div class="container-custom mx-auto px-4 text-center">
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">{{ __('about.title') }}</h1>
        <p class="text-white/80 max-w-2xl mx-auto">{{ __('about.subtitle') }}</p>
    </div>
</section>

{{-- Mission & Vision --}}
<section class="section-padding">
    <div class="container-custom mx-auto px-4">
        <div class="grid md:grid-cols-2 gap-12">
            <div class="card p-8">
                <div class="w-12 h-12 rounded-xl flex items-center justify-center mb-4" style="background-color: color-mix(in srgb, var(--color-primary) 10%, transparent);">
                    <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                    </svg>
                </div>
                <h2 class="text-2xl font-bold mb-4">{{ __('about.mission') }}</h2>
                <p class="text-muted-foreground leading-relaxed">{{ __('about.missionText') }}</p>
            </div>
            <div class="card p-8">
                <div class="w-12 h-12 rounded-xl flex items-center justify-center mb-4" style="background-color: color-mix(in srgb, var(--color-primary) 10%, transparent);">
                    <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>
                </div>
                <h2 class="text-2xl font-bold mb-4">{{ __('about.vision') }}</h2>
                <p class="text-muted-foreground leading-relaxed">{{ __('about.visionText') }}</p>
            </div>
        </div>
    </div>
</section>

{{-- Values --}}
<section class="section-padding" style="background-color: color-mix(in srgb, var(--color-secondary) 30%, transparent);">
    <div class="container-custom mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-12">{{ __('about.values') }}</h2>
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach(['excellence', 'trust', 'innovation', 'support'] as $value)
            <div class="card p-6 text-center hover-lift flex flex-col items-center">
                <div class="w-14 h-14 rounded-xl flex items-center justify-center mb-4" style="background-color: color-mix(in srgb, var(--color-primary) 10%, transparent);">
                    <svg class="w-7 h-7 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>
                <h3 class="font-semibold mb-2">{{ __("about.{$value}") }}</h3>
                <p class="text-sm text-muted-foreground">{{ __("about.{$value}Desc") }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Team --}}
<section class="section-padding">
    <div class="container-custom mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-4">{{ __('about.team') }}</h2>
        <p class="text-muted-foreground text-center max-w-2xl mx-auto mb-12">{{ __('about.teamDesc') }}</p>
        <div class="grid md:grid-cols-2 gap-8 max-w-2xl mx-auto">
            @foreach([
                ['M. Louridi Omar', 'about.director'],
                ['M. Amanssour Khalil', 'about.advisor'],
            ] as [$name, $role])
            <div class="card p-8 text-center hover-lift">
                <div class="w-20 h-20 rounded-full bg-primary/10 flex items-center justify-center mx-auto mb-4">
                    <svg class="w-10 h-10 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                </div>
                <h3 class="font-bold text-lg">{{ $name }}</h3>
                @php
                $roles = [
                    'about.director' => ['fr' => 'Directeur Général', 'ar' => 'المدير العام', 'en' => 'General Director'],
                    'about.advisor' => ['fr' => "Conseiller d'Orientation", 'ar' => 'مستشار التوجيه', 'en' => 'Orientation Advisor'],
                ];
                $locale = app()->getLocale();
                @endphp
                <p class="text-primary">{{ $roles[$role][$locale] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Location --}}
<section class="section-padding" style="background-color: color-mix(in srgb, var(--color-secondary) 30%, transparent);">
    <div class="container-custom mx-auto px-4">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-3xl font-bold mb-6">{{ __('about.office') }}</h2>
                <p class="text-muted-foreground mb-6">{{ __('about.officeDesc') }}</p>
                <div class="space-y-4">
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-primary flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <span>Im 14 Av Ibn Khaldoun V.N, Meknès, Maroc</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-primary flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span>{{ __('footer.monFri') }} | {{ __('footer.saturday') }}</span>
                    </div>
                </div>
            </div>
            <div>
                <iframe
                    src="https://maps.google.com/maps?q=33.896255725832454,-5.540429065781691&z=15&output=embed"
                    width="100%" height="350"
                    style="border:0; border-radius: 1rem;"
                    allowfullscreen loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    title="Study In Asia Location">
                </iframe>
            </div>
        </div>
    </div>
</section>

@endsection
