@extends('frontend.master')

@section('title', 'Борбад - Театрально-концертный зал')

@push('styles')
    <style>
        /* ===== Hero Banner ===== */
        .hero-banner {
            display: grid;
            grid-template-columns: 1fr 420px;
            min-height: 560px;
            background: var(--dark-bg);
            overflow: hidden;
        }

        @media (max-width: 1024px) {
            .hero-banner {
                grid-template-columns: 1fr;
                min-height: auto;
            }
        }

        /* Слайдер часть */
        .hero-slider-wrapper {
            position: relative;
            overflow: hidden;
            min-height: 560px;
        }

        @media (max-width: 1024px) {
            .hero-slider-wrapper {
                min-height: 400px;
            }
        }

        .hero-slide {
            position: absolute;
            inset: 0;
            opacity: 0;
            transition: opacity 1s ease-in-out;
            background-size: cover;
            background-position: center;
        }

        .hero-slide.active {
            opacity: 1;
        }

        .hero-slide::after {
            content: '';
            position: absolute;
            inset: 0;
            background:
                linear-gradient(to top, rgba(15, 14, 12, 0.8) 0%, rgba(15, 14, 12, 0.1) 40%, rgba(15, 14, 12, 0.3) 100%),
                linear-gradient(to right, rgba(15, 14, 12, 0.3) 0%, transparent 50%);
        }

        .hero-slide-caption {
            position: absolute;
            inset: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 10;
            padding: 40px 60px;
            text-align: center;
        }

        .hero-slide-caption h2 {
            font-family: 'Roboto', sans-serif;
            font-size: clamp(1.75rem, 4vw, 2.75rem);
            font-weight: 700;
            color: #fff;
            text-shadow: 0 2px 20px rgba(0, 0, 0, 0.6), 0 0 40px rgba(0, 0, 0, 0.4);
            line-height: 1.25;
            max-width: 720px;
            margin: 0;
        }

        .hero-slide-caption .hero-slide-link {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 24px;
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--dark-bg);
            background: var(--gold);
            border-radius: 8px;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .hero-slide-caption .hero-slide-link:hover {
            background: var(--gold-light, #d4af37);
            color: var(--dark-bg);
            transform: translateY(-2px);
        }

        @media (max-width: 768px) {
            .hero-slide-caption {
                padding: 24px 20px;
            }
        }

        /* Навигация слайдера */
        .slider-arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            z-index: 20;
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(0, 0, 0, 0.5);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            color: white;
            cursor: pointer;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
        }

        .slider-arrow:hover {
            background: var(--gold);
            color: var(--dark-bg);
            border-color: var(--gold);
        }

        .slider-arrow.prev {
            left: 20px;
        }

        .slider-arrow.next {
            right: 20px;
        }

        .slider-dots {
            position: absolute;
            bottom: 24px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 10px;
            z-index: 20;
        }

        .slider-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            border: 2px solid rgba(255, 255, 255, 0.5);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .slider-dot.active {
            background: var(--gold);
            border-color: var(--gold);
            transform: scale(1.3);
        }

        /* Боковой блок (цитата президента) */
        .hero-side-block {
            background: var(--dark-surface);
            display: flex;
            flex-direction: column;
            border-left: 1px solid var(--dark-border);
            position: relative;
            overflow: hidden;
        }

        @media (max-width: 1024px) {
            .hero-side-block {
                border-left: none;
                border-top: 1px solid var(--dark-border);
            }
        }

        .hero-side-block::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 3px;
            height: 100%;
            background: linear-gradient(180deg, var(--gold), transparent);
            z-index: 2;
        }

        @media (max-width: 1024px) {
            .hero-side-block::before {
                width: 100%;
                height: 2px;
                background: linear-gradient(90deg, transparent, var(--gold), transparent);
            }
        }

        /* Фото президента */
        .prezident-photo {
            width: 100%;
            overflow: hidden;
            flex-shrink: 0;
            padding: 16px 16px 0;
        }

        .prezident-photo img {
            width: 100%;
            height: 380px;
            object-fit: cover;
            object-position: top center;
            display: block;
            border-radius: 10px;
            border: 2px solid var(--gold);
        }

        .prezident-photo-placeholder {
            width: 100%;
            height: 220px;
            border-radius: 10px;
            background: linear-gradient(135deg, var(--dark-card), var(--dark-bg));
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Карточка цитаты */
        .quote-card {
            background: var(--dark-card);
            border: 1px solid var(--dark-border);
            border-radius: 12px;
            padding: 24px 20px 18px;
            margin: 14px 16px;
            position: relative;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .quote-card::before {
            content: '\201C';
            position: absolute;
            top: -8px;
            left: 16px;
            font-size: 3.5rem;
            color: var(--gold);
            opacity: 0.2;
            font-family: 'Roboto', sans-serif;
            line-height: 1;
        }

        .quote-card p {
            font-size: 0.92rem;
            line-height: 1.7;
        }

        @media (max-width: 1024px) {
            .quote-card {
                margin: 12px 16px;
            }

            .prezident-photo img,
            .prezident-photo-placeholder {
                height: 200px;
            }
        }

        /* ===== Секции ===== */
        .section-dark {
            background: var(--dark-bg);
            position: relative;
        }

        .section-surface {
            background: var(--dark-surface);
            position: relative;
        }

        /* Тонкий переход между секциями */
        .section-surface+.section-dark::before,
        .section-dark+.section-surface::before {
            content: '';
            position: absolute;
            top: 0;
            left: 10%;
            right: 10%;
            height: 1px;
            background: linear-gradient(90deg, transparent, var(--dark-border), transparent);
        }

        /* ===== Video Modal ===== */
        .video-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.9);
            z-index: 9998;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s;
        }

        .video-overlay.active {
            opacity: 1;
            pointer-events: all;
        }

        /* ===== Contact Form ===== */
        .contact-form-wrapper {
            background: linear-gradient(180deg, var(--dark-card) 0%, rgba(24, 22, 20, 0.95) 100%);
            border: 1px solid var(--dark-border);
            border-radius: 20px;
            padding: 48px;
            position: relative;
            overflow: hidden;
            box-shadow: 0 24px 64px rgba(0, 0, 0, 0.3);
        }

        .contact-form-wrapper::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, transparent, var(--gold), transparent);
        }

        @media (max-width: 768px) {
            .contact-form-wrapper {
                padding: 28px 20px;
            }
        }

        .index-timeline-line {
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 2px;
            background: linear-gradient(180deg, var(--gold), var(--dark-border));
        }

        .index-timeline-dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: var(--gold);
            border: 2px solid var(--dark-bg);
            position: absolute;
            left: -24px;
            top: 22px;
            transform: translateX(-50%);
            z-index: 2;
        }

        .index-timeline-card {
            background: var(--dark-card);
            border: 1px solid var(--dark-border);
            border-radius: 12px;
            padding: 16px 20px;
            margin-bottom: 12px;
        }

        .index-timeline-card:hover {
            border-color: var(--gold);
        }

        /* ===== Полезные ссылки ===== */
        .partner-links-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        @media (max-width: 1024px) {
            .partner-links-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 480px) {
            .partner-links-grid {
                grid-template-columns: 1fr 1fr;
                gap: 12px;
            }
        }

        .partner-link-card {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 14px;
            padding: 28px 16px;
            background: var(--dark-card);
            border: 1px solid var(--dark-border);
            border-radius: 14px;
            text-decoration: none;
            transition: border-color 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease;
        }

        .partner-link-card:hover {
            border-color: var(--gold);
            transform: translateY(-4px);
            box-shadow: 0 12px 32px rgba(0, 0, 0, 0.3);
        }

        .partner-link-logo {
            width: 80px;
            height: 80px;
            object-fit: contain;
            filter: brightness(0.9);
            transition: filter 0.3s ease;
        }

        .partner-link-card:hover .partner-link-logo {
            filter: brightness(1);
        }

        .partner-link-logo-placeholder {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--dark-surface), var(--dark-bg));
            border: 2px solid var(--dark-border);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .partner-link-name {
            font-size: 0.88rem;
            font-weight: 600;
            color: var(--text-muted);
            text-align: center;
            line-height: 1.4;
            transition: color 0.3s ease;
        }

        .partner-link-card:hover .partner-link-name {
            color: var(--gold);
        }
    </style>
@endpush

@section('content')
    <!-- ===== Hero Banner: Слайдер + Боковой блок ===== -->
    <section class="hero-banner">
        {{-- Левая часть — Слайдер --}}
        <div class="hero-slider-wrapper" id="heroSlider">
            @if (isset($sliders) && $sliders->count())
                @foreach ($sliders as $i => $slide)
                    <div class="hero-slide {{ $i === 0 ? 'active' : '' }}"
                        style="background-image: url('{{ asset($slide->image) }}');">
                        <div class="hero-slide-caption">
                            <div>
                                <h2>
                                    <a href="{{ url('news/details/' . $slide->id) }}" class="hero-slide-link">

                                        @if (session()->get('lang') == 'ru')
                                            {{ $slide->title_ru }}
                                        @elseif(session()->get('lang') == 'en')
                                            {{ $slide->title_en }}
                                        @else
                                            {{ $slide->title_tj }}
                                        @endif

                                    </a>
                                </h2>


                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="hero-slide active"
                    style="background: linear-gradient(135deg, var(--dark-surface), var(--dark-bg));">
                    <div class="absolute inset-0 flex items-center justify-center z-10">
                        <div class="text-center">
                            <h2 class="display-font text-5xl font-bold text-white mb-4">
                                @if (session()->get('lang') == 'ru')
                                    {{ $news->title_ru }}
                                @elseif(session()->get('lang') == 'en')
                                    {{ $news->title_en }}
                                @else
                                    {{ $news->title_tj }}
                                @endif
                            </h2>

                        </div>
                    </div>
                </div>
            @endif

            {{-- Стрелки навигации --}}
            @if (isset($sliders) && $sliders->count() > 1)
                <button class="slider-arrow prev" id="sliderPrev" aria-label="Предыдущий слайд">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                <button class="slider-arrow next" id="sliderNext" aria-label="Следующий слайд">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>

                {{-- Точки --}}
                <div class="slider-dots" id="sliderDots">
                    @foreach ($sliders as $i => $slide)
                        <button class="slider-dot {{ $i === 0 ? 'active' : '' }}"
                            data-index="{{ $i }}"></button>
                    @endforeach
                </div>
            @endif
        </div>

        {{-- Правая часть — Блок с цитатой президента --}}
        <div class="hero-side-block">
            @if (is_countable($prezident) && count($prezident) > 0)
                @foreach ($prezident as $item)
                    {{-- Фото президента --}}
                    <div class="prezident-photo">
                        @if ($item->image)
                            <img src="{{ asset($item->image) }}" alt="portrait">
                        @else
                            <div class="prezident-photo-placeholder">
                                <svg class="w-16 h-16 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        @endif
                    </div>

                    {{-- Цитата --}}
                    <div class="quote-card">
                        <a href="{{ url('prezident/detail/' . $item->id) }}" class="block">
                            <p class="body-font leading-relaxed mb-4"
                                style="color: var(--text-secondary); text-indent: 1.2em;">
                                @if (session()->get('lang') == 'ru')
                                    {!! Str::limit(strip_tags($item->text_ru), 200) !!}
                                @elseif(session()->get('lang') == 'en')
                                    {!! Str::limit(strip_tags($item->text_en), 200) !!}
                                @else
                                    {!! Str::limit(strip_tags($item->text_tj), 200) !!}
                                @endif
                            </p>
                        </a>
                        <div class="flex items-center gap-2">

                            <a href="{{ url('prezident/detail/' . $item->id) }}" class="text-sm hover:underline transition"
                                style="color: var(--gold); list-style: none;">
                                @trans('read_more') →
                            </a>
                        </div>
                    </div>
                @endforeach
            @endif

            {{-- Быстрые ссылки --}}
            <div class="flex flex-col gap-2 px-4 pb-4">
                <a href="https://prezident.tj" class="btn-primary text-center text-xs py-2.5 tracking-wide">
                    prezident.tj
                </a>

            </div>
        </div>
    </section>

    <!-- ===== Ближайшие события ===== -->
    <section class="py-20 px-6 section-surface">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-14">
                <p class="text-sm uppercase tracking-widest mb-3" style="color: var(--gold);"> @trans('upcoming_events')</p>

                <div class="gold-divider"></div>
                <p class="section-subtitle"> @trans('outstanding_performances_title')</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @if (isset($news) && $news->count())
                    @foreach ($news->take(3) as $item)
                        <div class="event-card group">
                            <div class="h-60 relative overflow-hidden">
                                @if ($item->image)
                                    <img src="{{ asset($item->image) }}" alt="{{ $item->title_ru }}"
                                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                                @else
                                    <div class="w-full h-full flex items-center justify-center"
                                        style="background: linear-gradient(135deg, var(--dark-surface), var(--dark-bg));">
                                        <svg class="w-16 h-16 text-gray-600" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" />
                                        </svg>
                                    </div>
                                @endif

                                {{-- Дата-бейдж --}}
                                <div class="absolute top-4 left-4 px-4 py-2 rounded-lg text-sm font-semibold"
                                    style="background: rgba(15,14,12,0.85); backdrop-filter: blur(10px); color: var(--gold); border: 1px solid var(--dark-border);">
                                    {{ \Carbon\Carbon::parse($item->publish_date)->format('Y-m-d') }}
                                </div>
                            </div>

                            <div class="p-6">
                                <h3 class="display-font text-xl font-bold text-white mb-3 line-clamp-2">

                                    @if (session()->get('lang') == 'ru')
                                        {{ $item->title_ru }}
                                    @elseif(session()->get('lang') == 'en')
                                        {{ $item->title_en }}
                                    @else
                                        {{ $item->title_tj }}
                                    @endif

                                </h3>

                                <a href="{{ route('news_details', $item->id) }}"
                                    class="inline-flex items-center gap-2 text-sm font-semibold transition-colors"
                                    style="color: var(--gold);">
                                    @trans('read_more')
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    @endforeach
                @else
                    @for ($i = 0; $i < 3; $i++)
                        <div class="event-card">
                            <div class="h-60 flex items-center justify-center"
                                style="background: linear-gradient(135deg, var(--dark-surface), var(--dark-bg));">
                                <svg class="w-16 h-16 text-gray-700" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" />
                                </svg>
                            </div>
                            <div class="p-6">
                                <h3 class="display-font text-xl font-bold text-white mb-3">Событие скоро появится</h3>
                                <p class="text-gray-500 text-sm">Следите за обновлениями нашей афиши</p>
                            </div>
                        </div>
                    @endfor
                @endif
            </div>

            <div class="text-center mt-12">
                <a href="{{ route('frontend.afisha') }}" class="btn-primary text-lg">
                    @trans('view_all_events')
                </a>
            </div>
        </div>
    </section>

    <!-- ===== Видео секция ===== -->
    <section class="py-20 px-6 section-dark">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-14">
                <p class="text-sm uppercase tracking-widest mb-3" style="color: var(--gold);">Медиа</p>
                <h2 class="section-title">@trans('main_video') </h2>
                <div class="gold-divider"></div>
                <p class="section-subtitle">@trans('Immerse_yourself_title')</p>
            </div>

            <div class="grid md:grid-cols-2 gap-8">
                @if (isset($videos) && $videos->count())
                    @foreach ($videos->take(4) as $video)
                        <div class="rounded-2xl overflow-hidden h-72 relative group cursor-pointer border transition-all duration-300 hover:border-opacity-100"
                            style="background: var(--dark-card); border-color: var(--dark-border);"
                            onclick="openVideoModal('{{ $video->video_url }}')">
                            @if ($video->video_image)
                                <img src="{{ asset($video->video_image) }}" alt="{{ $video->title_ru }}"
                                    class="w-full h-full object-cover opacity-60 group-hover:opacity-40 transition-all duration-500 group-hover:scale-105">
                            @endif
                            <div class="absolute inset-0 flex flex-col items-center justify-center z-10">
                                <div class="w-16 h-16 rounded-full flex items-center justify-center transition-all duration-300 group-hover:scale-110"
                                    style="background: var(--gold);">
                                    <svg class="w-7 h-7 ml-1" style="color: var(--dark-bg);" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path
                                            d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z" />
                                    </svg>
                                </div>
                                <p class="text-white text-lg font-semibold mt-4 px-6 text-center">{{ $video->title_ru }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                @else
                    @for ($i = 0; $i < 2; $i++)
                        <div class="rounded-2xl overflow-hidden h-72 relative flex items-center justify-center border"
                            style="background: var(--dark-card); border-color: var(--dark-border);">
                            <div class="w-16 h-16 rounded-full flex items-center justify-center"
                                style="background: rgba(201,168,76,0.2);">
                                <svg class="w-7 h-7 ml-1" style="color: var(--gold);" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path
                                        d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z" />
                                </svg>
                            </div>
                        </div>
                    @endfor
                @endif
            </div>
        </div>
    </section>

    {{-- Видео модальное окно --}}
    <div class="video-overlay" id="videoOverlay" onclick="closeVideoModal(event)">
        <div class="relative w-full max-w-4xl mx-4">
            <button onclick="closeVideoModal()"
                class="absolute -top-12 right-0 text-white text-3xl hover:text-gold transition">&times;</button>
            <div class="aspect-video bg-black rounded-xl overflow-hidden">
                <iframe id="videoIframe" class="w-full h-full" src="" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
            </div>
        </div>
    </div>

    <!-- ===== О театре / О нас — объединённый блок ===== -->
    @php
        $aboutLocale = session('lang') == 'ru' ? 'ru' : (session('lang') == 'en' ? 'en' : 'tj');
        $aboutTitle =
            isset($about) && $about
                ? $about->{'title_' . $aboutLocale} ?? ($about->title_ru ?? 'О театре')
                : 'О театре';
        $aboutHistories = isset($about) && $about ? $about->histories ?? [] : [];
        $aboutBlocks = isset($about) && $about ? $about->blocks ?? [] : [];
        $aboutStats = isset($about) && $about ? $about->stats ?? [] : [];
        $aboutBlockKeys = \App\Models\About::blockKeys();
        $aboutCardBlockKeys = [
            'architectural_features',
            'architecture_structure',
            'cultural_heritage',
            'technical_equipment',
            'reconstruction',
        ];
        $aboutByLocale = function ($item, $key) use ($aboutLocale) {
            return $item[$key . '_' . $aboutLocale] ?? ($item[$key . '_ru'] ?? '');
        };
        $firstTextBlockKey = 'construction_history';
        $firstBlock = $aboutBlocks[$firstTextBlockKey] ?? [];
        $firstBlockText = $firstBlock['text_' . $aboutLocale] ?? ($firstBlock['text_ru'] ?? '');
    @endphp
    <section class="py-20 px-6 section-surface">
        <div class="max-w-6xl mx-auto">
            <div class="grid lg:grid-cols-2 gap-16 items-start">
                <div>
                    <p class="text-sm uppercase tracking-widest mb-3" style="color: var(--gold);">@trans('about_our_history')</p>
                    <h2 class="section-title" style="text-align: left;">{{ $aboutTitle }}</h2>
                    <div class="gold-divider" style="margin-left: 0;"></div>
                    @if ($firstBlockText)
                        <div class="prose prose-invert max-w-none text-gray-400 whitespace-pre-line mt-6">
                            {{ $firstBlockText }}</div>
                    @endif
                </div>

                <div class="relative">
                    <div class="rounded-2xl overflow-hidden border sticky top-24"
                        style="border-color: var(--dark-border);">
                        @if (isset($about) && $about && $about->image)
                            <img src="{{ asset($about->image) }}" alt="{{ $aboutTitle }}"
                                class="w-full h-96 object-cover">
                        @else
                            <div class="w-full h-96"
                                style="background: linear-gradient(135deg, var(--dark-card), var(--dark-bg));">
                                <div class="w-full h-full flex items-center justify-center">
                                    <svg class="w-24 h-24 text-gray-700" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" />
                                    </svg>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="absolute -bottom-4 -right-4 w-full h-full rounded-2xl border-2 -z-10"
                        style="border-color: var(--gold); opacity: 0.3;"></div>
                </div>
            </div>
        </div>
    </section>

    @foreach ($aboutBlockKeys as $key => $defaultTitle)
        @if (in_array($key, $aboutCardBlockKeys) || $key === $firstTextBlockKey)
            @continue
        @endif
        @php
            $b = $aboutBlocks[$key] ?? [];
            $blockTitle = $b['title_' . $aboutLocale] ?? ($b['title_ru'] ?? $defaultTitle);
            $blockText = $b['text_' . $aboutLocale] ?? ($b['text_ru'] ?? '');
        @endphp
        @if ($blockTitle || $blockText)
            <section class="py-20 px-6 section-dark">
                <div class="max-w-6xl mx-auto">
                    <h2 class="section-title mb-6">{{ $blockTitle }}</h2>
                    <div class="gold-divider mb-8"></div>
                    @if ($blockText)
                        <div class="prose prose-invert max-w-none text-gray-400 whitespace-pre-line">{{ $blockText }}
                        </div>
                    @else
                        <p class="text-gray-500">@trans('about_block_fill_admin') <a href="{{ route('admin.about.index') }}"
                                class="text-gold hover:underline">@trans('about_admin_link')</a>@trans('about_in_admin_panel')</p>
                    @endif
                </div>
            </section>
        @endif
    @endforeach

    @if (count($aboutStats) > 0)
        <section class="py-20 px-6 section-surface"
            style="border-top: 1px solid var(--dark-border); border-bottom: 1px solid var(--dark-border);">
            <div class="max-w-7xl mx-auto">
                <div class="grid md:grid-cols-4 gap-8 text-center">
                    @foreach ($aboutStats as $stat)
                        @if (empty($stat['num']) && empty($stat['label_ru']) && empty($stat['label_tj']) && empty($stat['label_en']))
                            @continue
                        @endif
                        <div>
                            <div class="display-font text-5xl font-bold mb-3" style="color: var(--gold);">
                                {{ $stat['num'] ?? '' }}</div>
                            <p class="text-gray-400">{{ $aboutByLocale($stat, 'label') }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- ===== Полезные ссылки ===== -->
    @if ($links && $links->count())
        <section class="py-16 px-6 section-surface">
            <div class="max-w-6xl mx-auto">


                <div class="partner-links-grid">
                    @foreach ($links as $link)
                        <a href="{{ $link->url ?: '#' }}" target="{{ $link->url ? '_blank' : '_self' }}"
                            rel="noopener noreferrer" class="partner-link-card">

                            @if ($link->img)
                                <img src="{{ asset($link->img) }}" alt="{{ $link->title_ru ?? $link->title_tj }}"
                                    class="partner-link-logo">
                            @else
                                <div class="partner-link-logo-placeholder">
                                    <svg width="36" height="36" fill="none" stroke="currentColor"
                                        stroke-width="1.5" viewBox="0 0 24 24" style="color: var(--gold); opacity: 0.6;">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M13.19 8.688a4.5 4.5 0 011.242 7.244l-4.5 4.5a4.5 4.5 0 01-6.364-6.364l1.757-1.757m13.35-.622l1.757-1.757a4.5 4.5 0 00-6.364-6.364l-4.5 4.5a4.5 4.5 0 001.242 7.244" />
                                    </svg>
                                </div>
                            @endif

                            <span class="partner-link-name">
                                @if (session()->get('lang') == 'ru')
                                    {{ $link->title_ru ?? $link->title_tj }}
                                @elseif(session()->get('lang') == 'en')
                                    {{ $link->title_en ?? $link->title_tj }}
                                @else
                                    {{ $link->title_tj }}
                                @endif
                            </span>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- ===== Обратная связь ===== -->
    <section class="py-20 px-6 section-dark" id="contact-form">
        <div class="max-w-3xl mx-auto">
            <div class="text-center mb-12">
                <p class="text-sm uppercase tracking-widest mb-3" style="color: var(--gold);">@trans('citizen_requests')</p>

                <div class="gold-divider"></div>
                <p class="section-subtitle">
                    @trans('write_to _us')
                </p>
            </div>

            <div class="contact-form-wrapper">
                <form id="contactForm" action="{{ route('contact_form_submit') }}" method="POST">
                    @csrf
                    <div class="grid md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-400 mb-2">your_name_title</label>
                            <input type="text" name="name" required class="form-input" placeholder="Введите имя">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-400 mb-2">Email</label>
                            <input type="email" name="email" required class="form-input"
                                placeholder="your@email.com">
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-400 mb-2">@trans('phone_title')</label>
                            <input type="tel" name="phone" class="form-input" placeholder="+992 XX XXX XXXX">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-400 mb-2">@trans('subject_title')</label>
                            <select name="subject" class="form-input">
                                <option value="tickets">@trans('tickets_title_purchasing')</option>
                                <option value="cooperation">@trans('cooperation_title')</option>
                                <option value="rent">@trans('rent_title')</option>
                                <option value="general">@trans('general_questions_title')</option>
                                <option value="other">@trans('other_title')</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-400 mb-2">@trans('message_title')</label>
                        <textarea name="message" required class="form-input" rows="5"
                            placeholder="Опишите ваш вопрос или предложение..."></textarea>
                    </div>

                    <button type="submit" class="btn-primary w-full py-4 text-lg font-semibold">
                        @trans('send_button')
                    </button>
                </form>
            </div>
        </div>
    </section>






@endsection

@push('scripts')
    <script>
        // ===== Слайдер Hero =====
        document.addEventListener('DOMContentLoaded', function() {
            const slider = document.getElementById('heroSlider');
            if (!slider) return;

            const slides = slider.querySelectorAll('.hero-slide');
            const dots = document.querySelectorAll('.slider-dot');
            const prevBtn = document.getElementById('sliderPrev');
            const nextBtn = document.getElementById('sliderNext');

            if (slides.length <= 1) return;

            let currentSlide = 0;
            let interval;

            function goToSlide(index) {
                slides[currentSlide].classList.remove('active');
                if (dots[currentSlide]) dots[currentSlide].classList.remove('active');

                currentSlide = ((index % slides.length) + slides.length) % slides.length;

                slides[currentSlide].classList.add('active');
                if (dots[currentSlide]) dots[currentSlide].classList.add('active');
            }

            function nextSlide() {
                goToSlide(currentSlide + 1);
            }

            function prevSlide() {
                goToSlide(currentSlide - 1);
            }

            // Стрелки
            if (prevBtn) prevBtn.addEventListener('click', () => {
                clearInterval(interval);
                prevSlide();
                interval = setInterval(nextSlide, 5000);
            });
            if (nextBtn) nextBtn.addEventListener('click', () => {
                clearInterval(interval);
                nextSlide();
                interval = setInterval(nextSlide, 5000);
            });

            // Точки
            dots.forEach(dot => {
                dot.addEventListener('click', () => {
                    clearInterval(interval);
                    goToSlide(parseInt(dot.dataset.index));
                    interval = setInterval(nextSlide, 5000);
                });
            });

            interval = setInterval(nextSlide, 5000);
        });

        // ===== Видео модальное окно =====
        function openVideoModal(url) {
            const overlay = document.getElementById('videoOverlay');
            const iframe = document.getElementById('videoIframe');

            let embedUrl = url;
            if (url.includes('youtube.com/watch')) {
                const videoId = new URL(url).searchParams.get('v');
                embedUrl = 'https://www.youtube.com/embed/' + videoId + '?autoplay=1';
            } else if (url.includes('youtu.be/')) {
                const videoId = url.split('youtu.be/')[1].split('?')[0];
                embedUrl = 'https://www.youtube.com/embed/' + videoId + '?autoplay=1';
            }

            iframe.src = embedUrl;
            overlay.classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeVideoModal(event) {
            if (event && event.target !== event.currentTarget && !event.target.closest('button')) return;
            const overlay = document.getElementById('videoOverlay');
            const iframe = document.getElementById('videoIframe');
            iframe.src = '';
            overlay.classList.remove('active');
            document.body.style.overflow = '';
        }

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') closeVideoModal();
        });
    </script>
@endpush
