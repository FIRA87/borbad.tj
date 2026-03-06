@extends('frontend.master')

@section('title', 'Галерея - Борбад')

@push('styles')
    <style>
        .gallery-item {
            position: relative;
            overflow: hidden;
            cursor: pointer;
            transition: transform 0.4s ease;
            border-radius: 16px;
            border: 1px solid var(--dark-border);
        }

        .gallery-item:hover {
            transform: scale(1.03);
            z-index: 10;
            border-color: var(--gold);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
        }

        .gallery-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(180deg, transparent 0%, rgba(0, 0, 0, 0.8) 100%);
            opacity: 0;
            transition: opacity 0.3s;
            z-index: 1;
        }

        .gallery-item:hover::before {
            opacity: 1;
        }

        .gallery-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 1.5rem;
            transform: translateY(100%);
            transition: transform 0.3s ease;
            z-index: 2;
        }

        .gallery-item:hover .gallery-overlay {
            transform: translateY(0);
        }

        .lightbox {
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

        .lightbox.active {
            opacity: 1;
            pointer-events: all;
        }

        .lightbox img {
            max-width: 90vw;
            max-height: 85vh;
            object-fit: contain;
            border-radius: 1rem;
        }
    </style>
@endpush

@section('content')
    <!-- Header -->
    <section class="pt-16 pb-12 px-6" style="background: var(--dark-surface); border-bottom: 1px solid var(--dark-border);">
        <div class="max-w-7xl mx-auto text-center">
            <p class="text-sm uppercase tracking-widest mb-3" style="color: var(--gold);">Медиатека</p>
            <h1 class="display-font text-5xl md:text-6xl font-bold mb-4 text-white">Галерея</h1>
            <div class="gold-divider"></div>
            <p class="text-lg text-gray-400 mt-4">Моменты из жизни театра</p>
        </div>
    </section>

    <!-- Gallery Grid -->
    <section class="py-16 px-6 section-dark">
        <div class="max-w-7xl mx-auto">
            @if (isset($galleries) && $galleries->count())
                <div class="grid md:grid-cols-3 gap-6">
                    @foreach ($galleries as $gallery)
                        <div class="gallery-item h-80 {{ $loop->iteration % 5 == 4 ? 'md:col-span-2' : '' }}"
                            style="background: var(--dark-card);"
                            @if ($gallery->cover_image) onclick="openLightbox('{{ asset($gallery->cover_image) }}')" @endif>
                            @if ($gallery->cover_image)
                                <img src="{{ asset($gallery->cover_image) }}" alt="{{ $gallery->title_ru }}"
                                    class="w-full h-full object-cover">
                            @endif
                            <div class="gallery-overlay">
                                <h3 class="text-white text-2xl font-bold mb-2">{{ $gallery->title_ru }}</h3>
                                <a href="{{ route('frontend.gallery.detail', $gallery->id) }}"
                                    class="hover:underline inline-flex items-center text-sm" style="color: var(--gold);">
                                    Смотреть все фото
                                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-8">{{ $galleries->links() }}</div>
            @else
                <div class="grid md:grid-cols-3 gap-6">
                    @php
                        $placeholders = [
                            [
                                'title' => 'Главный зал',
                                'desc' => 'Торжественная атмосфера концертного пространства',
                                'span' => '',
                            ],
                            [
                                'title' => 'Спектакль',
                                'desc' => 'Драматическая постановка на большой сцене',
                                'span' => '',
                            ],
                            [
                                'title' => 'Концертная программа',
                                'desc' => 'Выступление симфонического оркестра',
                                'span' => '',
                            ],
                            [
                                'title' => 'Фойе театра',
                                'desc' => 'Элегантное пространство для встреч зрителей',
                                'span' => 'md:col-span-2',
                            ],
                            ['title' => 'За кулисами', 'desc' => 'Подготовка к выступлению', 'span' => ''],
                            ['title' => 'Народный ансамбль', 'desc' => 'Традиционные танцы и музыка', 'span' => ''],
                        ];
                    @endphp
                    @foreach ($placeholders as $ph)
                        <div class="gallery-item h-80 {{ $ph['span'] }}" style="background: var(--dark-card);">
                            <div class="w-full h-full flex items-center justify-center">
                                <svg class="w-16 h-16 text-gray-700" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" />
                                </svg>
                            </div>
                            <div class="gallery-overlay">
                                <h3 class="text-white text-2xl font-bold mb-2">{{ $ph['title'] }}</h3>
                                <p class="text-gray-400">{{ $ph['desc'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>



    {{-- Лайтбокс --}}
    <div class="lightbox" id="lightbox" onclick="closeLightbox()">
        <button class="absolute top-6 right-6 text-white text-4xl hover:scale-110 transition-transform">&times;</button>
        <img id="lightboxImg" src="" alt="Фото">
    </div>
@endsection

@push('scripts')
    <script>
        function openLightbox(src) {
            document.getElementById('lightboxImg').src = src;
            document.getElementById('lightbox').classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeLightbox() {
            document.getElementById('lightbox').classList.remove('active');
            document.body.style.overflow = '';
        }
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') closeLightbox();
        });
    </script>
@endpush
