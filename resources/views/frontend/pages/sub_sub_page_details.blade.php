@extends('frontend.master')

@section('title')
    @if(session()->get('lang') == 'ru')
        {{ $sub_submenu->title_ru }}
    @elseif(session()->get('lang') == 'en')
        {{ $sub_submenu->title_en }}
    @else
        {{ $sub_submenu->title_tj }}
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

        .page-content ul,
        .page-content ol {
            color: var(--text-secondary);
            padding-left: 1.5rem;
            margin-bottom: 1.2rem;
        }

        .page-content a {
            color: var(--gold);
            text-decoration: underline;
            transition: opacity 0.3s;
        }

        .page-content a:hover {
            opacity: 0.8;
        }
    </style>
@endpush

@section('content')
    {{-- Заголовок страницы --}}
    <section class="pt-16 pb-12 px-6" style="background: var(--dark-surface); border-bottom: 1px solid var(--dark-border);">
        <div class="max-w-7xl mx-auto text-center">
            <h1 class="display-font text-4xl md:text-5xl font-bold mb-4 text-white">
                @if(session()->get('lang') == 'ru')
                    {{ $sub_submenu->title_ru }}
                @elseif(session()->get('lang') == 'en')
                    {{ $sub_submenu->title_en }}
                @else
                    {{ $sub_submenu->title_tj }}
                @endif
            </h1>
            <div class="gold-divider"></div>
        </div>
    </section>

    {{-- Контент --}}
    <section class="py-16 px-6">
        <div class="max-w-4xl mx-auto">
            <div class="page-content text-lg leading-relaxed">
                @if(session()->get('lang') == 'ru')
                    {!! $sub_submenu->text_ru !!}
                @elseif(session()->get('lang') == 'en')
                    {!! $sub_submenu->text_en !!}
                @else
                    {!! $sub_submenu->text_tj !!}
                @endif
            </div>
        </div>
    </section>
@endsection
