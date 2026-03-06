@extends('frontend.master')

@section('title')
    @if(session()->get('lang') == 'ru') {{ $breadcat->title_ru }}
    @elseif(session()->get('lang') == 'en') {{ $breadcat->title_en }}
    @else {{ $breadcat->title_tj }} @endif
@endsection

@php
    $categories = App\Models\Category::orderBy('id', 'ASC')->get();
@endphp

@push('styles')
    <style>
        .cat-news-card {
            background: var(--dark-card);
            border: 1px solid var(--dark-border);
            border-radius: 16px;
            overflow: hidden;
            transition: all 0.4s ease;
        }

        .cat-news-card:hover {
            transform: translateY(-4px);
            border-color: var(--gold);
            box-shadow: 0 16px 40px rgba(0, 0, 0, 0.4);
        }

        .cat-news-card img {
            transition: transform 0.4s ease;
        }

        .cat-news-card:hover img {
            transform: scale(1.05);
        }

        .sidebar-card {
            background: var(--dark-card);
            border: 1px solid var(--dark-border);
            border-radius: 16px;
            padding: 24px;
        }

        .category-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 14px;
            border-radius: 10px;
            color: var(--text-secondary);
            text-decoration: none;
            transition: all 0.3s;
            font-size: 0.9rem;
        }

        .category-link:hover {
            background: var(--gold-dim);
            color: var(--gold);
        }

        .category-link img {
            width: 24px;
            height: 24px;
            object-fit: contain;
        }
    </style>
@endpush

@section('content')
    {{-- Заголовок --}}
    <section class="pt-16 pb-12 px-6" style="background: var(--dark-surface); border-bottom: 1px solid var(--dark-border);">
        <div class="max-w-7xl mx-auto">
            {{-- Хлебные крошки --}}
            <div class="flex items-center gap-2 text-sm mb-4" style="color: var(--text-muted);">
                <a href="{{ url('/') }}" style="color: var(--gold);" class="hover:underline">
                    @if(session()->get('lang') == 'ru') Главная @elseif(session()->get('lang') == 'en') Main @else Асосӣ @endif
                </a>
                <span>/</span>
                <span class="text-white">
                    @if(session()->get('lang') == 'ru') {{ $breadcat->title_ru }}
                    @elseif(session()->get('lang') == 'en') {{ $breadcat->title_en }}
                    @else {{ $breadcat->title_tj }} @endif
                </span>
            </div>

            <h1 class="display-font text-4xl md:text-5xl font-bold text-white mb-4">
                @if(session()->get('lang') == 'ru') {{ $breadcat->title_ru }}
                @elseif(session()->get('lang') == 'en') {{ $breadcat->title_en }}
                @else {{ $breadcat->title_tj }} @endif
            </h1>
            <div class="gold-divider" style="margin-left: 0;"></div>
        </div>
    </section>

    {{-- Контент --}}
    <section class="py-16 px-6">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col lg:flex-row gap-10">
                {{-- Новости --}}
                <div class="flex-1">
                    @if($news->count())
                        <div class="grid md:grid-cols-2 gap-6">
                            @foreach($news as $item)
                                <a href="{{ url('news/details/'.$item->id.'/'.$item->slug) }}" class="cat-news-card block">
                                    <div class="h-48 overflow-hidden">
                                        <img src="{{ asset($item->image) }}" class="w-full h-full object-cover" alt="">
                                    </div>
                                    <div class="p-5">
                                        <p class="text-xs mb-2" style="color: var(--text-muted);">
                                            {{ date('d.m.Y', strtotime($item->created_at)) }}
                                        </p>
                                        <h4 class="display-font text-lg font-bold text-white mb-3">
                                            @if(session()->get('lang') == 'ru') {{ $item->title_ru }}
                                            @elseif(session()->get('lang') == 'en') {{ $item->title_en }}
                                            @else {{ $item->title_tj }} @endif
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

                        <div class="mt-10">
                            {{ $news->links() }}
                        </div>
                    @else
                        <div class="text-center py-16">
                            <h3 class="display-font text-xl font-bold text-white">
                                @if(session()->get('lang') == 'ru') Публикаций пока нет
                                @elseif(session()->get('lang') == 'en') No posts yet
                                @else Нашрия ҳоло нест @endif
                            </h3>
                        </div>
                    @endif
                </div>

                {{-- Сайдбар --}}
                <div class="w-full lg:w-80 flex-shrink-0 space-y-6">
                    {{-- Поиск --}}
                    <div class="sidebar-card">
                        <h4 class="display-font text-lg font-bold text-white mb-4">
                            @if(session()->get('lang') == 'ru') Поиск @elseif(session()->get('lang') == 'en') Search @else Ҷустуҷӯ @endif
                        </h4>
                        <form action="{{ route('news.search') }}" method="POST">
                            @csrf
                            <div class="flex">
                                <input type="text" name="search" required class="form-input flex-1 rounded-r-none"
                                    placeholder="@if(session()->get('lang') == 'ru')Поиск...@elseif(session()->get('lang') == 'en')Search...@else Ҷустуҷӯ...@endif">
                                <button type="submit" class="btn-primary rounded-l-none px-4">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                </button>
                            </div>
                        </form>
                    </div>

                    {{-- Категории --}}
                    <div class="sidebar-card">
                        <h4 class="display-font text-lg font-bold text-white mb-4">
                            @if(session()->get('lang') == 'ru') Категории @elseif(session()->get('lang') == 'en') Categories @else Категорияҳо @endif
                        </h4>
                        <div class="space-y-1">
                            @foreach($categories as $category)
                                <a href="{{ url('news/category/' . $category->id . '/' . $category->category_slug) }}" class="category-link">
                                    @if($category->icon)
                                        <img src="/{{ $category->icon }}" alt="">
                                    @endif
                                    <span>
                                        @if(session()->get('lang') == 'ru') {{ $category->title_ru }}
                                        @elseif(session()->get('lang') == 'en') {{ $category->title_en }}
                                        @else {{ $category->title_tj }} @endif
                                    </span>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
