@extends('layouts.app')

@section('title', __('nav.contact'))

@section('content')

<section class="bg-primary py-20">
    <div class="container-custom mx-auto px-4 text-center">
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">{{ __('contact.title') }}</h1>
        <p class="text-white/80 max-w-2xl mx-auto">{{ __('contact.subtitle') }}</p>
    </div>
</section>

<section class="section-padding">
    <div class="container-custom mx-auto px-4">
        <div class="grid lg:grid-cols-2 gap-12">

            {{-- Contact Form --}}
            <div class="card p-8">
                <h2 class="text-2xl font-bold mb-6">{{ __('contact.form.title') }}</h2>

                @if(session('success'))
                <div class="mb-6 p-4 rounded-xl text-sm font-medium"
                     style="background-color: color-mix(in srgb, #22c55e 10%, transparent); color: #16a34a; border: 1px solid color-mix(in srgb, #22c55e 30%, transparent);">
                    {{ session('success') }}
                </div>
                @endif

                @if($errors->any())
                <div class="mb-6 p-4 rounded-xl text-sm font-medium"
                     style="background-color: color-mix(in srgb, var(--color-primary) 10%, transparent); color: var(--color-primary); border: 1px solid color-mix(in srgb, var(--color-primary) 30%, transparent);">
                    <ul class="list-disc list-inside space-y-1">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form action="{{ route('contact.submit') }}" method="POST" class="space-y-5">
                    @csrf
                    <div class="grid sm:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-sm font-medium mb-1.5">{{ __('contact.form.name') }}</label>
                            <input type="text" name="name" value="{{ old('name') }}"
                                   class="input-field @error('name') border-red-400 @enderror"
                                   placeholder="{{ __('contact.form.namePlaceholder') }}">
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1.5">{{ __('contact.form.email') }}</label>
                            <input type="email" name="email" value="{{ old('email') }}"
                                   class="input-field @error('email') border-red-400 @enderror"
                                   placeholder="{{ __('contact.form.emailPlaceholder') }}">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1.5">{{ __('contact.form.phone') }}</label>
                        <input type="tel" name="phone" value="{{ old('phone') }}"
                               class="input-field"
                               placeholder="+212 6XX XXX XXX">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1.5">{{ __('contact.form.level') }}</label>
                        <select name="level" class="input-field">
                            <option value="">{{ __('contact.form.levelPlaceholder') }}</option>
                            <option value="bachelor" {{ old('level') === 'bachelor' ? 'selected' : '' }}>{{ __('budget.bachelor') }}</option>
                            <option value="master" {{ old('level') === 'master' ? 'selected' : '' }}>{{ __('budget.master') }}</option>
                            <option value="phd" {{ old('level') === 'phd' ? 'selected' : '' }}>{{ __('budget.phd') }}</option>
                            <option value="language" {{ old('level') === 'language' ? 'selected' : '' }}>{{ __('budget.language') }}</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1.5">{{ __('contact.form.message') }}</label>
                        <textarea name="message" rows="4"
                                  class="input-field resize-none @error('message') border-red-400 @enderror"
                                  placeholder="{{ __('contact.form.messagePlaceholder') }}">{{ old('message') }}</textarea>
                    </div>
                    <button type="submit" class="btn-primary w-full py-3.5 text-base">
                        {{ __('contact.form.submit') }}
                    </button>
                </form>
            </div>

            {{-- Contact Info --}}
            <div class="space-y-6">
                {{-- WhatsApp CTA --}}
                <div class="card p-6" style="background-color: color-mix(in srgb, #22c55e 8%, transparent); border-color: color-mix(in srgb, #22c55e 30%, transparent);">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 rounded-xl flex items-center justify-center flex-shrink-0" style="background-color: #22c55e;">
                            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.890-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h3 class="font-bold text-lg mb-1">{{ __('contact.whatsapp.title') }}</h3>
                            <p class="text-muted-foreground text-sm mb-3">{{ __('contact.whatsapp.desc') }}</p>
                            <a href="https://wa.me/212661748878" target="_blank" rel="noopener"
                               class="inline-flex items-center gap-2 font-semibold text-sm py-2.5 px-5 rounded-xl text-white"
                               style="background-color: #22c55e;">
                                <span>WhatsApp</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Contact Details --}}
                <div class="card p-6">
                    <h3 class="font-bold text-lg mb-5">{{ __('contact.info.title') }}</h3>
                    <div class="space-y-4">
                        <div class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-primary flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <div>
                                <p class="font-medium text-sm">{{ __('contact.info.address') }}</p>
                                <p class="text-muted-foreground text-sm">Im 14 Av Ibn Khaldoun V.N, Meknès, Maroc</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-primary flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                            <div>
                                <a href="tel:+212661748878" class="font-medium text-sm hover:text-primary transition-colors">+212 661 748 878</a>
                                <span class="text-muted-foreground text-sm"> / </span>
                                <a href="tel:+212535511234" class="font-medium text-sm hover:text-primary transition-colors">+212 535 511 234</a>
                            </div>
                        </div>
                        <div class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-primary flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            <a href="mailto:studyinasia05@gmail.com" class="font-medium text-sm hover:text-primary transition-colors">studyinasia05@gmail.com</a>
                        </div>
                        <div class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-primary flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <p class="text-sm text-muted-foreground">{{ __('footer.monFri') }} | {{ __('footer.saturday') }}</p>
                        </div>
                    </div>
                </div>

                {{-- Map --}}
                <div class="card overflow-hidden">
                    <iframe
                        src="https://maps.google.com/maps?q=33.896255725832454,-5.540429065781691&z=15&output=embed"
                        width="100%" height="250"
                        style="border:0; display:block;"
                        allowfullscreen loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                        title="Study In Asia Location">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
