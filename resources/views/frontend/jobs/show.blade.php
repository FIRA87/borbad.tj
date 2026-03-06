@extends('frontend.master')

@section('title')
    @if (session()->get('lang') == 'ru')
        {{ $job->title_ru }}
    @elseif(session()->get('lang') == 'en')
        {{ $job->title_en }}
    @else
        {{ $job->title_tj }}
    @endif
@endsection

@section('content')
    {{-- Заголовок --}}
    <section class="pt-16 pb-12 px-6" style="background: var(--dark-surface); border-bottom: 1px solid var(--dark-border);">
        <div class="max-w-4xl mx-auto">
            {{-- Хлебные крошки --}}
            <div class="flex items-center gap-2 text-sm mb-6">
                <a href="{{ route('frontend.jobs.index') }}" class="text-gray-500 hover:text-white transition">
                    @if (session()->get('lang') == 'ru')
                        Вакансии
                    @elseif(session()->get('lang') == 'en')
                        Vacancies
                    @else
                        Вакансияҳо
                    @endif
                </a>
                <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
                <span class="text-gray-400 truncate">
                    @if (session()->get('lang') == 'ru')
                        {{ $job->title_ru }}
                    @elseif(session()->get('lang') == 'en')
                        {{ $job->title_en }}
                    @else
                        {{ $job->title_tj }}
                    @endif
                </span>
            </div>

            <h1 class="display-font text-4xl md:text-5xl font-bold text-white mb-4">
                @if (session()->get('lang') == 'ru')
                    {{ $job->title_ru }}
                @elseif(session()->get('lang') == 'en')
                    {{ $job->title_en }}
                @else
                    {{ $job->title_tj }}
                @endif
            </h1>

            {{-- Метаданные --}}
            <div class="flex flex-wrap items-center gap-4 mt-6">
                @if ($job->location)
                    <div class="flex items-center gap-2 text-sm text-gray-400">
                        <svg class="w-4 h-4" style="color: var(--gold);" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        {{ $job->location }}
                    </div>
                @endif
                @if ($job->salary)
                    <div class="flex items-center gap-2 text-sm" style="color: var(--gold);">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        {{ $job->salary }}
                    </div>
                @endif
                @if ($job->start_date)
                    <div class="flex items-center gap-2 text-sm text-gray-400">
                        <svg class="w-4 h-4" style="color: var(--gold);" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        {{ $job->start_date->format('d.m.Y') }}
                        @if ($job->end_date)
                            — {{ $job->end_date->format('d.m.Y') }}
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </section>

    {{-- Контент --}}
    <section class="py-16 px-6 section-dark">
        <div class="max-w-4xl mx-auto">
            <div class="grid lg:grid-cols-3 gap-10">
                {{-- Основной контент --}}
                <div class="lg:col-span-2 space-y-10">
                    @if ($job->image)
                        <div class="rounded-2xl overflow-hidden border" style="border-color: var(--dark-border);">
                            <img src="{{ asset($job->image) }}" alt="{{ $job->{'title_' . app()->getLocale()} }}"
                                class="w-full h-auto max-h-96 object-cover">
                        </div>
                    @endif

                    @if ($job->{'description_' . app()->getLocale()})
                        <div>
                            <h2 class="display-font text-2xl font-bold text-white mb-4 flex items-center gap-3">
                                <div class="w-1 h-6 rounded-full" style="background: var(--gold);"></div>
                                @if (session()->get('lang') == 'ru')
                                    Описание
                                @elseif(session()->get('lang') == 'en')
                                    Description
                                @else
                                    Тавсиф
                                @endif
                            </h2>
                            <div class="text-gray-300 leading-relaxed prose-dark">
                                @if (session()->get('lang') == 'ru')
                                    {{ $job->description_ru }}
                                @elseif(session()->get('lang') == 'en')
                                    {{ $job->description_en }}
                                @else
                                    {{ $job->description_tj }}
                                @endif

                            </div>
                        </div>
                    @endif

                    @if ($job->{'requirements_' . app()->getLocale()})
                        <div>
                            <h2 class="display-font text-2xl font-bold text-white mb-4 flex items-center gap-3">
                                <div class="w-1 h-6 rounded-full" style="background: var(--gold);"></div>
                                @if (session()->get('lang') == 'ru')
                                    Требования
                                @elseif(session()->get('lang') == 'en')
                                    Requirements
                                @else
                                    Талабот
                                @endif
                            </h2>
                            <div class="text-gray-300 leading-relaxed">

                                @if (session()->get('lang') == 'ru')
                                    {{ $job->requirements_ru }}
                                @elseif(session()->get('lang') == 'en')
                                    {{ $job->requirements_en }}
                                @else
                                    {{ $job->requirements_tj }}
                                @endif

                            </div>
                        </div>
                    @endif

                    @if ($job->attachments && count($job->attachments) > 0)
                        <div>
                            <h2 class="display-font text-2xl font-bold text-white mb-4 flex items-center gap-3">
                                <div class="w-1 h-6 rounded-full" style="background: var(--gold);"></div>
                                @if (session()->get('lang') == 'ru')
                                    Документы
                                @elseif(session()->get('lang') == 'en')
                                    Documents
                                @else
                                    Ҳуҷҷатҳо
                                @endif
                            </h2>
                            <div class="space-y-2">
                                @foreach ($job->attachments as $index => $file)
                                    <a href="{{ route('frontend.jobs.download', ['job' => $job->id, 'index' => $index]) }}"
                                        class="flex items-center gap-3 p-4 rounded-xl transition-all hover:-translate-y-1"
                                        style="background: var(--dark-card); border: 1px solid var(--dark-border);">
                                        <svg class="w-5 h-5 flex-shrink-0" style="color: var(--gold);" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                        <span class="text-gray-300 text-sm">
                                            @if (session()->get('lang') == 'ru')
                                                Скачать документ
                                            @elseif(session()->get('lang') == 'en')
                                                Download document
                                            @else
                                                Боргирии ҳуҷҷат
                                            @endif {{ $index + 1 }}
                                        </span>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>

                {{-- Боковая панель --}}
                <div class="space-y-6">
                    {{-- Кнопка подачи заявки --}}
                    <a href="{{ route('frontend.jobs.apply', $job->slug) }}"
                        class="btn-primary w-full py-4 text-center text-lg font-semibold block">
                        @if (session()->get('lang') == 'ru')
                            Подать заявку
                        @elseif(session()->get('lang') == 'en')
                            Apply Now
                        @else
                            Аризадиҳӣ
                        @endif
                    </a>

                    {{-- Инфо-карточка --}}
                    <div class="p-6 rounded-2xl"
                        style="background: var(--dark-card); border: 1px solid var(--dark-border);">
                        <h3 class="text-sm font-semibold uppercase tracking-wider mb-4" style="color: var(--gold);">
                            @if (session()->get('lang') == 'ru')
                                Информация
                            @elseif(session()->get('lang') == 'en')
                                Info
                            @else
                                Маълумот
                            @endif
                        </h3>
                        <div class="space-y-4">
                            <div>
                                <p class="text-xs text-gray-500 uppercase tracking-wider mb-1">
                                    @if (session()->get('lang') == 'ru')
                                        Дата публикации
                                    @elseif(session()->get('lang') == 'en')
                                        Published
                                    @else
                                        Санаи нашр
                                    @endif
                                </p>
                                <p class="text-gray-300 text-sm">{{ $job->created_at->format('d.m.Y') }}</p>
                            </div>
                            @if ($job->end_date)
                                <div>
                                    <p class="text-xs text-gray-500 uppercase tracking-wider mb-1">
                                        @if (session()->get('lang') == 'ru')
                                            Приём заявок до
                                        @elseif(session()->get('lang') == 'en')
                                            Deadline
                                        @else
                                            Мӯҳлат
                                        @endif
                                    </p>
                                    <p class="text-sm font-semibold" style="color: var(--gold);">
                                        {{ $job->end_date->format('d.m.Y') }}</p>
                                </div>
                            @endif
                            @if ($job->location)
                                <div>
                                    <p class="text-xs text-gray-500 uppercase tracking-wider mb-1">
                                        @if (session()->get('lang') == 'ru')
                                            Место
                                        @elseif(session()->get('lang') == 'en')
                                            Location
                                        @else
                                            Ҷой
                                        @endif
                                    </p>
                                    <p class="text-gray-300 text-sm">{{ $job->location }}</p>
                                </div>
                            @endif
                            @if ($job->salary)
                                <div>
                                    <p class="text-xs text-gray-500 uppercase tracking-wider mb-1">
                                        @if (session()->get('lang') == 'ru')
                                            Зарплата
                                        @elseif(session()->get('lang') == 'en')
                                            Salary
                                        @else
                                            Музд
                                        @endif
                                    </p>
                                    <p class="text-sm font-semibold" style="color: var(--gold);">{{ $job->salary }}</p>
                                </div>
                            @endif
                        </div>
                    </div>

                    {{-- Назад --}}
                    <a href="{{ route('frontend.jobs.index') }}" class="btn-outline w-full py-3 text-center text-sm block">
                        @if (session()->get('lang') == 'ru')
                            Все вакансии
                        @elseif(session()->get('lang') == 'en')
                            All Vacancies
                        @else
                            Ҳамаи вакансияҳо
                        @endif
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
