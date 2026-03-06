@extends('frontend.master')

@section('title')
    @if(session('lang') == 'ru')
        {{ $leader->title_ru }}
    @elseif(session('lang') == 'en')
        {{ $leader->title_en }}
    @else
        {{ $leader->title_tj }}
    @endif
@endsection

@push('styles')
    <style>
        .leader-info-card {
            background: var(--dark-card);
            border: 1px solid var(--dark-border);
            border-radius: 12px;
            padding: 20px;
            transition: all 0.3s ease;
        }

        .leader-info-card:hover {
            border-color: var(--gold);
            transform: translateY(-2px);
        }

        .biography-content {
            color: var(--text-secondary);
            line-height: 1.8;
        }

        .biography-content p {
            margin-bottom: 1rem;
        }

        .biography-content img {
            max-width: 100%;
            height: auto;
            border-radius: 12px;
            margin: 1.5rem 0;
        }
    </style>
@endpush

@section('content')
    {{-- Заголовок --}}
    <section class="pt-16 pb-12 px-6" style="background: var(--dark-surface); border-bottom: 1px solid var(--dark-border);">
        <div class="max-w-4xl mx-auto">
            {{-- Кнопка назад --}}
            <a href="{{ route('frontend.leader') }}" class="inline-flex items-center text-sm mb-8 transition-colors"
                style="color: var(--gold);">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                @if(session('lang') == 'ru') Руководство
                @elseif(session('lang') == 'en') Leadership
                @else Роҳбарият @endif
            </a>

            <div class="flex flex-col md:flex-row items-center md:items-start gap-8">
                {{-- Фото --}}
                <div class="w-40 h-40 md:w-48 md:h-48 rounded-full overflow-hidden flex-shrink-0 border-2"
                    style="border-color: var(--gold); background: var(--dark-card);">
                    @if(!empty($leader->image) || !empty($leader->photo))
                        <img src="{{ asset($leader->image ?? $leader->photo) }}"
                            alt="{{ $leader->title_ru }}"
                            class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full flex items-center justify-center">
                            <svg class="w-16 h-16 text-gray-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    @endif
                </div>

                {{-- Имя и должность --}}
                <div class="text-center md:text-left">
                    <h1 class="display-font text-3xl md:text-4xl font-bold text-white mb-3">
                        @if(session('lang') == 'ru') {{ $leader->title_ru }}
                        @elseif(session('lang') == 'en') {{ $leader->title_en }}
                        @else {{ $leader->title_tj }} @endif
                    </h1>
                    <p class="text-lg" style="color: var(--gold);">
                        @if(session('lang') == 'ru') {{ $leader->position_ru }}
                        @elseif(session('lang') == 'en') {{ $leader->position_en }}
                        @else {{ $leader->position_tj }} @endif
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Контактная информация --}}
    @if(!empty($leader->phone) || !empty($leader->email) || !empty($leader->working_days))
        <section class="py-10 px-6" style="border-bottom: 1px solid var(--dark-border);">
            <div class="max-w-4xl mx-auto">
                <div class="grid md:grid-cols-3 gap-4">
                    @if(!empty($leader->phone))
                        <div class="leader-info-card text-center">
                            <svg class="w-6 h-6 mx-auto mb-3" style="color: var(--gold);" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                            </svg>
                            <p class="text-xs uppercase tracking-wider mb-1" style="color: var(--text-muted);">
                                @if(session('lang') == 'ru') Телефон @elseif(session('lang') == 'en') Phone @else Телефон @endif
                            </p>
                            <a href="tel:{{ $leader->phone }}" class="text-white font-medium hover:underline">{{ $leader->phone }}</a>
                        </div>
                    @endif

                    @if(!empty($leader->email))
                        <div class="leader-info-card text-center">
                            <svg class="w-6 h-6 mx-auto mb-3" style="color: var(--gold);" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                            </svg>
                            <p class="text-xs uppercase tracking-wider mb-1" style="color: var(--text-muted);">Email</p>
                            <a href="mailto:{{ $leader->email }}" class="text-white font-medium hover:underline text-sm break-all">{{ $leader->email }}</a>
                        </div>
                    @endif

                    @if(!empty($leader->working_days))
                        <div class="leader-info-card text-center">
                            <svg class="w-6 h-6 mx-auto mb-3" style="color: var(--gold);" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                            </svg>
                            <p class="text-xs uppercase tracking-wider mb-1" style="color: var(--text-muted);">
                                @if(session('lang') == 'ru') График работы @elseif(session('lang') == 'en') Working days @else Рӯзҳои корӣ @endif
                            </p>
                            <p class="text-white font-medium">{{ $leader->working_days }}</p>
                        </div>
                    @endif
                </div>
            </div>
        </section>
    @endif

    {{-- Биография --}}
    <section class="py-16 px-6">
        <div class="max-w-4xl mx-auto">
            <h2 class="display-font text-2xl font-bold text-white mb-6 pb-3"
                style="border-left: 3px solid var(--gold); padding-left: 16px;">
                @if(session('lang') == 'ru') Биография
                @elseif(session('lang') == 'en') Biography
                @else Биография @endif
            </h2>
            <div class="biography-content text-lg">
                @if(session('lang') == 'ru') {!! $leader->text_ru !!}
                @elseif(session('lang') == 'en') {!! $leader->text_en !!}
                @else {!! $leader->text_tj !!} @endif
            </div>
        </div>
    </section>
@endsection
