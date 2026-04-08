@extends('layouts.app')

@section('title', __('nav.home'))

@section('content')

{{-- Hero --}}
<section class="relative min-h-screen flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ asset('images/hero-china.jpg') }}')">
        <div class="absolute inset-0" style="background: linear-gradient(to right, color-mix(in srgb, var(--color-background) 95%, transparent), color-mix(in srgb, var(--color-background) 80%, transparent), color-mix(in srgb, var(--color-background) 40%, transparent))"></div>
    </div>
    <div class="relative container-custom mx-auto px-4 py-20">
        <div class="max-w-3xl">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 animate-fade-up">
                {{ __('hero.title') }} <span class="text-primary">{{ __('hero.titleHighlight') }}</span>
            </h1>
            <p class="text-lg md:text-xl text-muted-foreground mb-8 animate-fade-up animation-delay-200">
                {{ __('hero.subtitle') }}
            </p>
            <div class="flex flex-col sm:flex-row gap-4 animate-fade-up animation-delay-300">
                <a href="{{ route('contact') }}" class="btn-primary text-center">{{ __('hero.cta') }}</a>
                <a href="{{ route('services') }}" class="btn-outline text-center">{{ __('hero.ctaSecondary') }}</a>
            </div>
        </div>
    </div>
    <div class="absolute bottom-8 left-1/2 animate-float">
        <div class="w-6 h-10 border-2 border-primary rounded-full flex items-start justify-center p-1">
            <div class="w-1.5 h-3 bg-primary rounded-full animate-bounce"></div>
        </div>
    </div>
</section>

{{-- Stats --}}
<section class="py-16 bg-primary">
    <div class="container-custom mx-auto px-4">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
            @foreach([
                ['3740', '+', __('stats.students')],
                ['100', '%', __('stats.success')],
                ['80', '+', __('stats.universities')],
                ['8', '+', __('stats.years')],
            ] as [$val, $suffix, $label])
            <div>
                <div class="text-3xl md:text-5xl font-bold text-white mb-2">{{ $val }}{{ $suffix }}</div>
                <div class="text-white/80 text-sm md:text-base">{{ $label }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Services Preview --}}
<section class="section-padding" style="background-color: color-mix(in srgb, var(--color-secondary) 30%, transparent);">
    <div class="container-custom mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">{{ __('services.title') }}</h2>
            <p class="text-muted-foreground max-w-2xl mx-auto">{{ __('services.subtitle') }}</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach([
                ['orientation', 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2'],
                ['dossier', 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z'],
                ['visa', 'M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z'],
                ['support', 'M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z'],
            ] as [$key, $path])
            <div class="card p-6 hover-lift group cursor-default">
                <div class="w-14 h-14 rounded-lg flex items-center justify-center text-primary mb-4 group-hover:bg-primary group-hover:text-white transition-colors" style="background-color: color-mix(in srgb, var(--color-primary) 10%, transparent);">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $path }}"/>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold mb-2">{{ __("services.{$key}.title") }}</h3>
                <p class="text-sm text-muted-foreground">{{ __("services.{$key}.desc") }}</p>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-10">
            <a href="{{ route('services') }}" class="btn-primary">{{ __('hero.ctaSecondary') }}</a>
        </div>
    </div>
</section>

{{-- Why Choose Us --}}
<section class="section-padding">
    <div class="container-custom mx-auto px-4">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-3xl md:text-4xl font-bold mb-6">{{ __('cta.360') }}</h2>
                <div class="space-y-6">
                    @foreach([['why.admin', 'why.adminDesc'], ['why.visa', 'why.visaDesc'], ['why.housing', 'why.housingDesc']] as [$title, $desc])
                    <div class="flex gap-4">
                        <div class="w-12 h-12 rounded-lg flex items-center justify-center flex-shrink-0" style="background-color: color-mix(in srgb, var(--color-primary) 10%, transparent);">
                            <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-lg mb-1">{{ __($title) }}</h3>
                            <p class="text-muted-foreground">{{ __($desc) }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="relative">
                <img src="{{ asset('images/students-study.jpg') }}" alt="Students studying" class="rounded-2xl shadow-2xl w-full">
                <div class="absolute -bottom-6 -left-6 bg-primary text-white p-6 rounded-xl shadow-xl">
                    <div class="text-3xl font-bold">100%</div>
                    <div class="text-sm text-white/80">{{ __('stats.success') }}</div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Latest Blog Posts --}}
@if($latestPosts->count() > 0)
<section class="section-padding" style="background-color: color-mix(in srgb, var(--color-secondary) 30%, transparent);">
    <div class="container-custom mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">{{ __('blog.title') }}</h2>
            <p class="text-muted-foreground">{{ __('blog.subtitle') }}</p>
        </div>
        <div class="grid md:grid-cols-3 gap-6">
            @foreach($latestPosts as $post)
            <article class="card overflow-hidden hover-lift">
                @if($post->featured_image)
                <img src="{{ $post->featured_image_url }}" alt="{{ $post->title }}" class="w-full h-48 object-cover">
                @else
                <div class="w-full h-48 bg-primary/10 flex items-center justify-center">
                    <svg class="w-12 h-12 text-primary/40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                </div>
                @endif
                <div class="p-6">
                    <h3 class="font-bold text-lg mb-2 line-clamp-2">{{ $post->title }}</h3>
                    @if($post->excerpt)
                    <p class="text-muted-foreground text-sm mb-4 line-clamp-3">{{ $post->excerpt }}</p>
                    @endif
                    <a href="{{ route('blog.show', $post->slug) }}" class="text-primary font-semibold text-sm hover:underline">
                        {{ __('blog.readMore') }} →
                    </a>
                </div>
            </article>
            @endforeach
        </div>
        <div class="text-center mt-10">
            <a href="{{ route('blog.index') }}" class="btn-outline">{{ __('nav.blog') }}</a>
        </div>
    </div>
</section>
@endif

{{-- CTA --}}
<section class="relative py-20 bg-cover bg-center" style="background-image: url('{{ asset('images/china-city.jpg') }}')">
    <div class="absolute inset-0 bg-primary/90"></div>
    <div class="relative container-custom mx-auto px-4 text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">{{ __('cta.ready') }}</h2>
        <p class="text-white/80 max-w-2xl mx-auto mb-8">{{ __('cta.desc') }}</p>
        <a href="{{ route('contact') }}" class="inline-block bg-white text-foreground hover:bg-white/90 px-8 py-4 rounded-lg font-semibold transition-all duration-300 hover:scale-105">
            {{ __('hero.cta') }}
        </a>
    </div>
</section>

@endsection
