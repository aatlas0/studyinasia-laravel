@extends('layouts.app')

@section('title', __('budget.title'))

@section('content')

<section class="bg-primary py-24 relative overflow-hidden">
    <div class="container-custom mx-auto px-4 text-center relative z-10">
        <span class="inline-block bg-white/20 text-white font-bold uppercase tracking-wider px-6 py-1.5 rounded-full text-sm mb-6">
            {{ __('budget.investmentTitle') }}
        </span>
        <h1 class="text-4xl md:text-6xl font-bold text-white mb-6 max-w-4xl mx-auto leading-tight">
            {{ __('budget.valueHeroTitle') }}
        </h1>
        <p class="text-white/80 max-w-2xl mx-auto text-xl">{{ __('budget.valueHeroSubtitle') }}</p>
    </div>
</section>

<div class="container-custom mx-auto px-4 py-20 space-y-24">

    {{-- Global Comparison --}}
    <section>
        <div class="text-center mb-10">
            <h2 class="text-3xl font-bold mb-3">{{ __('budget.comparisonTitle') }}</h2>
            <p class="text-muted-foreground">{{ __('budget.comparisonSubtitle') }}</p>
        </div>
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($comparisons as $c)
            <div class="card p-8 hover-lift relative overflow-hidden {{ $c['highlight'] ? 'border-primary ring-2' : '' }}"
                 style="{{ $c['highlight'] ? 'border-color: var(--color-primary); box-shadow: 0 0 0 2px color-mix(in srgb, var(--color-primary) 20%, transparent);' : '' }}">
                @if($c['highlight'])
                <div class="absolute top-0 right-0 bg-primary text-white text-xs font-bold px-3 py-1 rounded-bl-lg uppercase tracking-tight">
                    {{ __('budget.chinaBestValue') }}
                </div>
                @endif
                <div class="text-4xl mb-6">{{ $c['flag'] }}</div>
                <h3 class="text-xl font-bold mb-2">{{ $c['country'] }}</h3>
                <p class="text-sm text-muted-foreground mb-1">{{ __('budget.avgCostPerYear') }}</p>
                <p class="text-2xl font-extrabold {{ $c['highlight'] ? 'text-primary' : 'text-foreground' }}">
                    {{ number_format($c['cost_mad']) }} MAD
                </p>
            </div>
            @endforeach
        </div>
    </section>

    {{-- Scholarship Calculator --}}
    <section class="max-w-6xl mx-auto" x-data="budgetCalc()">
        <div class="card overflow-hidden shadow-2xl border-none">
            <div class="grid lg:grid-cols-2">
                <div class="p-8 md:p-12 border-b lg:border-b-0 lg:border-r border-border">
                    <h2 class="text-2xl font-bold mb-2">{{ __('budget.valueToolTitle') }}</h2>
                    <p class="text-muted-foreground mb-10">{{ __('budget.valueToolDescription') }}</p>

                    <div class="space-y-8">
                        <div>
                            <label class="text-xs font-bold uppercase tracking-wider text-muted-foreground block mb-3">{{ __('budget.program') }}</label>
                            <div class="grid grid-cols-2 gap-3">
                                @foreach(['bachelor' => 'budget.bachelor', 'master' => 'budget.master', 'phd' => 'budget.phd', 'language' => 'budget.language'] as $val => $key)
                                <button @click="level = '{{ $val }}'"
                                        class="px-4 py-3 rounded-xl border-2 transition-all text-sm font-semibold"
                                        :class="level === '{{ $val }}' ? 'border-primary text-primary' : 'border-border hover:border-primary/30'"
                                        style="background-color: color-mix(in srgb, var(--color-primary) 0%, transparent);"
                                        :style="level === '{{ $val }}' ? 'background-color: color-mix(in srgb, var(--color-primary) 5%, transparent);' : ''">
                                    {{ __($key) }}
                                </button>
                                @endforeach
                            </div>
                        </div>
                        <div>
                            <label class="text-xs font-bold uppercase tracking-wider text-muted-foreground block mb-3">{{ __('budget.scholarship') }}</label>
                            <div class="flex gap-3">
                                @foreach(['full' => 'budget.full', 'partial' => 'budget.partial', 'none' => 'budget.none'] as $val => $key)
                                <button @click="scholarship = '{{ $val }}'"
                                        class="flex-1 px-4 py-3 rounded-xl border-2 transition-all text-sm font-semibold"
                                        :class="scholarship === '{{ $val }}' ? 'border-primary text-primary' : 'border-border hover:border-primary/30'"
                                        :style="scholarship === '{{ $val }}' ? 'background-color: color-mix(in srgb, var(--color-primary) 5%, transparent);' : ''">
                                    {{ __($key) }}
                                </button>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-8 md:p-12 bg-primary flex flex-col justify-center">
                    <div class="space-y-10">
                        <div>
                            <p class="text-white/60 text-xs font-bold uppercase tracking-widest mb-3">{{ __('budget.totalBenefits') }}</p>
                            <p class="text-5xl md:text-6xl font-black text-white leading-tight" x-text="'+' + formatMAD(totalBenefits / 1.35)"></p>
                            <p class="text-white/60 text-xs mt-2 italic">{{ __('budget.includes') }}</p>
                        </div>
                        <div class="grid grid-cols-2 gap-8 pt-10 border-t border-white/10">
                            <div>
                                <p class="text-white/60 text-xs font-bold uppercase tracking-wider mb-1">{{ __('budget.realInvestment') }}</p>
                                <p class="text-xl font-bold text-white" x-text="formatMAD(realInvestment / 1.35)"></p>
                            </div>
                            <div>
                                <p class="text-white/60 text-xs font-bold uppercase tracking-wider mb-1">{{ __('budget.savingsVsEurope') }}</p>
                                <p class="text-xl font-bold text-green-300" x-text="savings"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ROI Section --}}
    <section class="rounded-3xl p-12 md:p-20 text-center max-w-5xl mx-auto" style="background-color: color-mix(in srgb, var(--color-secondary) 30%, transparent);">
        <h2 class="text-3xl md:text-4xl font-extrabold mb-6">{{ __('budget.roiTitle') }}</h2>
        <p class="text-xl text-muted-foreground leading-relaxed mb-12 max-w-3xl mx-auto">{{ __('budget.roiDescription') }}</p>
        <div class="grid md:grid-cols-3 gap-8 text-left">
            @foreach([
                ['career', 'M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0M12 12.75h.008v.008H12v-.008Z'],
                ['network', 'M12 21a9.004 9.004 0 0 0 8.716-6.747M12 21a9.004 9.004 0 0 1-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 0 1 7.843 4.582M12 3a8.997 8.997 0 0 0-7.843 4.582m15.686 0A11.953 11.953 0 0 1 12 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0 1 21 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0 1 12 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 0 1 3 12c0-1.605.42-3.113 1.157-4.418'],
                ['mandarin', 'M10.5 21 5.25-11.25L21 21m-9-3h7.5M3 5.621a48.474 48.474 0 0 1 6-.371m0 0c1.12 0 2.233.038 3.334.114M9 5.25V3m3.334 2.364C11.176 10.658 7.69 15.08 3 17.502m9.334-12.138c.896.061 1.785.147 2.666.257m-4.589 8.495a18.023 18.023 0 0 1-3.827-5.802'],
            ] as [$key, $path])
            @php
            $titles = [
                'career' => ['fr' => 'Placement Carrière', 'ar' => 'التوظيف المهني', 'en' => 'Career Placement'],
                'network' => ['fr' => 'Réseau Mondial', 'ar' => 'شبكة عالمية', 'en' => 'Global Network'],
                'mandarin' => ['fr' => 'Mandarin & Compétences', 'ar' => 'الماندرين والمهارات', 'en' => 'Mandarin & Skills'],
            ];
            $descs = [
                'career' => ['fr' => 'Accès direct aux entreprises chinoises au Maroc.', 'ar' => 'وصول مباشر للشركات الصينية في المغرب.', 'en' => 'Direct access to Chinese companies in Morocco.'],
                'network' => ['fr' => 'Connectez-vous avec des leaders mondiaux à Shanghai et Pékin.', 'ar' => 'تواصل مع قادة العالم في شنغهاي وبكين.', 'en' => 'Connect with world leaders in Shanghai and Beijing.'],
                'mandarin' => ['fr' => 'Maîtrisez la langue du futur (Atout #1 pour le CV).', 'ar' => 'أتقن لغة المستقبل (الميزة #1 في السيرة الذاتية).', 'en' => 'Master the language of the future (Asset #1 for the CV).'],
            ];
            $locale = app()->getLocale();
            @endphp
            <div class="space-y-4">
                <div class="w-12 h-12 rounded-xl flex items-center justify-center" style="background-color: color-mix(in srgb, var(--color-primary) 10%, transparent);">
                    <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $path }}"/>
                    </svg>
                </div>
                <h4 class="font-bold text-lg">{{ $titles[$key][$locale] }}</h4>
                <p class="text-sm text-muted-foreground">{{ $descs[$key][$locale] }}</p>
            </div>
            @endforeach
        </div>
    </section>
</div>

@endsection
