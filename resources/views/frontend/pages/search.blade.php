@extends('frontend.master')

@section('title')
    {{ $lang = session()->get('lang') }}
    {{ $lang == 'ru' ? 'Поиск' : ($lang == 'en' ? 'Search' : 'Ҷустуҷӯ') }}
@endsection

@php
    $categories = App\Models\Category::orderBy('id', 'ASC')->get();
    $lang = session()->get('lang');
    $t = [
        'search' => ['ru' => 'Поиск', 'en' => 'Search', 'tj' => 'Ҷустуҷӯ'],
        'results' => ['ru' => 'Результаты поиска', 'en' => 'Search Results', 'tj' => 'Натиҷаҳои ҷустуҷӯ'],
        'read_more' => ['ru' => 'Читать далее', 'en' => 'Read more', 'tj' => 'Давомаш'],
        'not_found' => [
            'ru' => 'По вашему запросу ничего не найдено',
            'en' => 'Nothing found for your request',
            'tj' => 'Барои дархости шумо чизе ёфт нашуд',
        ],
        'try_different' => [
            'ru' => 'Попробуйте изменить запрос',
            'en' => 'Try changing your query',
            'tj' => 'Дархости худро тағйир диҳед',
        ],
        'placeholder' => ['ru' => 'Введите запрос...', 'en' => 'Enter query...', 'tj' => 'Дархостро ворид кунед...'],
        'found' => ['ru' => 'Найдено:', 'en' => 'Found:', 'tj' => 'Ёфт шуд:'],
    ];
@endphp

@push('styles')
    <style>
        .search-result-card {
            background: var(--dark-card);
            border: 1px solid var(--dark-border);
            border-radius: 16px;
            overflow: hidden;
            transition: all 0.4s ease;
        }

        .search-result-card:hover {
            transform: translateY(-4px);
            border-color: var(--gold);
            box-shadow: 0 16px 40px rgba(0, 0, 0, 0.4);
        }

        .search-result-card img {
            transition: transform 0.4s ease;
        }

        .search-result-card:hover img {
            transform: scale(1.05);
        }
    </style>
@endpush

@section('content')
    {{-- Заголовок + поиск --}}
    <section class="pt-16 pb-12 px-6" style="background: var(--dark-surface); border-bottom: 1px solid var(--dark-border);">
        <div class="max-w-3xl mx-auto text-center">
            <h1 class="display-font text-4xl md:text-5xl font-bold mb-6 text-white">
                {{ $t['results'][$lang] ?? $t['results']['tj'] }}
            </h1>
            <form action="{{ route('news.search') }}" method="POST" class="relative">
                @csrf
                <div class="flex">
                    <input type="text" name="search" required value="{{ request('search') }}"
                        class="form-input flex-1 rounded-r-none"
                        placeholder="{{ $t['placeholder'][$lang] ?? $t['placeholder']['tj'] }}">
                    <button type="submit" class="btn-primary rounded-l-none px-8">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button>
                </div>
            </form>
        </div>
    </section>

    {{-- Результаты --}}
    <section class="py-16 px-6">
        <div class="max-w-7xl mx-auto">
            @php
                $news = $lang == 'ru' ? $news_ru : ($lang == 'en' ? $news_en : $news_tj);
                $title_field = "title_$lang";
                $details_field = "news_details_$lang";
            @endphp

            @if ($news->isNotEmpty())
                <p class="text-sm mb-8" style="color: var(--text-muted);">
                    {{ $t['found'][$lang] ?? $t['found']['tj'] }}
                    <span class="px-2 py-0.5 rounded text-xs font-bold"
                        style="background: var(--gold-dim); color: var(--gold);">{{ $news->count() }}</span>
                </p>

                <div class="grid md:grid-cols-3 gap-8">
                    @foreach ($news as $item)
                        <a href="{{ url('news/details/' . $item->id) }}" class="search-result-card block">
                            <div class="h-48 overflow-hidden">
                                @if ($item->images && $item->images->isNotEmpty())
                                    <img src="{{ asset($item->images->first()->image) }}" class="w-full h-full object-cover"
                                        alt="">
                                @else
                                    <div class="w-full h-full flex items-center justify-center"
                                        style="background: var(--dark-surface);">
                                        <svg class="w-12 h-12 text-gray-700" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" />
                                        </svg>
                                    </div>
                                @endif
                            </div>
                            <div class="p-5">
                                <p class="text-xs mb-2" style="color: var(--text-muted);">
                                    {{ $item->publish_date ? date('d.m.Y', strtotime($item->publish_date)) : date('d.m.Y', strtotime($item->created_at)) }}
                                </p>
                                <h4 class="display-font text-lg font-bold text-white mb-2">
                                    {{ $item->$title_field }}
                                </h4>
                                <p class="text-sm mb-3" style="color: var(--text-secondary);">
                                    {!! Str::limit(strip_tags($item->$details_field ?? ''), 100) !!}
                                </p>
                                <span class="text-sm" style="color: var(--gold);">
                                    {{ $t['read_more'][$lang] ?? $t['read_more']['tj'] }} →
                                </span>
                            </div>
                        </a>
                    @endforeach
                </div>
            @else
                <div class="text-center py-16">
                    <svg class="w-20 h-20 mx-auto mb-6" style="color: var(--text-muted); opacity: 0.2;" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                            clip-rule="evenodd" />
                    </svg>
                    <h3 class="display-font text-2xl font-bold text-white mb-3">
                        {{ $t['not_found'][$lang] ?? $t['not_found']['tj'] }}
                    </h3>
                    <p class="text-gray-400 mb-6">
                        {{ $t['try_different'][$lang] ?? $t['try_different']['tj'] }}
                    </p>
                    <a href="{{ url('/') }}" class="btn-primary">
                        @if ($lang == 'ru')
                            На главную
                        @elseif($lang == 'en')
                            Home
                        @else
                            Ба асосӣ
                        @endif
                    </a>
                </div>
            @endif
        </div>
    </section>
@endsection
