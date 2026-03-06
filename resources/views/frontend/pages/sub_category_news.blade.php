@extends('frontend.master')

@section('title')
    @if(session()->get('lang') == 'ru') {{ $breadcat->title_ru }}
    @elseif(session()->get('lang') == 'en') {{ $breadcat->title_en }}
    @else {{ $breadcat->title_tj }} @endif
@endsection

@push('styles')
    <style>
        .subcat-card {
            background: var(--dark-card);
            border: 1px solid var(--dark-border);
            border-radius: 16px;
            overflow: hidden;
            transition: all 0.4s ease;
        }

        .subcat-card:hover {
            transform: translateY(-4px);
            border-color: var(--gold);
            box-shadow: 0 16px 40px rgba(0, 0, 0, 0.4);
        }

        .subcat-card img {
            transition: transform 0.4s ease;
        }

        .subcat-card:hover img {
            transform: scale(1.05);
        }
    </style>
@endpush

@section('content')
    {{-- Заголовок --}}
    <section class="pt-16 pb-12 px-6" style="background: var(--dark-surface); border-bottom: 1px solid var(--dark-border);">
        <div class="max-w-7xl mx-auto text-center">
            <p class="text-sm uppercase tracking-widest mb-3" style="color: var(--gold);">
                @if(session()->get('lang') == 'ru') Подкатегория
                @elseif(session()->get('lang') == 'en') Subcategory
                @else Зеркатегория @endif
            </p>
            <h1 class="display-font text-4xl md:text-5xl font-bold mb-4 text-white">
                @if(session()->get('lang') == 'ru') {{ $breadcat->title_ru }}
                @elseif(session()->get('lang') == 'en') {{ $breadcat->title_en }}
                @else {{ $breadcat->title_tj }} @endif
            </h1>
            <div class="gold-divider"></div>
        </div>
    </section>

    {{-- Новости --}}
    <section class="py-16 px-6">
        <div class="max-w-7xl mx-auto">
            @if($news->count())
                <div class="grid md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach($news as $item)
                        <a href="{{ url('news/details/'.$item->id.'/'.$item->slug) }}" class="subcat-card block">
                            <div class="h-52 overflow-hidden">
                                <img src="{{ asset($item->image) }}" class="w-full h-full object-cover" alt="">
                            </div>
                            <div class="p-5">
                                <p class="text-xs mb-2" style="color: var(--text-muted);">
                                    {{ date('d.m.Y', strtotime($item->created_at)) }}
                                </p>
                                <h4 class="text-white font-bold text-sm mb-2">
                                    @if(session()->get('lang') == 'ru') {{ $item->title_ru }}
                                    @elseif(session()->get('lang') == 'en') {{ $item->title_en }}
                                    @else {{ $item->title_tj }} @endif
                                </h4>
                                <span class="text-xs" style="color: var(--gold);">
                                    @if(session()->get('lang') == 'ru') Подробнее
                                    @elseif(session()->get('lang') == 'en') Read more
                                    @else Бештар @endif →
                                </span>
                            </div>
                        </a>
                    @endforeach
                </div>
            @else
                <div class="text-center py-16">
                    <h3 class="display-font text-2xl font-bold text-white">
                        @if(session()->get('lang') == 'ru') Публикаций пока нет
                        @elseif(session()->get('lang') == 'en') No posts yet
                        @else Нашрия ҳоло нест @endif
                    </h3>
                </div>
            @endif
        </div>
    </section>
@endsection
