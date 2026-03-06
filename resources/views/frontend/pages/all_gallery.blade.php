@extends('frontend.master')

@section('title')
    @trans('main_gallery')
@endsection

@push('styles')
    <style>
        .gallery-card {
            position: relative;
            overflow: hidden;
            border-radius: 16px;
            border: 1px solid var(--dark-border);
            transition: all 0.4s ease;
        }

        .gallery-card:hover {
            transform: translateY(-4px);
            border-color: var(--gold);
            box-shadow: 0 16px 40px rgba(0, 0, 0, 0.4);
        }

        .gallery-card img {
            transition: transform 0.4s ease;
        }

        .gallery-card:hover img {
            transform: scale(1.05);
        }

        .gallery-card-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 24px;
            background: linear-gradient(transparent, rgba(0, 0, 0, 0.85));
            transform: translateY(100%);
            transition: transform 0.3s ease;
        }

        .gallery-card:hover .gallery-card-overlay {
            transform: translateY(0);
        }
    </style>
@endpush

@section('content')
    {{-- Заголовок --}}
    <section class="pt-16 pb-12 px-6" style="background: var(--dark-surface); border-bottom: 1px solid var(--dark-border);">
        <div class="max-w-7xl mx-auto text-center">
            <p class="text-sm uppercase tracking-widest mb-3" style="color: var(--gold);">@trans('main_gallery')</p>
            <h1 class="display-font text-5xl md:text-6xl font-bold mb-4 text-white">@trans('main_gallery')</h1>
            <div class="gold-divider"></div>
        </div>
    </section>

    {{-- Галереи --}}
    <section class="py-16 px-6">
        <div class="max-w-7xl mx-auto">
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($galleries as $item)
                    <a href="{{ url('gallery/details/'.$item->id) }}" class="gallery-card block h-64"
                        style="background: var(--dark-card);">
                        <img src="/upload/cover/{{ $item->cover }}" class="w-full h-full object-cover" alt="">
                        <div class="gallery-card-overlay">
                            <h4 class="text-white font-bold text-lg">
                                @if(session('lang')=='ru') {{ $item->title_ru }}
                                @elseif(session('lang')=='en') {{ $item->title_en }}
                                @else {{ $item->title_tj }} @endif
                            </h4>
                            <span class="text-sm" style="color: var(--gold);">
                                @if(session('lang')=='ru') Смотреть @elseif(session('lang')=='en') View @else Дидан @endif →
                            </span>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
@endsection
