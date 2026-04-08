<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}" class="{{ session('theme', 'light') === 'dark' ? 'dark' : '' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Study In Asia') — Study In Asia</title>
    <meta name="description" content="@yield('meta_description', 'Study In Asia accompagne les étudiants marocains vers l\'excellence académique dans les meilleures universités chinoises.')">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script>
        // Apply saved theme before render to avoid flash
        if (localStorage.getItem('theme') === 'dark' || (!localStorage.getItem('theme') && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        }
    </script>
</head>
<body class="bg-background text-foreground min-h-screen flex flex-col">

    @include('components.navbar')

    <main class="flex-1 pt-16 md:pt-20">
        @yield('content')
    </main>

    @include('components.footer')

    <script>
        // Theme toggle
        function toggleTheme() {
            const html = document.documentElement;
            if (html.classList.contains('dark')) {
                html.classList.remove('dark');
                localStorage.setItem('theme', 'light');
            } else {
                html.classList.add('dark');
                localStorage.setItem('theme', 'dark');
            }
        }

        // Mobile menu
        function toggleMenu() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        }

        // Budget calculator
        function budgetCalc() {
            return {
                level: 'bachelor',
                scholarship: 'full',
                levels: {
                    bachelor: { tuition: 25000, housing: 12000, stipend: 0 },
                    master:   { tuition: 30000, housing: 15000, stipend: 36000 },
                    phd:      { tuition: 40000, housing: 20000, stipend: 42000 },
                    language: { tuition: 18000, housing: 10000, stipend: 0 },
                },
                get mult() {
                    return this.scholarship === 'full' ? 1 : this.scholarship === 'partial' ? 0.5 : 0;
                },
                get totalBenefits() {
                    const l = this.levels[this.level];
                    return Math.round((l.tuition + l.housing + l.stipend) * this.mult);
                },
                get realInvestment() {
                    const l = this.levels[this.level];
                    return Math.round((l.tuition * (1 - this.mult)) + 15000 + 5000);
                },
                get savings() {
                    return this.scholarship === 'full' ? '90%' : this.scholarship === 'partial' ? '70%' : '50%';
                },
                formatMAD(n) {
                    return new Intl.NumberFormat('fr-MA').format(Math.round(n * 1.35)) + ' MAD';
                }
            }
        }

        // Programs wizard
        function programsWizard(programs) {
            return {
                step: 0,
                selections: { category: 'all', language: 'both', scholarship: 'no' },
                programs: programs,
                get filtered() {
                    return this.programs.filter(p => {
                        const cat = this.selections.category === 'all' || p.category === this.selections.category;
                        const lang = this.selections.language === 'both' ||
                            (this.selections.language === 'english' && p.language.includes('English')) ||
                            (this.selections.language === 'chinese' && p.language.includes('Chinese'));
                        const sch = this.selections.scholarship === 'no' || p.scholarship;
                        return cat && lang && sch;
                    });
                },
                next() { this.step = Math.min(this.step + 1, 4); },
                prev() { this.step = Math.max(this.step - 1, 0); },
                reset() { this.step = 0; this.selections = { category: 'all', language: 'both', scholarship: 'no' }; },
            }
        }
    </script>

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>
</html>
