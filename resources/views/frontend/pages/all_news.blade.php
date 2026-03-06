@extends('frontend.master')

@section('title')
    @trans('main_news')
@endsection

@push('styles')
    <style>
        .filter-bar {
            background: var(--dark-card);
            border: 1px solid var(--dark-border);
            border-radius: 16px;
            padding: 24px;
        }

        .filter-input {
            width: 100%;
            padding: 12px 16px;
            background: var(--dark-bg);
            border: 1px solid var(--dark-border);
            border-radius: 10px;
            color: var(--text-primary);
            font-size: 0.9rem;
            transition: all 0.3s ease;
            outline: none;
        }

        .filter-input:focus {
            border-color: var(--gold);
            box-shadow: 0 0 0 3px var(--gold-dim);
        }

        .filter-input::placeholder {
            color: var(--text-muted);
        }

        .filter-label {
            display: block;
            font-size: 0.8rem;
            font-weight: 600;
            color: var(--text-secondary);
            margin-bottom: 6px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .filter-reset {
            padding: 12px 24px;
            background: transparent;
            border: 1px solid var(--dark-border);
            border-radius: 10px;
            color: var(--text-secondary);
            cursor: pointer;
            transition: all 0.3s;
            font-size: 0.9rem;
        }

        .filter-reset:hover {
            border-color: var(--gold);
            color: var(--gold);
        }

        .news-card {
            background: var(--dark-card);
            border: 1px solid var(--dark-border);
            border-radius: 16px;
            overflow: hidden;
            transition: all 0.4s ease;
        }

        .news-card:hover {
            transform: translateY(-4px);
            border-color: var(--gold);
            box-shadow: 0 16px 40px rgba(0, 0, 0, 0.4);
        }

        .news-card img {
            transition: transform 0.4s ease;
        }

        .news-card:hover img {
            transform: scale(1.05);
        }
    </style>
@endpush

@section('content')
    {{-- Заголовок --}}
    <section class="pt-16 pb-12 px-6" style="background: var(--dark-surface); border-bottom: 1px solid var(--dark-border);">
        <div class="max-w-7xl mx-auto text-center">
            <p class="text-sm uppercase tracking-widest mb-3" style="color: var(--gold);">@trans('main_news')</p>
            <h1 class="display-font text-5xl md:text-6xl font-bold mb-4 text-white">@trans('main_news')</h1>
            <div class="gold-divider"></div>
        </div>
    </section>

    {{-- Фильтры и новости --}}
    <section class="py-16 px-6">
        <div class="max-w-7xl mx-auto">
            {{-- Панель фильтрации --}}
            <div class="filter-bar mb-10">
                <div class="grid md:grid-cols-4 gap-4 items-end">
                    <div class="md:col-span-2">
                        <label class="filter-label">@trans('search_news')</label>
                        <input type="text" id="searchInput" class="filter-input"
                            placeholder="@if (session()->get('lang') == 'ru') Введите текст...@elseif(session()->get('lang') == 'en')Enter text...@else Матнро ворид кунед... @endif">
                    </div>
                    <div>
                        <label class="filter-label">
                            @if (session()->get('lang') == 'ru')
                                Дата от
                            @elseif(session()->get('lang') == 'en')
                                Date from
                            @else
                                Аз сана
                            @endif
                        </label>
                        <input type="date" id="dateFrom" class="filter-input">
                    </div>
                    <div class="flex gap-3">
                        <div class="flex-1">
                            <label class="filter-label">
                                @if (session()->get('lang') == 'ru')
                                    Дата до
                                @elseif(session()->get('lang') == 'en')
                                    Date to
                                @else
                                    То сана
                                @endif
                            </label>
                            <input type="date" id="dateTo" class="filter-input">
                        </div>
                        <div class="flex items-end">
                            <button type="button" class="filter-reset" id="resetFilters">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Список новостей --}}
            <div id="newsGrid">
                @include('frontend.pages.partials.news_list', ['news' => $news])
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            const dateFrom = document.getElementById('dateFrom');
            const dateTo = document.getElementById('dateTo');
            const resetButton = document.getElementById('resetFilters');
            const newsGrid = document.getElementById('newsGrid');

            function fetchNews(page = 1) {
                const params = new URLSearchParams({
                    search: searchInput.value,
                    date_from: dateFrom.value,
                    date_to: dateTo.value,
                    page: page
                });

                fetch(`/news?${params.toString()}`, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(res => res.text())
                    .then(html => {
                        newsGrid.innerHTML = html;
                        newsGrid.querySelectorAll('.pagination a').forEach(link => {
                            link.addEventListener('click', function(e) {
                                e.preventDefault();
                                const url = new URL(this.href);
                                fetchNews(url.searchParams.get('page') || 1);
                            });
                        });
                    });
            }

            searchInput.addEventListener('input', () => setTimeout(fetchNews, 300));
            dateFrom.addEventListener('change', fetchNews);
            dateTo.addEventListener('change', fetchNews);
            resetButton.addEventListener('click', function() {
                searchInput.value = '';
                dateFrom.value = '';
                dateTo.value = '';
                fetchNews();
            });
        });
    </script>
@endpush
