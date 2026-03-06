@extends('frontend.master')

@section('title')
    @if (session()->get('lang') == 'ru')
        События - Борбад
    @elseif(session()->get('lang') == 'en')
        Events - Borbad
    @else
        Чорабиниҳо - Борбад
    @endif
@endsection

@push('styles')
    <style>
        .events-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 28px;
        }

        @media (max-width: 1024px) {
            .events-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 640px) {
            .events-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }
        }

        .event-card {
            background: var(--dark-card);
            border: 1px solid var(--dark-border);
            border-radius: 18px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            transition: transform 0.35s ease, border-color 0.35s ease, box-shadow 0.35s ease;
        }

        .event-card:hover {
            transform: translateY(-6px);
            border-color: var(--gold);
            box-shadow: 0 24px 60px rgba(0, 0, 0, 0.45), 0 0 30px var(--gold-dim);
        }

        .event-card-img {
            position: relative;
            overflow: hidden;
            height: 220px;
            flex-shrink: 0;
        }

        .event-card-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .event-card:hover .event-card-img img {
            transform: scale(1.06);
        }

        .event-card-img-placeholder {
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, var(--dark-surface) 0%, var(--dark-bg) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Бейдж с датой поверх изображения */
        .event-date-badge {
            position: absolute;
            top: 14px;
            left: 14px;
            background: rgba(15, 14, 12, 0.85);
            border: 1px solid var(--gold);
            border-radius: 10px;
            padding: 8px 14px;
            text-align: center;
            backdrop-filter: blur(8px);
            line-height: 1.2;
        }

        .event-date-badge .day {
            display: block;
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--gold);
            font-family: 'Playfair Display', serif;
        }

        .event-date-badge .month {
            display: block;
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: rgba(255, 255, 255, 0.7);
        }

        /* Категория-бейдж */
        .event-cat-badge {
            position: absolute;
            top: 14px;
            right: 14px;
            background: var(--gold);
            color: var(--dark-bg);
            font-size: 0.7rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            border-radius: 6px;
            padding: 4px 10px;
        }

        .event-card-body {
            padding: 22px 22px 20px;
            display: flex;
            flex-direction: column;
            flex: 1;
        }

        .event-card-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.1rem;
            font-weight: 700;
            color: #fff;
            line-height: 1.45;
            margin-bottom: 10px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            transition: color 0.3s;
        }

        .event-card:hover .event-card-title {
            color: var(--gold);
        }

        .event-card-excerpt {
            font-size: 0.88rem;
            color: var(--text-muted, #9ca3af);
            line-height: 1.65;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            flex: 1;
            margin-bottom: 18px;
        }

        .event-card-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            padding-top: 14px;
            border-top: 1px solid var(--dark-border);
        }

        .event-card-time {
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 0.8rem;
            color: var(--text-muted, #9ca3af);
        }

        .event-card-link {
            font-size: 0.82rem;
            font-weight: 600;
            color: var(--gold);
            display: flex;
            align-items: center;
            gap: 4px;
            transition: gap 0.2s;
        }

        .event-card:hover .event-card-link {
            gap: 8px;
        }
    </style>
@endpush

@section('content')
    <!-- Header -->
    <section class="pt-16 pb-12 px-6" style="background: var(--dark-surface); border-bottom: 1px solid var(--dark-border);">
        <div class="max-w-7xl mx-auto text-center">
            <p class="text-sm uppercase tracking-widest mb-3" style="color: var(--gold);">
                @if (session()->get('lang') == 'ru')
                    Борбад
                @elseif(session()->get('lang') == 'en')
                    Borbad
                @else
                    Борбад
                @endif
            </p>
            <h1 class="display-font text-4xl md:text-5xl font-bold text-white mb-4">
                @if (session()->get('lang') == 'ru')
                    События
                @elseif(session()->get('lang') == 'en')
                    Events
                @else
                    Чорабиниҳо
                @endif
            </h1>
            <div class="gold-divider"></div>
            <p class="text-base text-gray-400 mt-4">
                @if (session()->get('lang') == 'ru')
                    Мероприятия и события театра
                @elseif(session()->get('lang') == 'en')
                    Theatre events and activities
                @else
                    Чорабиниҳо ва рӯйдодҳои театр
                @endif
            </p>
        </div>
    </section>

    <!-- Events Grid -->
    <section class="py-16 px-6 section-dark">
        <div class="max-w-7xl mx-auto">
            @if (isset($news) && $news->count())
                <div class="events-grid">
                    @foreach ($news as $item)
                        <a href="{{ route('frontend.events.detail', $item->id) }}" class="event-card">

                            {{-- Изображение --}}
                            <div class="event-card-img">
                                @if (!empty($item->image) && $item->image !== 'no-image.jpg' && $item->image !== '404.jpg')
                                    <img src="{{ asset($item->image) }}" alt="{{ $item->title_ru ?? $item->title_tj }}">
                                @else
                                    <div class="event-card-img-placeholder">
                                        <svg width="56" height="56" fill="none" stroke="currentColor"
                                            stroke-width="1" viewBox="0 0 24 24" style="color: var(--gold); opacity: 0.25;">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                                        </svg>
                                    </div>
                                @endif



                                {{-- Категория --}}
                                @if ($item->category)
                                    <span class="event-cat-badge">
                                        @if (session()->get('lang') == 'ru')
                                            {{ $item->category->name_ru ?? '' }}
                                        @elseif(session()->get('lang') == 'en')
                                            {{ $item->category->name_en ?? '' }}
                                        @else
                                            {{ $item->category->name_tj ?? '' }}
                                        @endif
                                    </span>
                                @endif
                            </div>

                            {{-- Тело карточки --}}
                            <div class="event-card-body">
                                <h3 class="event-card-title">
                                    @if (session()->get('lang') == 'ru')
                                        {{ $item->title_ru }}
                                    @elseif(session()->get('lang') == 'en')
                                        {{ $item->title_en }}
                                    @else
                                        {{ $item->title_tj }}
                                    @endif
                                </h3>

                                <p class="event-card-excerpt">
                                    @if (session()->get('lang') == 'ru')
                                        {{ Str::limit(strip_tags($item->news_details_ru), 120) }}
                                    @elseif(session()->get('lang') == 'en')
                                        {{ Str::limit(strip_tags($item->news_details_en), 120) }}
                                    @else
                                        {{ Str::limit(strip_tags($item->news_details_tj), 120) }}
                                    @endif
                                </p>

                                <div class="event-card-footer">
                                    <span class="event-card-time">
                                        <svg width="14" height="14" fill="currentColor" viewBox="0 0 20 20"
                                            style="color: var(--gold); flex-shrink: 0;">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        {{ \Carbon\Carbon::parse($item->publish_date)->format('H:i') }}
                                        &nbsp;·&nbsp;
                                        {{ \Carbon\Carbon::parse($item->publish_date)->format('d.m.Y') }}
                                    </span>
                                    <span class="event-card-link">
                                        @if (session()->get('lang') == 'ru')
                                            Подробнее
                                        @elseif(session()->get('lang') == 'en')
                                            More
                                        @else
                                            Бештар
                                        @endif
                                        <svg width="14" height="14" fill="none" stroke="currentColor"
                                            stroke-width="2.5" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                        </svg>
                                    </span>
                                </div>
                            </div>

                        </a>
                    @endforeach
                </div>

                {{-- Пагинация --}}
                <div class="mt-12">
                    {{ $news->links() }}
                </div>
            @else
                <div class="text-center py-24">
                    <div class="inline-flex items-center justify-center w-20 h-20 rounded-full mb-6"
                        style="background: var(--dark-surface); border: 1px solid var(--dark-border);">
                        <svg width="36" height="36" fill="none" stroke="currentColor" stroke-width="1.5"
                            viewBox="0 0 24 24" style="color: var(--gold); opacity: 0.5;">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                        </svg>
                    </div>
                    <h3 class="display-font text-2xl font-bold mb-3 text-white">
                        @if (session()->get('lang') == 'ru')
                            Скоро здесь появятся события
                        @elseif(session()->get('lang') == 'en')
                            Events coming soon
                        @else
                            Чорабиниҳо ба зудӣ илова мешаванд
                        @endif
                    </h3>
                    <p class="text-gray-500">
                        @if (session()->get('lang') == 'ru')
                            Следите за обновлениями
                        @elseif(session()->get('lang') == 'en')
                            Stay tuned
                        @else
                            Навсозиҳоро пайгирӣ кунед
                        @endif
                    </p>
                </div>
            @endif
        </div>
    </section>
@endsection
