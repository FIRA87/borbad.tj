@extends('frontend.master')

@section('title', 'Афиша - Борбад')

@push('styles')
    <style>
        .afisha-card {
            background: var(--dark-card);
            border: 1px solid var(--dark-border);
            border-radius: 16px;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .afisha-card:hover {
            transform: translateY(-4px);
            border-color: var(--gold);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.4), 0 0 30px var(--gold-dim);
        }

        .afisha-pagination nav {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 1rem;
            margin-top: 2rem;
        }
        .afisha-pagination nav > .d-flex.d-sm-none {
            display: flex !important;
            width: 100%;
            justify-content: center;
        }
        @media (min-width: 640px) {
            .afisha-pagination nav > .d-flex.d-sm-none {
                display: none !important;
            }
        }
        .afisha-pagination nav > .d-none.d-sm-flex {
            display: none !important;
        }
        @media (min-width: 640px) {
            .afisha-pagination nav > .d-none.d-sm-flex {
                display: flex !important;
                flex: 1;
                width: 100%;
                align-items: center;
                justify-content: space-between;
                flex-wrap: wrap;
                gap: 1rem;
            }
        }
        .afisha-pagination .pagination {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            list-style: none;
            margin: 0;
            padding: 0;
        }
        .afisha-pagination .page-item .page-link {
            display: flex;
            align-items: center;
            justify-content: center;
            min-width: 40px;
            height: 40px;
            padding: 0 0.75rem;
            border-radius: 8px;
            font-size: 0.875rem;
            font-weight: 500;
            text-decoration: none;
            color: var(--text-secondary);
            background: var(--dark-card);
            border: 1px solid var(--dark-border);
            transition: all 0.2s ease;
        }
        .afisha-pagination .page-item .page-link:hover {
            color: var(--gold);
            background: var(--gold-dim);
            border-color: var(--gold);
        }
        .afisha-pagination .page-item.active .page-link {
            color: var(--dark-bg);
            background: var(--gold);
            border-color: var(--gold);
        }
        .afisha-pagination .page-item.disabled .page-link {
            color: var(--text-muted);
            background: var(--dark-surface);
            border-color: var(--dark-border);
            cursor: not-allowed;
            opacity: 0.6;
        }
        .afisha-pagination .small.text-muted {
            font-size: 0.875rem;
            color: var(--text-muted);
        }
        .afisha-pagination .fw-semibold {
            font-weight: 600;
            color: var(--text-secondary);
        }
    </style>
@endpush

@section('content')
    <!-- Header -->
    <section class="pt-16 pb-12 px-6" style="background: var(--dark-surface); border-bottom: 1px solid var(--dark-border);">
        <div class="max-w-7xl mx-auto text-center">
            <p class="text-sm uppercase tracking-widest mb-3" style="color: var(--gold);">Афиша</p>
            <div class="gold-divider"></div>
            <p class="text-lg text-gray-400 mt-4">Предстоящие события и мероприятия</p>
        </div>
    </section>

    <!-- Events List -->
    <section class="py-16 px-6 section-dark">
        <div class="max-w-6xl mx-auto space-y-6">
            @if (isset($news) && $news->count())
                @foreach ($news as $item)
                    <div class="afisha-card">
                        <div class="flex flex-col md:flex-row">
                            {{-- Картинка --}}
                            <a href="{{ route('frontend.afisha.detail', $item->id) }}"
                                class="md:w-48 md:min-h-[180px] block overflow-hidden flex-shrink-0"
                                style="background: var(--dark-surface); border-right: 1px solid var(--dark-border);">
                                @if (!empty($item->image) && $item->image !== 'no-image.jpg' && $item->image !== '404.jpg')
                                    <img src="{{ asset($item->image) }}" alt="{{ $item->title_ru }}"
                                        class="w-full h-full object-cover min-h-[180px]">
                                @else
                                    <div class="w-full h-full min-h-[180px] flex items-center justify-center"
                                        style="background: var(--dark-card);">
                                        <svg class="w-16 h-16 text-gray-600" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm3 2h6v4H7V5zm8 4v2h1v-2h-1zm-2-2v2h1V7h-1zm2 8v-2h-1v2h1zm-1-2v-2h-1v2h1z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                @endif
                            </a>
                            {{-- Контент --}}
                            <div class="flex-1 p-6">
                                <div class="flex items-start justify-between mb-3">
                                    <h3 class="display-font text-2xl font-bold text-white">{{ $item->title_ru }}</h3>
                                    @if ($item->category)
                                        <span class="px-3 py-1 rounded-lg text-xs font-semibold flex-shrink-0 ml-4"
                                            style="background: var(--gold-dim); color: var(--gold);">
                                            {{ $item->category->name_ru ?? '' }}
                                        </span>
                                    @endif
                                </div>
                                <p class="text-gray-400 mb-4 leading-relaxed">
                                    {!! Str::limit(strip_tags($item->news_details_ru), 200) !!}
                                </p>
                                <div class="flex flex-wrap items-center gap-4 text-gray-500 text-sm mb-5">
                                    <div class="flex items-center">
                                        <svg class="w-4 h-4 mr-1.5" style="color: var(--gold);" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        {{ \Carbon\Carbon::parse($item->publish_date)->translatedFormat('d F, l') }}
                                    </div>
                                </div>
                                <a href="{{ route('frontend.afisha.detail', $item->id) }}" class="btn-outline text-sm py-2 px-6">
                                    Подробнее
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="afisha-pagination mt-8">{{ $news->links() }}</div>
            @else
                <div class="text-center py-16">
                    <h3 class="display-font text-2xl font-bold mb-4 text-white">Скоро здесь появятся события</h3>
                    <p class="text-gray-400">Следите за обновлениями</p>
                </div>
            @endif
        </div>
    </section>
@endsection
