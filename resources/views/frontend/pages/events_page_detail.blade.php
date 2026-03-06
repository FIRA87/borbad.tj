@extends('frontend.master')

@section('title')
    @if(session()->get('lang') == 'ru')
        {{ $news->title_ru ?? 'Событие' }}
    @elseif(session()->get('lang') == 'en')
        {{ $news->title_en ?? 'Event' }}
    @else
        {{ $news->title_tj ?? 'Чорабинӣ' }}
    @endif
@endsection

@push('styles')
    <style>
        .news-body img {
            max-width: 100%;
            height: auto;
            border-radius: 12px;
            margin: 1.5rem 0;
        }

        .news-body p {
            margin-bottom: 1.2rem;
            line-height: 1.8;
            color: var(--text-secondary);
        }

        .news-body h2,
        .news-body h3 {
            color: var(--text-primary);
            margin-top: 2rem;
            margin-bottom: 1rem;
            font-family: 'Playfair Display', serif;
        }

        .gallery-carousel {
            position: relative;
            overflow: hidden;
            border-radius: 16px;
            border: 1px solid var(--dark-border);
        }

        .gallery-carousel img {
            width: 100%;
            max-height: 500px;
            object-fit: contain;
            background: var(--dark-surface);
            cursor: pointer;
        }

        .carousel-nav-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background: rgba(15, 14, 12, 0.8);
            border: 1px solid var(--dark-border);
            color: var(--gold);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s;
            z-index: 5;
        }

        .carousel-nav-btn:hover {
            background: var(--gold);
            color: var(--dark-bg);
        }

        .carousel-nav-btn.prev { left: 12px; }
        .carousel-nav-btn.next { right: 12px; }

        .gallery-thumbs {
            display: flex;
            gap: 8px;
            overflow-x: auto;
            padding: 8px 0;
        }

        .gallery-thumbs img {
            width: 80px;
            height: 60px;
            object-fit: cover;
            border-radius: 8px;
            cursor: pointer;
            border: 2px solid transparent;
            opacity: 0.6;
            transition: all 0.3s;
        }

        .gallery-thumbs img:hover,
        .gallery-thumbs img.active {
            border-color: var(--gold);
            opacity: 1;
        }

        .related-card {
            background: var(--dark-card);
            border: 1px solid var(--dark-border);
            border-radius: 16px;
            overflow: hidden;
            transition: all 0.4s ease;
        }

        .related-card:hover {
            transform: translateY(-4px);
            border-color: var(--gold);
            box-shadow: 0 16px 40px rgba(0, 0, 0, 0.4);
        }

        .related-card img {
            transition: transform 0.4s ease;
        }

        .related-card:hover img {
            transform: scale(1.05);
        }

        .news-lightbox {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.95);
            z-index: 9998;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s;
        }

        .news-lightbox.active {
            opacity: 1;
            pointer-events: all;
        }

        .news-lightbox img {
            max-width: 90vw;
            max-height: 85vh;
            object-fit: contain;
            border-radius: 12px;
        }
    </style>
@endpush

@section('content')
    <section class="pt-16 pb-12 px-6" style="background: var(--dark-surface); border-bottom: 1px solid var(--dark-border);">
        <div class="max-w-4xl mx-auto">
            <a href="{{ route('frontend.events') }}" class="inline-flex items-center text-sm mb-6 transition-colors"
                style="color: var(--gold);">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                @if(session()->get('lang') == 'ru') Все события
                @elseif(session()->get('lang') == 'en') All events
                @else Ҳамаи чорабиниҳо @endif
            </a>

            <h1 class="display-font text-3xl md:text-4xl font-bold mb-4 text-white leading-tight">
                @if(session()->get('lang') == 'ru') {{ $news->title_ru }}
                @elseif(session()->get('lang') == 'en') {{ $news->title_en }}
                @else {{ $news->title_tj }} @endif
            </h1>

            <div class="flex flex-wrap items-center gap-4 text-sm" style="color: var(--text-muted);">
                <span class="flex items-center">
                    <svg class="w-4 h-4 mr-1.5" style="color: var(--gold);" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                            clip-rule="evenodd" />
                    </svg>
                    {{ \Carbon\Carbon::parse($news->publish_date ?? $news->created_at)->format('d.m.Y') }}
                </span>
                <span class="flex items-center">
                    <svg class="w-4 h-4 mr-1.5" style="color: var(--gold);" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                            clip-rule="evenodd" />
                    </svg>
                    {{ \Carbon\Carbon::parse($news->publish_date ?? $news->created_at)->format('H:i') }}
                </span>
                @if($news->category)
                    <span class="px-3 py-1 rounded-lg text-xs font-semibold"
                        style="background: var(--gold-dim); color: var(--gold);">
                        @if(session()->get('lang') == 'ru') {{ $news->category->name_ru ?? '' }}
                        @elseif(session()->get('lang') == 'en') {{ $news->category->name_en ?? '' }}
                        @else {{ $news->category->name_tj ?? '' }} @endif
                    </span>
                @endif
            </div>
        </div>
    </section>

    <section class="py-16 px-6">
        <div class="max-w-4xl mx-auto">
            @if(!empty($news->image) && $news->image !== '404.jpg')
                <div class="mb-10 rounded-2xl overflow-hidden border" style="border-color: var(--dark-border);">
                    <img src="{{ asset($news->image) }}" class="w-full" style="max-height: 500px; object-fit: cover;"
                        alt="{{ $news->title_ru }}" onclick="openNewsLightbox(this.src)">
                </div>
            @endif

            <div class="news-body text-lg leading-relaxed mb-12">
                @if(session()->get('lang') == 'ru') {!! $news->news_details_ru !!}
                @elseif(session()->get('lang') == 'en') {!! $news->news_details_en !!}
                @else {!! $news->news_details_tj !!} @endif
            </div>

            @if($news->images && $news->images->count() > 0)
                <div class="mb-12">
                    <h3 class="display-font text-2xl font-bold text-white mb-6">
                        @if(session()->get('lang') == 'ru') Фотогалерея
                        @elseif(session()->get('lang') == 'en') Photo Gallery
                        @else Галереяи аксҳо @endif
                    </h3>

                    <div class="gallery-carousel mb-4" id="galleryCarousel">
                        <img id="mainGalleryImg" src="{{ asset($news->images->first()->image) }}" alt="Gallery"
                            onclick="openNewsLightbox(this.src)">
                        @if($news->images->count() > 1)
                            <button class="carousel-nav-btn prev" onclick="prevSlide()">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                </svg>
                            </button>
                            <button class="carousel-nav-btn next" onclick="nextSlide()">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </button>
                        @endif
                    </div>

                    @if($news->images->count() > 1)
                        <div class="gallery-thumbs">
                            @foreach($news->images as $index => $image)
                                <img src="{{ asset($image->image) }}"
                                    class="{{ $index === 0 ? 'active' : '' }}"
                                    onclick="goToSlide({{ $index }})" alt="Thumbnail">
                            @endforeach
                        </div>
                    @endif
                </div>
            @endif
        </div>
    </section>

    @if(isset($related_news) && $related_news->count() > 0)
        <section class="py-16 px-6" style="background: var(--dark-surface); border-top: 1px solid var(--dark-border);">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-12">
                    <p class="text-sm uppercase tracking-widest mb-3" style="color: var(--gold);">
                        @if(session()->get('lang') == 'ru') События
                        @elseif(session()->get('lang') == 'en') Events
                        @else Чорабиниҳо @endif
                    </p>
                    <h2 class="section-title">
                        @if(session()->get('lang') == 'ru') Другие события
                        @elseif(session()->get('lang') == 'en') Other events
                        @else Дигар чорабиниҳо @endif
                    </h2>
                    <div class="gold-divider"></div>
                </div>

                <div class="grid md:grid-cols-3 gap-8">
                    @foreach($related_news->take(3) as $item)
                        <a href="{{ route('frontend.events.detail', $item->id) }}" class="related-card block">
                            <div class="h-48 overflow-hidden">
                                @if(!empty($item->image) && $item->image !== 'no-image.jpg')
                                    <img src="{{ asset($item->image) }}" class="w-full h-full object-cover"
                                        alt="{{ $item->title_ru }}">
                                @else
                                    <div class="w-full h-full flex items-center justify-center"
                                        style="background: var(--dark-surface);">
                                        <svg class="w-12 h-12 text-gray-700" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" />
                                        </svg>
                                    </div>
                                @endif
                            </div>
                            <div class="p-5">
                                <p class="text-xs mb-2" style="color: var(--text-muted);">
                                    {{ \Carbon\Carbon::parse($item->publish_date ?? $item->created_at)->format('d.m.Y') }}
                                    {{ \Carbon\Carbon::parse($item->publish_date ?? $item->created_at)->format('H:i') }}
                                </p>
                                <h4 class="display-font text-lg font-bold text-white mb-2">
                                    @if(session()->get('lang') == 'ru') {{ Str::limit($item->title_ru, 65) }}
                                    @elseif(session()->get('lang') == 'en') {{ Str::limit($item->title_en, 65) }}
                                    @else {{ Str::limit($item->title_tj, 65) }} @endif
                                </h4>
                                <span class="text-sm" style="color: var(--gold);">
                                    @if(session()->get('lang') == 'ru') Подробнее
                                    @elseif(session()->get('lang') == 'en') Read more
                                    @else Бештар @endif →
                                </span>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <div class="news-lightbox" id="newsLightbox" onclick="closeNewsLightbox()">
        <button class="absolute top-6 right-6 text-white text-4xl hover:scale-110 transition-transform">&times;</button>
        <img id="newsLightboxImg" src="" alt="Фото">
    </div>
@endsection

@push('scripts')
    <script>
        const galleryImages = @json($news->images ? $news->images->pluck('image')->map(fn($img) => asset($img)) : []);
        let currentSlide = 0;

        function goToSlide(index) {
            currentSlide = index;
            const mainImg = document.getElementById('mainGalleryImg');
            if (mainImg && galleryImages[index]) {
                mainImg.src = galleryImages[index];
            }
            document.querySelectorAll('.gallery-thumbs img').forEach((thumb, i) => {
                thumb.classList.toggle('active', i === index);
            });
        }

        function nextSlide() {
            goToSlide((currentSlide + 1) % galleryImages.length);
        }

        function prevSlide() {
            goToSlide((currentSlide - 1 + galleryImages.length) % galleryImages.length);
        }

        function openNewsLightbox(src) {
            document.getElementById('newsLightboxImg').src = src;
            document.getElementById('newsLightbox').classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeNewsLightbox() {
            document.getElementById('newsLightbox').classList.remove('active');
            document.body.style.overflow = '';
        }

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') closeNewsLightbox();
        });
    </script>
@endpush
