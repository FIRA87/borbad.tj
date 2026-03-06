@extends('frontend.master')

@section('title')
    @if (session()->get('lang') == 'ru')
        Вакансии
    @elseif(session()->get('lang') == 'en')
        Vacancies
    @else
        Ҷойҳои кории холӣ
    @endif
@endsection

@section('content')
    {{-- Заголовок --}}
    <section class="pt-16 pb-12 px-6" style="background: var(--dark-surface); border-bottom: 1px solid var(--dark-border);">
        <div class="max-w-7xl mx-auto text-center">
            <p class="text-sm uppercase tracking-widest mb-3" style="color: var(--gold);">
                @if (session()->get('lang') == 'ru')
                    Карьера
                @elseif(session()->get('lang') == 'en')
                    Career
                @else
                    Касб
                @endif
            </p>
            <h1 class="display-font text-5xl md:text-6xl font-bold mb-4 text-white">
                @if (session()->get('lang') == 'ru')
                    Вакансии
                @elseif(session()->get('lang') == 'en')
                    Vacancies
                @else
                    Ҷойҳои кории холӣ
                @endif
            </h1>
            <div class="gold-divider"></div>
            <p class="text-lg text-gray-400 mt-4">
                @if (session()->get('lang') == 'ru')
                    Присоединяйтесь к нашей команде
                @elseif(session()->get('lang') == 'en')
                    Join our team
                @else
                    Ба дастаи мо ҳамроҳ шавед
                @endif
            </p>
        </div>
    </section>

    {{-- Уведомление об успехе --}}
    @if (session('success'))
        <div class="max-w-7xl mx-auto px-6 mt-6">
            <div class="p-4 rounded-xl text-sm"
                style="background: rgba(34, 197, 94, 0.1); border: 1px solid rgba(34, 197, 94, 0.3); color: #4ade80;">
                {{ session('success') }}
            </div>
        </div>
    @endif

    <section class="py-16 px-6 section-dark">
        <div class="max-w-7xl mx-auto">
            @if ($jobs->isEmpty())
                <div class="text-center py-20">
                    <svg class="w-20 h-20 mx-auto mb-6 text-gray-700" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm-4 9.43A20.963 20.963 0 0010 15c2.088 0 4.106-.306 6-1.57V16a2 2 0 01-2 2H6a2 2 0 01-2-2v-2.57z"
                            clip-rule="evenodd" />
                    </svg>
                    <h3 class="display-font text-2xl font-bold text-white mb-3">
                        @if (session()->get('lang') == 'ru')
                            В данный момент нет активных вакансий
                        @elseif(session()->get('lang') == 'en')
                            No active vacancies at the moment
                        @else
                            Дар ин лаҳза ҷойҳои кории фаъол нест
                        @endif
                    </h3>
                    <p class="text-gray-500">
                        @if (session()->get('lang') == 'ru')
                            Следите за обновлениями
                        @elseif(session()->get('lang') == 'en')
                            Check back later
                        @else
                            Навигариҳоро пайгирӣ кунед
                        @endif
                    </p>
                </div>
            @else
                {{-- Фильтры --}}
                <div class="mb-10 p-6 rounded-2xl"
                    style="background: var(--dark-card); border: 1px solid var(--dark-border);">
                    <div class="grid md:grid-cols-4 gap-4">
                        <div>
                            <label class="block text-xs font-medium text-gray-500 uppercase tracking-wider mb-2">
                                @if (session()->get('lang') == 'ru')
                                    Поиск
                                @elseif(session()->get('lang') == 'en')
                                    Search
                                @else
                                    Ҷустуҷӯ
                                @endif
                            </label>
                            <div class="relative">
                                <svg class="w-4 h-4 absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-500" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                                <input type="text" id="searchInput" class="form-input pl-10" style="padding-left: 40px;"
                                    placeholder="@if (session()->get('lang') == 'ru') Название или место...@elseif(session()->get('lang') == 'en')Title or location...@elseНом ё ҷой... @endif">
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-medium text-gray-500 uppercase tracking-wider mb-2">
                                @if (session()->get('lang') == 'ru')
                                    Местоположение
                                @elseif(session()->get('lang') == 'en')
                                    Location
                                @else
                                    Ҷойгиршавӣ
                                @endif
                            </label>
                            <select id="locationFilter" class="form-input">
                                <option value="all">
                                    @if (session()->get('lang') == 'ru')
                                        Все
                                    @elseif(session()->get('lang') == 'en')
                                        All
                                    @else
                                        Ҳама
                                    @endif
                                </option>
                                @php $locations = $jobs->pluck('location')->unique()->filter(); @endphp
                                @foreach ($locations as $location)
                                    <option value="{{ $location }}">{{ $location }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-medium text-gray-500 uppercase tracking-wider mb-2">
                                @if (session()->get('lang') == 'ru')
                                    Сортировка
                                @elseif(session()->get('lang') == 'en')
                                    Sort
                                @else
                                    Мураттабсозӣ
                                @endif
                            </label>
                            <select id="sortFilter" class="form-input">
                                <option value="desc">
                                    @if (session()->get('lang') == 'ru')
                                        Сначала новые
                                    @elseif(session()->get('lang') == 'en')
                                        Newest
                                    @else
                                        Аввал навтарҳо
                                    @endif
                                </option>
                                <option value="asc">
                                    @if (session()->get('lang') == 'ru')
                                        Сначала старые
                                    @elseif(session()->get('lang') == 'en')
                                        Oldest
                                    @else
                                        Аввал кӯҳнатарҳо
                                    @endif
                                </option>
                                <option value="salary">
                                    @if (session()->get('lang') == 'ru')
                                        По зарплате
                                    @elseif(session()->get('lang') == 'en')
                                        By salary
                                    @else
                                        Аз рӯи музд
                                    @endif
                                </option>
                            </select>
                        </div>

                        <div class="flex items-end">
                            <button type="button" id="resetFilters" class="btn-outline w-full py-3 text-sm text-center">
                                @if (session()->get('lang') == 'ru')
                                    Сбросить
                                @elseif(session()->get('lang') == 'en')
                                    Reset
                                @else
                                    Тоза кардан
                                @endif
                            </button>
                        </div>
                    </div>

                    <p class="text-gray-500 text-sm mt-4" id="resultsCount"></p>
                </div>

                {{-- Сетка вакансий --}}
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6" id="jobsGrid">
                    @foreach ($jobs as $job)
                        <div class="job-card event-card group" data-title-ru="{{ $job->title_ru ?? '' }}"
                            data-title-en="{{ $job->title_en ?? '' }}" data-title-tj="{{ $job->title_tj ?? '' }}"
                            data-desc-ru="{{ $job->description_ru ?? '' }}" data-desc-en="{{ $job->description_en ?? '' }}"
                            data-desc-tj="{{ $job->description_tj ?? '' }}" data-location="{{ $job->location ?? '' }}"
                            data-salary="{{ $job->salary ?? '' }}" data-date="{{ $job->created_at }}">

                            {{-- Изображение --}}
                            <div class="h-48 relative overflow-hidden">
                                @if ($job->image)
                                    <img src="{{ asset($job->image) }}" alt="{{ $job->{'title_' . app()->getLocale()} }}"
                                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                                @else
                                    <div class="w-full h-full flex items-center justify-center"
                                        style="background: linear-gradient(135deg, var(--dark-surface), var(--dark-bg));">
                                        <svg class="w-14 h-14 text-gray-700" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm-4 9.43A20.963 20.963 0 0010 15c2.088 0 4.106-.306 6-1.57V16a2 2 0 01-2 2H6a2 2 0 01-2-2v-2.57z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                @endif

                                @if ($job->salary)
                                    <div class="absolute top-4 right-4 px-3 py-1.5 rounded-lg text-xs font-semibold"
                                        style="background: rgba(15,14,12,0.85); backdrop-filter: blur(10px); color: var(--gold); border: 1px solid var(--dark-border);">
                                        {{ $job->salary }}
                                    </div>
                                @endif
                            </div>

                            {{-- Контент --}}
                            <div class="p-6">
                                <h3 class="display-font text-lg font-bold text-white mb-3">
                                    {{ $job->{'title_' . app()->getLocale()} }}
                                </h3>

                                <div class="space-y-2 mb-5">
                                    @if ($job->location)
                                        <div class="flex items-center gap-2 text-sm text-gray-400">
                                            <svg class="w-4 h-4 flex-shrink-0" style="color: var(--gold);" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                            {{ $job->location }}
                                        </div>
                                    @endif

                                    @if ($job->end_date)
                                        <div class="flex items-center gap-2 text-sm text-gray-400">
                                            <svg class="w-4 h-4 flex-shrink-0" style="color: var(--gold);" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                            @if (session()->get('lang') == 'ru')
                                                До
                                            @elseif(session()->get('lang') == 'en')
                                                Until
                                            @else
                                                То
                                            @endif: {{ $job->end_date->format('d.m.Y') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="flex gap-3">
                                    <a href="{{ route('frontend.jobs.show', $job->slug) }}"
                                        class="btn-outline text-sm py-2.5 px-5 flex-1 text-center">
                                        @if (session()->get('lang') == 'ru')
                                            Подробнее
                                        @elseif(session()->get('lang') == 'en')
                                            Details
                                        @else
                                            Муфассал
                                        @endif
                                    </a>
                                    <a href="{{ route('frontend.jobs.apply', $job->slug) }}"
                                        class="btn-primary text-sm py-2.5 px-5 flex-1 text-center">
                                        @if (session()->get('lang') == 'ru')
                                            Откликнуться
                                        @elseif(session()->get('lang') == 'en')
                                            Apply
                                        @else
                                            Аризадиҳӣ
                                        @endif
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- Ничего не найдено --}}
                <div id="noResults" class="text-center py-16" style="display: none;">
                    <svg class="w-16 h-16 mx-auto mb-4 text-gray-700" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                            clip-rule="evenodd" />
                    </svg>
                    <h4 class="text-xl font-bold text-white mb-2">
                        @if (session()->get('lang') == 'ru')
                            Ничего не найдено
                        @elseif(session()->get('lang') == 'en')
                            No results found
                        @else
                            Ҳеҷ чиз ёфт нашуд
                        @endif
                    </h4>
                    <p class="text-gray-500">
                        @if (session()->get('lang') == 'ru')
                            Попробуйте изменить параметры поиска
                        @elseif(session()->get('lang') == 'en')
                            Try changing search criteria
                        @else
                            Параметрҳои ҷустуҷӯро тағйир диҳед
                        @endif
                    </p>
                </div>
            @endif
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            const locationFilter = document.getElementById('locationFilter');
            const sortFilter = document.getElementById('sortFilter');
            const resetButton = document.getElementById('resetFilters');
            const jobCards = document.querySelectorAll('.job-card');
            const resultsCount = document.getElementById('resultsCount');
            const noResults = document.getElementById('noResults');
            const jobsGrid = document.getElementById('jobsGrid');

            if (!jobCards.length) return;

            function filterJobs() {
                const searchTerm = searchInput.value.toLowerCase().trim();
                const locationValue = locationFilter.value;
                const sortValue = sortFilter.value;
                let visibleCards = [];

                jobCards.forEach(card => {
                    const titleRu = (card.getAttribute('data-title-ru') || '').toLowerCase();
                    const titleEn = (card.getAttribute('data-title-en') || '').toLowerCase();
                    const titleTj = (card.getAttribute('data-title-tj') || '').toLowerCase();
                    const descRu = (card.getAttribute('data-desc-ru') || '').toLowerCase();
                    const descEn = (card.getAttribute('data-desc-en') || '').toLowerCase();
                    const descTj = (card.getAttribute('data-desc-tj') || '').toLowerCase();
                    const location = card.getAttribute('data-location') || '';
                    const salary = (card.getAttribute('data-salary') || '').toLowerCase();

                    const matchesSearch = !searchTerm ||
                        titleRu.includes(searchTerm) || titleEn.includes(searchTerm) || titleTj.includes(
                            searchTerm) ||
                        descRu.includes(searchTerm) || descEn.includes(searchTerm) || descTj.includes(
                            searchTerm) ||
                        salary.includes(searchTerm);

                    const matchesLocation = locationValue === 'all' || location === locationValue;

                    if (matchesSearch && matchesLocation) {
                        card.style.display = '';
                        card.style.opacity = '1';
                        visibleCards.push(card);
                    } else {
                        card.style.opacity = '0';
                        setTimeout(() => {
                            card.style.display = 'none';
                        }, 200);
                    }
                });

                visibleCards.sort((a, b) => {
                    if (sortValue === 'salary') {
                        return (b.getAttribute('data-salary') || '').localeCompare(a.getAttribute(
                            'data-salary') || '');
                    }
                    const dateA = new Date(a.getAttribute('data-date'));
                    const dateB = new Date(b.getAttribute('data-date'));
                    return sortValue === 'asc' ? dateA - dateB : dateB - dateA;
                });

                visibleCards.forEach(card => jobsGrid.appendChild(card));
                updateResultsCount(visibleCards.length);
                noResults.style.display = visibleCards.length === 0 ? 'block' : 'none';
            }

            function updateResultsCount(count) {
                const lang = '{{ session()->get('lang') ?? 'tj' }}';
                const total = jobCards.length;
                if (lang === 'ru') resultsCount.innerHTML =
                    `Показано: <strong>${count}</strong> из <strong>${total}</strong>`;
                else if (lang === 'en') resultsCount.innerHTML =
                    `Showing: <strong>${count}</strong> of <strong>${total}</strong>`;
                else resultsCount.innerHTML = `Намоиш: <strong>${count}</strong> аз <strong>${total}</strong>`;
            }

            let timeout;
            searchInput.addEventListener('input', () => {
                clearTimeout(timeout);
                timeout = setTimeout(filterJobs, 300);
            });
            locationFilter.addEventListener('change', filterJobs);
            sortFilter.addEventListener('change', filterJobs);
            resetButton.addEventListener('click', () => {
                searchInput.value = '';
                locationFilter.value = 'all';
                sortFilter.value = 'desc';
                filterJobs();
            });

            filterJobs();
        });
    </script>
@endpush
