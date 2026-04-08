<footer class="bg-card border-t border-border">
    <div class="container-custom mx-auto px-4 py-12 md:py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-12">

            {{-- Brand --}}
            <div class="space-y-4">
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 bg-primary rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/>
                        </svg>
                    </div>
                    <span class="font-bold text-lg">Study<span class="text-primary">InAsia</span></span>
                </div>
                <p class="text-muted-foreground text-sm leading-relaxed">{{ __('footer.description') }}</p>
                <div class="flex gap-3">
                    <a href="https://www.facebook.com/studyinasia.ma/" target="_blank" rel="noopener noreferrer"
                       class="p-2 rounded-lg transition-colors hover:bg-primary hover:text-white"
                       style="background-color: var(--color-secondary);">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M18.77 7.46H14.5v-1.9c0-.9.6-1.1 1-1.1h3V.5h-4.33C10.24.5 9.5 3.44 9.5 5.32v2.15h-3v4h3v12h5v-12h3.85l.42-4z"/>
                        </svg>
                    </a>
                    <a href="https://www.instagram.com/study_in_asia.ma/" target="_blank" rel="noopener noreferrer"
                       class="p-2 rounded-lg transition-colors hover:bg-primary hover:text-white"
                       style="background-color: var(--color-secondary);">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                        </svg>
                    </a>
                </div>
            </div>

            {{-- Quick Links --}}
            <div>
                <h4 class="font-semibold text-foreground mb-4">{{ __('footer.quickLinks') }}</h4>
                <ul class="space-y-2">
                    @foreach([
                        ['home', __('nav.home')],
                        ['services', __('nav.services')],
                        ['programs', __('nav.programs')],
                        ['about', __('nav.about')],
                        ['blog.index', __('nav.blog')],
                        ['contact', __('nav.contact')],
                    ] as [$route, $label])
                        <li>
                            <a href="{{ route($route) }}" class="text-muted-foreground hover:text-primary transition-colors text-sm">
                                {{ $label }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            {{-- Contact Info --}}
            <div>
                <h4 class="font-semibold text-foreground mb-4">{{ __('footer.contactInfo') }}</h4>
                <ul class="space-y-3 text-sm text-muted-foreground">
                    <li class="flex items-start gap-2">
                        <svg class="w-5 h-5 text-primary flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <span>Im 14 Av Ibn Khaldoun V.N<br>Meknès, Maroc</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <svg class="w-5 h-5 text-primary flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                        <div>
                            <a href="tel:+212664635570" class="hover:text-primary transition-colors">+212 6 64 63 55 70</a><br>
                            <a href="tel:+212669566404" class="hover:text-primary transition-colors">+212 6 69 56 64 04</a>
                        </div>
                    </li>
                    <li class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-primary flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        <a href="mailto:studyinasia05@gmail.com" class="hover:text-primary transition-colors">studyinasia05@gmail.com</a>
                    </li>
                </ul>
            </div>

            {{-- Hours --}}
            <div>
                <h4 class="font-semibold text-foreground mb-4">{{ __('contact.hours') }}</h4>
                <ul class="space-y-2 text-sm text-muted-foreground">
                    <li>{{ __('footer.monFri') }}</li>
                    <li>{{ __('footer.saturday') }}</li>
                    <li>{{ __('footer.sunday') }}</li>
                </ul>
            </div>
        </div>

        <div class="mt-12 pt-8 border-t border-border text-center text-sm text-muted-foreground">
            <p>© {{ date('Y') }} Study In Asia. {{ __('footer.rights') }}.</p>
        </div>
    </div>
</footer>
