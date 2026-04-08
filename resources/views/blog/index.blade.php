@extends('layouts.app')

@section('title', __('blog.title'))
@section('meta_description', __('blog.subtitle'))

@section('content')

<section class="bg-primary py-20">
    <div class="container-custom mx-auto px-4 text-center">
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">{{ __('blog.title') }}</h1>
        <p class="text-white/80 max-w-2xl mx-auto">{{ __('blog.subtitle') }}</p>
    </div>
</section>

<section class="section-padding">
    <div class="container-custom mx-auto px-4">

        {{-- Category Filter --}}
        @if($categories->count() > 0)
        <div class="flex flex-wrap gap-3 mb-10 justify-center">
            <a href="{{ route('blog') }}"
               class="px-5 py-2 rounded-full text-sm font-semibold border-2 transition-all
                      {{ !request('category') ? 'border-primary text-primary' : 'border-border hover:border-primary/30 text-muted-foreground' }}"
               style="{{ !request('category') ? 'background-color: color-mix(in srgb, var(--color-primary) 5%, transparent);' : '' }}">
                {{ __('programs.filter.all') }}
            </a>
            @foreach($categories as $cat)
            <a href="{{ route('blog', ['category' => $cat->slug]) }}"
               class="px-5 py-2 rounded-full text-sm font-semibold border-2 transition-all
                      {{ request('category') === $cat->slug ? 'border-primary text-primary' : 'border-border hover:border-primary/30 text-muted-foreground' }}"
               style="{{ request('category') === $cat->slug ? 'background-color: color-mix(in srgb, var(--color-primary) 5%, transparent);' : '' }}">
                {{ $cat->name }}
            </a>
            @endforeach
        </div>
        @endif

        {{-- Posts Grid --}}
        @if($posts->count() > 0)
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($posts as $post)
            <article class="card overflow-hidden hover-lift flex flex-col">
                <a href="{{ route('blog.show', $post->slug) }}" class="block overflow-hidden">
                    @if($post->featured_image)
                    <img src="{{ $post->featured_image_url }}"
                         alt="{{ $post->title }}"
                         class="w-full h-52 object-cover transition-transform duration-500 hover:scale-105"
                         loading="lazy">
                    @else
                    <div class="w-full h-52 flex items-center justify-center"
                         style="background-color: color-mix(in srgb, var(--color-primary) 8%, transparent);">
                        <svg class="w-16 h-16 text-primary/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                    </div>
                    @endif
                </a>
                <div class="p-6 flex flex-col flex-1">
                    <div class="flex items-center gap-3 mb-3 text-xs text-muted-foreground">
                        @if($post->category)
                        <span class="font-semibold text-primary">{{ $post->category->name }}</span>
                        <span>·</span>
                        @endif
                        <time datetime="{{ $post->published_at->toDateString() }}">
                            {{ $post->published_at->translatedFormat('d M Y') }}
                        </time>
                        <span>·</span>
                        <span>{{ $post->reading_time }} {{ __('blog.minRead') }}</span>
                    </div>
                    <h2 class="text-lg font-bold mb-3 leading-snug flex-1">
                        <a href="{{ route('blog.show', $post->slug) }}" class="hover:text-primary transition-colors">
                            {{ $post->title }}
                        </a>
                    </h2>
                    @if($post->excerpt)
                    <p class="text-muted-foreground text-sm leading-relaxed mb-4 line-clamp-3">{{ $post->excerpt }}</p>
                    @endif
                    <a href="{{ route('blog.show', $post->slug) }}"
                       class="inline-flex items-center gap-1.5 text-sm font-semibold text-primary hover:gap-2.5 transition-all mt-auto">
                        {{ __('blog.readMore') }}
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
            </article>
            @endforeach
        </div>

        {{-- Pagination --}}
        @if($posts->hasPages())
        <div class="mt-12 flex justify-center">
            {{ $posts->links() }}
        </div>
        @endif

        @else
        <div class="text-center py-20">
            <div class="w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6"
                 style="background-color: color-mix(in srgb, var(--color-primary) 8%, transparent);">
                <svg class="w-10 h-10 text-primary/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                </svg>
            </div>
            <p class="text-xl text-muted-foreground">{{ __('blog.noPosts') }}</p>
        </div>
        @endif

    </div>
</section>

@endsection
