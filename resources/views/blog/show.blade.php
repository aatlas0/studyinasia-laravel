@extends('layouts.app')

@section('title', $post->meta_title ?: $post->title)
@section('meta_description', $post->meta_description ?: $post->excerpt)

@section('content')

{{-- Hero --}}
<div class="bg-primary py-16">
    <div class="container-custom mx-auto px-4">
        <div class="max-w-3xl mx-auto text-center">
            @if($post->category)
            <a href="{{ route('blog', ['category' => $post->category->slug]) }}"
               class="inline-block bg-white/20 text-white text-xs font-bold uppercase tracking-wider px-4 py-1.5 rounded-full mb-5 hover:bg-white/30 transition-colors">
                {{ $post->category->name }}
            </a>
            @endif
            <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-white leading-tight mb-6">{{ $post->title }}</h1>
            <div class="flex items-center justify-center gap-4 text-white/70 text-sm">
                <time datetime="{{ $post->published_at->toDateString() }}">
                    {{ $post->published_at->translatedFormat('d M Y') }}
                </time>
                <span>·</span>
                <span>{{ $post->reading_time }} {{ __('blog.minRead') }}</span>
            </div>
        </div>
    </div>
</div>

{{-- Featured Image --}}
@if($post->featured_image)
<div class="container-custom mx-auto px-4 -mt-8 relative z-10 mb-0">
    <div class="max-w-4xl mx-auto">
        <img src="{{ $post->featured_image_url }}"
             alt="{{ $post->title }}"
             class="w-full h-72 md:h-96 object-cover rounded-2xl shadow-xl">
    </div>
</div>
@endif

{{-- Article Content --}}
<article class="section-padding">
    <div class="container-custom mx-auto px-4">
        <div class="max-w-3xl mx-auto">

            @if($post->excerpt)
            <p class="text-xl text-muted-foreground leading-relaxed mb-10 pb-10 border-b border-border font-medium">
                {{ $post->excerpt }}
            </p>
            @endif

            <div class="prose prose-lg max-w-none
                        prose-headings:font-bold prose-headings:text-foreground
                        prose-p:text-muted-foreground prose-p:leading-relaxed
                        prose-a:text-primary prose-a:no-underline hover:prose-a:underline
                        prose-strong:text-foreground
                        prose-li:text-muted-foreground
                        prose-blockquote:border-primary prose-blockquote:text-muted-foreground">
                {!! $post->content !!}
            </div>

            {{-- Share --}}
            <div class="mt-12 pt-8 border-t border-border flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                <div>
                    <p class="text-sm font-semibold text-muted-foreground mb-2">{{ __('blog.share') }}</p>
                    <div class="flex items-center gap-3">
                        <a href="https://wa.me/?text={{ urlencode($post->title . ' - ' . request()->url()) }}"
                           target="_blank" rel="noopener"
                           class="w-9 h-9 rounded-lg flex items-center justify-center text-white transition-opacity hover:opacity-80"
                           style="background-color: #22c55e;" aria-label="Share on WhatsApp">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.890-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                            </svg>
                        </a>
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}"
                           target="_blank" rel="noopener"
                           class="w-9 h-9 rounded-lg flex items-center justify-center text-white transition-opacity hover:opacity-80"
                           style="background-color: #1877f2;" aria-label="Share on Facebook">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                        </a>
                    </div>
                </div>
                <a href="{{ route('blog') }}" class="btn-outline text-sm py-2.5 px-5">
                    ← {{ __('blog.backToList') }}
                </a>
            </div>
        </div>
    </div>
</article>

{{-- Related Posts --}}
@if($relatedPosts->count() > 0)
<section class="section-padding" style="background-color: color-mix(in srgb, var(--color-secondary) 30%, transparent);">
    <div class="container-custom mx-auto px-4">
        <h2 class="text-2xl font-bold mb-8">{{ __('blog.related') }}</h2>
        <div class="grid md:grid-cols-3 gap-6">
            @foreach($relatedPosts as $related)
            <article class="card overflow-hidden hover-lift flex flex-col">
                <a href="{{ route('blog.show', $related->slug) }}" class="block overflow-hidden">
                    @if($related->featured_image)
                    <img src="{{ $related->featured_image_url }}"
                         alt="{{ $related->title }}"
                         class="w-full h-44 object-cover transition-transform duration-500 hover:scale-105"
                         loading="lazy">
                    @else
                    <div class="w-full h-44 flex items-center justify-center"
                         style="background-color: color-mix(in srgb, var(--color-primary) 8%, transparent);">
                        <svg class="w-12 h-12 text-primary/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                    </div>
                    @endif
                </a>
                <div class="p-5 flex flex-col flex-1">
                    <p class="text-xs text-muted-foreground mb-2">{{ $related->published_at->translatedFormat('d M Y') }}</p>
                    <h3 class="font-bold mb-3 leading-snug flex-1">
                        <a href="{{ route('blog.show', $related->slug) }}" class="hover:text-primary transition-colors">
                            {{ $related->title }}
                        </a>
                    </h3>
                    <a href="{{ route('blog.show', $related->slug) }}"
                       class="inline-flex items-center gap-1 text-sm font-semibold text-primary mt-auto">
                        {{ __('blog.readMore') }} →
                    </a>
                </div>
            </article>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- CTA --}}
<section class="section-padding">
    <div class="container-custom mx-auto px-4">
        <div class="max-w-2xl mx-auto text-center rounded-2xl p-10"
             style="background-color: color-mix(in srgb, var(--color-primary) 5%, transparent); border: 1px solid color-mix(in srgb, var(--color-primary) 15%, transparent);">
            <h3 class="text-2xl font-bold mb-3">{{ __('cta.title') }}</h3>
            <p class="text-muted-foreground mb-6">{{ __('cta.desc') }}</p>
            <a href="{{ route('contact') }}" class="btn-primary">{{ __('nav.contact') }}</a>
        </div>
    </div>
</section>

@endsection
