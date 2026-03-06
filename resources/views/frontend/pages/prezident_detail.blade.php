@extends('frontend.master')

@section('title')
    @if(session()->get('lang') == 'ru')
        {{ $prizent->title_ru }}
    @elseif(session()->get('lang') == 'en')
        {{ $prizent->title_en }}
    @else
        {{ $prizent->title_tj }}
    @endif
@endsection

@push('styles')
    <style>
        .page-content img {
            max-width: 100%;
            height: auto;
            border-radius: 12px;
            margin: 1.5rem 0;
        }

        .page-content p {
            margin-bottom: 1.2rem;
            line-height: 1.8;
            color: var(--text-secondary);
        }

        .page-content h2,
        .page-content h3,
        .page-content h4 {
            color: var(--text-primary);
            margin-top: 2rem;
            margin-bottom: 1rem;
            font-family: 'Playfair Display', serif;
        }
    </style>
@endpush

@section('content')
    {{-- Заголовок страницы --}}
    <section class="pt-16 pb-12 px-6" style="background: var(--dark-surface); border-bottom: 1px solid var(--dark-border);">
        <div class="max-w-7xl mx-auto text-center">
            <h1 class="display-font text-4xl md:text-5xl font-bold mb-4 text-white">
                @if(session()->get('lang') == 'ru')
                    {{ $prizent->title_ru }}
                @elseif(session()->get('lang') == 'en')
                    {{ $prizent->title_en }}
                @else
                    {{ $prizent->title_tj }}
                @endif
            </h1>
            <div class="gold-divider"></div>
        </div>
    </section>

    {{-- Контент --}}
    <section class="py-16 px-6">
        <div class="max-w-4xl mx-auto">
            @if($prizent->image)
                <div class="mb-10 rounded-2xl overflow-hidden border" style="border-color: var(--dark-border);">
                    <img src="/{{ $prizent->image }}" class="w-full" alt="{{ $prizent->title_ru }}">
                </div>
            @endif

            <div class="page-content text-lg leading-relaxed">
                @if(session()->get('lang') == 'ru')
                    {!! $prizent->text_ru !!}
                @elseif(session()->get('lang') == 'en')
                    {!! $prizent->text_en !!}
                @else
                    {!! $prizent->text_tj !!}
                @endif
            </div>
        </div>
    </section>
@endsection
