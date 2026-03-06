@extends('frontend.master')

@section('title')
    @if(session()->get('lang') == 'ru')
        {{ $gallery->title_ru }}
    @elseif(session()->get('lang') == 'en')
        {{ $gallery->title_en }}
    @else
        {{ $gallery->title_tj }}
    @endif
@endsection

@push('styles')
    <style>
        .masonry-grid {
            column-count: 4;
            column-gap: 16px;
        }

        @media (max-width: 1200px) { .masonry-grid { column-count: 3; } }
        @media (max-width: 768px) { .masonry-grid { column-count: 2; } }
        @media (max-width: 500px) { .masonry-grid { column-count: 1; } }

        .masonry-item {
            break-inside: avoid;
            margin-bottom: 16px;
            border-radius: 12px;
            overflow: hidden;
            position: relative;
            cursor: zoom-in;
            transition: transform 0.3s, box-shadow 0.3s;
            border: 1px solid var(--dark-border);
        }

        .masonry-item:hover {
            transform: scale(1.02);
            border-color: var(--gold);
            box-shadow: 0 16px 40px rgba(0, 0, 0, 0.5);
        }

        .masonry-item img {
            width: 100%;
            display: block;
        }

        .gallery-lightbox {
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

        .gallery-lightbox.active {
            opacity: 1;
            pointer-events: all;
        }

        .gallery-lightbox-backdrop {
            position: absolute;
            inset: 0;
            cursor: pointer;
        }

        .gallery-lightbox-content {
            position: relative;
            z-index: 2;
            display: flex;
            align-items: center;
            justify-content: center;
            max-width: 95vw;
            max-height: 95vh;
            padding: 60px 80px;
        }

        .gallery-lightbox-content img {
            max-width: 100%;
            max-height: 85vh;
            object-fit: contain;
            border-radius: 12px;
            pointer-events: none;
        }

        .gallery-lightbox-close {
            position: absolute;
            top: 16px;
            right: 16px;
            width: 48px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            color: #fff;
            font-size: 28px;
            cursor: pointer;
            transition: all 0.2s;
            z-index: 3;
        }

        .gallery-lightbox-close:hover {
            background: var(--gold);
            color: var(--dark-bg);
            border-color: var(--gold);
        }

        .gallery-lightbox-prev,
        .gallery-lightbox-next {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 56px;
            height: 56px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(255, 255, 255, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            color: #fff;
            cursor: pointer;
            transition: all 0.2s;
            z-index: 3;
        }

        .gallery-lightbox-prev { left: 16px; }
        .gallery-lightbox-next { right: 16px; }

        .gallery-lightbox-prev:hover,
        .gallery-lightbox-next:hover {
            background: var(--gold);
            color: var(--dark-bg);
            border-color: var(--gold);
        }

        .gallery-lightbox-counter {
            position: absolute;
            bottom: 16px;
            left: 50%;
            transform: translateX(-50%);
            padding: 8px 20px;
            background: rgba(0, 0, 0, 0.6);
            border-radius: 20px;
            color: #fff;
            font-size: 0.95rem;
            z-index: 3;
        }
    </style>
@endpush

@section('content')
    {{-- Заголовок --}}
    <section class="pt-16 pb-12 px-6" style="background: var(--dark-surface); border-bottom: 1px solid var(--dark-border);">
        <div class="max-w-7xl mx-auto">
            {{-- Кнопка назад --}}
            <a href="{{ route('frontend.galleries') }}" class="inline-flex items-center text-sm mb-6 transition-colors"
                style="color: var(--gold);">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                @trans('back')
            </a>

            <h1 class="display-font text-4xl md:text-5xl font-bold text-white mb-4">
                @if(session()->get('lang') == 'ru') {{ $gallery->title_ru }}
                @elseif(session()->get('lang') == 'en') {{ $gallery->title_en }}
                @else {{ $gallery->title_tj }} @endif
            </h1>
            <div class="gold-divider" style="margin-left: 0;"></div>
        </div>
    </section>

    {{-- Фото --}}
    <section class="py-16 px-6">
        <div class="max-w-7xl mx-auto">
            <div class="masonry-grid" id="galleryGrid">
                @foreach($gallery->images as $index => $item)
                    @php $imgSrc = asset('upload/gallery/' . $item->image); @endphp
                    <div class="masonry-item" data-index="{{ $index }}" data-src="{{ $imgSrc }}" role="button" tabindex="0">
                        <img src="{{ $imgSrc }}" alt="" loading="lazy">
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <script type="application/json" id="galleryImagesJson">
        {!! json_encode($gallery->images->map(fn($i) => asset('upload/gallery/' . $i->image))->values()->all()) !!}
    </script>

    {{-- Лайтбокс с пролистыванием --}}
    <div class="gallery-lightbox" id="galleryLightbox" role="dialog" aria-modal="true" aria-label="Просмотр фото">
        <div class="gallery-lightbox-backdrop" onclick="closeGalleryLightbox()"></div>
        <div class="gallery-lightbox-content" onclick="event.stopPropagation()">
            <button type="button" class="gallery-lightbox-prev" id="galleryLightboxPrev" aria-label="Предыдущее фото" onclick="event.stopPropagation(); prevGalleryImage()">&#10094;</button>
            <img id="galleryLightboxImg" src="" alt="">
            <button type="button" class="gallery-lightbox-next" id="galleryLightboxNext" aria-label="Следующее фото" onclick="event.stopPropagation(); nextGalleryImage()">&#10095;</button>
            <button type="button" class="gallery-lightbox-close" onclick="closeGalleryLightbox()" aria-label="Закрыть">&times;</button>
            <span class="gallery-lightbox-counter" id="galleryLightboxCounter"></span>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        (function() {
            var images = [];
            var jsonEl = document.getElementById('galleryImagesJson');
            if (jsonEl) {
                try {
                    images = JSON.parse(jsonEl.textContent.trim());
                } catch (e) {}
            }
            if (images.length === 0) {
                var items = document.querySelectorAll('#galleryGrid .masonry-item[data-src]');
                for (var i = 0; i < items.length; i++) {
                    images.push(items[i].getAttribute('data-src'));
                }
            }

            var currentIndex = 0;

            function openGalleryLightbox(index) {
                if (images.length === 0) return;
                currentIndex = Math.max(0, Math.min(index, images.length - 1));
                updateLightboxImage();
                document.getElementById('galleryLightbox').classList.add('active');
                document.body.style.overflow = 'hidden';
            }

            function closeGalleryLightbox() {
                document.getElementById('galleryLightbox').classList.remove('active');
                document.body.style.overflow = '';
            }

            function updateLightboxImage() {
                if (images.length === 0) return;
                var img = document.getElementById('galleryLightboxImg');
                var counter = document.getElementById('galleryLightboxCounter');
                var prevBtn = document.getElementById('galleryLightboxPrev');
                var nextBtn = document.getElementById('galleryLightboxNext');
                img.src = images[currentIndex];
                counter.textContent = (currentIndex + 1) + ' / ' + images.length;
                prevBtn.style.visibility = images.length <= 1 ? 'hidden' : 'visible';
                nextBtn.style.visibility = images.length <= 1 ? 'hidden' : 'visible';
            }

            function prevGalleryImage() {
                if (images.length <= 1) return;
                currentIndex = currentIndex <= 0 ? images.length - 1 : currentIndex - 1;
                updateLightboxImage();
            }

            function nextGalleryImage() {
                if (images.length <= 1) return;
                currentIndex = currentIndex >= images.length - 1 ? 0 : currentIndex + 1;
                updateLightboxImage();
            }

            window.closeGalleryLightbox = closeGalleryLightbox;
            window.prevGalleryImage = prevGalleryImage;
            window.nextGalleryImage = nextGalleryImage;

            var grid = document.getElementById('galleryGrid');
            if (grid) {
                grid.addEventListener('click', function(e) {
                    var item = e.target.closest('.masonry-item');
                    if (!item) return;
                    var idx = item.getAttribute('data-index');
                    if (idx !== null) openGalleryLightbox(parseInt(idx, 10));
                });
                grid.addEventListener('keydown', function(e) {
                    if (e.key !== 'Enter') return;
                    var item = e.target.closest('.masonry-item');
                    if (!item) return;
                    e.preventDefault();
                    var idx = item.getAttribute('data-index');
                    if (idx !== null) openGalleryLightbox(parseInt(idx, 10));
                });
            }

            document.addEventListener('keydown', function(e) {
                if (!document.getElementById('galleryLightbox').classList.contains('active')) return;
                if (e.key === 'Escape') closeGalleryLightbox();
                if (e.key === 'ArrowLeft') { e.preventDefault(); prevGalleryImage(); }
                if (e.key === 'ArrowRight') { e.preventDefault(); nextGalleryImage(); }
            });
        })();
    </script>
@endpush
