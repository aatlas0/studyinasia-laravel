@extends('layouts.app')

@section('title', __('programs.title'))

@section('content')

<section class="bg-primary py-20">
    <div class="container-custom mx-auto px-4 text-center">
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">{{ __('programs.title') }}</h1>
        <p class="text-white/80 max-w-2xl mx-auto">{{ __('programs.subtitle') }}</p>
    </div>
</section>

@php
$locale = app()->getLocale();
$programsJson = collect($programs)->map(fn($p) => [
    'category' => $p['category'],
    'name' => $p["name_{$locale}"],
    'university' => $p['university'],
    'duration' => $p['duration'],
    'price' => $p['price'],
    'language' => $p['language'],
    'scholarship' => $p['scholarship'],
])->toJson();
@endphp

<div class="container-custom mx-auto px-4 -mt-10 relative z-10 pb-20"
     x-data="programsWizard({{ $programsJson }})">

    {{-- Wizard --}}
    <div x-show="step < 4" class="max-w-3xl mx-auto">
        <div class="card p-6 md:p-10 shadow-xl">

            {{-- Progress --}}
            <template x-if="step > 0">
                <div class="mb-8">
                    <div class="flex justify-between items-center mb-2 text-sm font-medium text-muted-foreground">
                        <span>Step <span x-text="step"></span> of 3</span>
                        <span x-text="Math.round((step/3)*100) + '%'"></span>
                    </div>
                    <div class="w-full h-2 rounded-full" style="background-color: var(--color-secondary);">
                        <div class="h-2 rounded-full bg-primary transition-all" :style="`width: ${(step/3)*100}%`"></div>
                    </div>
                </div>
            </template>

            {{-- Step 0: Start --}}
            <div x-show="step === 0" class="text-center py-10">
                <div class="w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6" style="background-color: color-mix(in srgb, var(--color-primary) 10%, transparent);">
                    <svg class="w-10 h-10 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </div>
                <h2 class="text-2xl font-bold mb-4">{{ __('programs.title') }}</h2>
                <p class="text-muted-foreground mb-8 text-lg">{{ __('wizard.letsFindTitle') }}</p>
                <button @click="next()" class="btn-primary px-10 py-4 text-lg rounded-full">
                    {{ __('wizard.start') }} →
                </button>
            </div>

            {{-- Step 1: Category --}}
            <div x-show="step === 1">
                <h2 class="text-2xl font-bold mb-2">{{ __('wizard.step1.question') }}</h2>
                <p class="text-muted-foreground mb-8">{{ __('wizard.step1.desc') }}</p>
                <div class="grid grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach(['all' => 'programs.filter.all', 'engineering' => 'programs.filter.engineering', 'medicine' => 'programs.filter.medicine', 'business' => 'programs.filter.business', 'languages' => 'programs.filter.languages', 'science' => 'programs.filter.science'] as $id => $key)
                    <button @click="selections.category = '{{ $id }}'; next()"
                            class="p-4 rounded-xl border-2 transition-all text-center font-semibold hover:border-primary"
                            :class="selections.category === '{{ $id }}' ? 'border-primary bg-primary/5 text-primary' : 'border-border'">
                        {{ __($key) }}
                    </button>
                    @endforeach
                </div>
                <div class="mt-6">
                    <button @click="prev()" class="text-muted-foreground hover:text-foreground transition-colors text-sm">
                        ← {{ __('wizard.previous') }}
                    </button>
                </div>
            </div>

            {{-- Step 2: Language --}}
            <div x-show="step === 2">
                <h2 class="text-2xl font-bold mb-2">{{ __('wizard.step2.question') }}</h2>
                <p class="text-muted-foreground mb-8">{{ __('wizard.step2.desc') }}</p>
                <div class="grid gap-4">
                    @foreach(['english' => 'wizard.step2.english', 'chinese' => 'wizard.step2.chinese', 'both' => 'wizard.step2.both'] as $val => $key)
                    <button @click="selections.language = '{{ $val }}'; next()"
                            class="p-6 rounded-xl border-2 transition-all flex items-center justify-between font-semibold text-lg hover:border-primary"
                            :class="selections.language === '{{ $val }}' ? 'border-primary bg-primary/5 text-primary' : 'border-border'">
                        <span>{{ __($key) }}</span>
                        <div x-show="selections.language === '{{ $val }}'" class="w-3 h-3 bg-primary rounded-full"></div>
                    </button>
                    @endforeach
                </div>
                <div class="mt-6">
                    <button @click="prev()" class="text-muted-foreground hover:text-foreground transition-colors text-sm">
                        ← {{ __('wizard.previous') }}
                    </button>
                </div>
            </div>

            {{-- Step 3: Scholarship --}}
            <div x-show="step === 3">
                <h2 class="text-2xl font-bold mb-2">{{ __('wizard.step3.question') }}</h2>
                <p class="text-muted-foreground mb-8">{{ __('wizard.step3.desc') }}</p>
                <div class="grid gap-4">
                    @foreach(['yes' => 'wizard.step3.yes', 'no' => 'wizard.step3.no'] as $val => $key)
                    <button @click="selections.scholarship = '{{ $val }}'"
                            class="p-6 rounded-xl border-2 transition-all flex items-center justify-between font-semibold text-lg hover:border-primary"
                            :class="selections.scholarship === '{{ $val }}' ? 'border-primary bg-primary/5 text-primary' : 'border-border'">
                        <span>{{ __($key) }}</span>
                        <div x-show="selections.scholarship === '{{ $val }}'" class="w-3 h-3 bg-primary rounded-full"></div>
                    </button>
                    @endforeach
                </div>
                <div class="mt-8 flex justify-between gap-4">
                    <button @click="prev()" class="btn-outline">← {{ __('wizard.previous') }}</button>
                    <button @click="next()" class="btn-primary">{{ __('wizard.results') }} →</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Results --}}
    <div x-show="step === 4" x-cloak>
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-10 card p-6">
            <div>
                <h2 class="text-2xl font-bold mb-1">
                    <span x-text="filtered.length"></span> {{ __('wizard.found') }}
                </h2>
            </div>
            <button @click="reset()" class="btn-outline flex items-center gap-2">
                ↺ {{ __('wizard.reset') }}
            </button>
        </div>

        <template x-if="filtered.length > 0">
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                <template x-for="(p, i) in filtered" :key="i">
                    <div class="card overflow-hidden hover-lift">
                        <div class="p-6">
                            <div class="flex items-start justify-between mb-4">
                                <h3 class="text-lg font-bold" x-text="p.name"></h3>
                                <template x-if="p.scholarship">
                                    <span class="text-xs px-2.5 py-1 rounded-full font-semibold border flex-shrink-0 ml-2"
                                          style="background-color: color-mix(in srgb, var(--color-accent) 10%, transparent); border-color: color-mix(in srgb, var(--color-accent) 20%, transparent); color: var(--color-foreground);">
                                        {{ __('programs.scholarship') }}
                                    </span>
                                </template>
                            </div>
                            <p class="text-primary font-semibold mb-4" x-text="p.university"></p>
                            <div class="space-y-2 text-sm text-muted-foreground mb-6">
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    <span x-text="p.duration + ' {{ __('stats.years') }}'"></span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129"/></svg>
                                    <span x-text="p.language"></span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    <span x-text="new Intl.NumberFormat('fr-MA').format(Math.round(p.price * 1.35)) + ' MAD {{ __('wizard.perYear') }}'"></span>
                                </div>
                            </div>
                            <a href="{{ route('contact') }}" class="block w-full btn-primary text-center text-sm py-3">
                                {{ __('programs.apply') }}
                            </a>
                        </div>
                    </div>
                </template>
            </div>
        </template>

        <template x-if="filtered.length === 0">
            <div class="text-center py-20 card rounded-2xl border-dashed">
                <p class="text-xl text-muted-foreground mb-6">{{ __('wizard.noResults') }}</p>
                <button @click="reset()" class="btn-outline">↺ {{ __('wizard.reset') }}</button>
            </div>
        </template>
    </div>
</div>

@endsection
