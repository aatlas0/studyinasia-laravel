<nav class="fixed top-0 left-0 right-0 z-50 bg-background/80 backdrop-blur-lg border-b border-border" style="background-color: color-mix(in srgb, var(--color-background) 80%, transparent);">
    <div class="container-custom mx-auto px-4">
        <div class="flex items-center justify-between h-16 md:h-20">

            {{-- Logo --}}
            <a href="{{ route('home') }}" class="flex items-center gap-2 flex-shrink-0">
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 bg-primary rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/>
                        </svg>
                    </div>
                    <span class="font-bold text-lg text-foreground">Study<span class="text-primary">InAsia</span></span>
                </div>
            </a>

            {{-- Desktop Navigation --}}
            <div class="hidden lg:flex items-center gap-6">
                @php
                    $navLinks = [
                        ['route' => 'home', 'label' => __('nav.home')],
                        ['route' => 'services', 'label' => __('nav.services')],
                        ['route' => 'programs', 'label' => __('nav.programs')],
                        ['route' => 'budget', 'label' => __('nav.budget')],
                        ['route' => 'about', 'label' => __('nav.about')],
                        ['route' => 'faq', 'label' => __('nav.faq')],
                        ['route' => 'blog.index', 'label' => __('nav.blog')],
                        ['route' => 'contact', 'label' => __('nav.contact')],
                    ];
                @endphp
                @foreach($navLinks as $link)
                    <a href="{{ route($link['route']) }}"
                       class="nav-link text-sm font-medium {{ request()->routeIs($link['route']) ? 'text-primary' : '' }}">
                        {{ $link['label'] }}
                    </a>
                @endforeach
            </div>

            {{-- Actions --}}
            <div class="flex items-center gap-2">

                {{-- Language Selector --}}
                <div class="flex items-center gap-1 rounded-lg p-1" style="background-color: var(--color-secondary);">
                    @foreach(['fr' => 'FR', 'ar' => 'عربي', 'en' => 'EN'] as $code => $label)
                        <a href="{{ route('lang.switch', $code) }}"
                           class="px-2 py-1 text-xs font-medium rounded transition-colors {{ app()->getLocale() === $code ? 'bg-primary text-white' : 'text-muted-foreground hover:text-foreground' }}">
                            {{ $label }}
                        </a>
                    @endforeach
                </div>

                {{-- Theme Toggle --}}
                <button onclick="toggleTheme()"
                        class="p-2 rounded-lg transition-colors hover:bg-secondary"
                        style="background-color: var(--color-secondary);"
                        aria-label="Toggle theme">
                    <svg class="w-5 h-5 dark:hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/>
                    </svg>
                    <svg class="w-5 h-5 hidden dark:block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                </button>

                {{-- Mobile Menu Button --}}
                <button onclick="toggleMenu()"
                        class="lg:hidden p-2 rounded-lg transition-colors"
                        style="background-color: var(--color-secondary);"
                        aria-label="Toggle menu">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </div>

        {{-- Mobile Navigation --}}
        <div id="mobile-menu" class="hidden lg:hidden py-4 border-t border-border">
            <div class="flex flex-col gap-1">
                @foreach($navLinks as $link)
                    <a href="{{ route($link['route']) }}"
                       onclick="toggleMenu()"
                       class="px-4 py-2 rounded-lg font-medium transition-colors {{ request()->routeIs($link['route']) ? 'bg-primary text-white' : 'text-foreground hover:bg-secondary' }}">
                        {{ $link['label'] }}
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</nav>
