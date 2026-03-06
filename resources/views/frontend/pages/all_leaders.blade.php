@extends('frontend.master')

@section('title')
    @trans('leadership')
@endsection

@push('styles')
    <style>
        .leader-card {
            background: var(--dark-card);
            border: 1px solid var(--dark-border);
            border-radius: 16px;
            overflow: hidden;
            transition: all 0.4s ease;
        }

        .leader-card:hover {
            transform: translateY(-4px);
            border-color: var(--gold);
            box-shadow: 0 16px 40px rgba(0, 0, 0, 0.4);
        }

        .leader-photo {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            overflow: hidden;
            border: 2px solid var(--gold);
            flex-shrink: 0;
        }

        .leader-photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .leader-contact-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 14px;
            background: var(--dark-surface);
            border-radius: 8px;
            font-size: 0.85rem;
            color: var(--text-secondary);
            transition: color 0.3s;
        }

        .leader-contact-badge:hover {
            color: var(--gold);
        }

        @media (max-width: 768px) {
            .leader-inner {
                flex-direction: column;
                text-align: center;
            }

            .leader-photo {
                margin: 0 auto;
            }

            .leader-contacts-row {
                justify-content: center;
            }
        }
    </style>
@endpush

@section('content')
    {{-- Заголовок --}}
    <section class="pt-16 pb-12 px-6" style="background: var(--dark-surface); border-bottom: 1px solid var(--dark-border);">
        <div class="max-w-7xl mx-auto text-center">
            <p class="text-sm uppercase tracking-widest mb-3" style="color: var(--gold);">@trans('leadership')</p>
            <h1 class="display-font text-5xl md:text-6xl font-bold mb-4 text-white">@trans('leadership')</h1>
            <div class="gold-divider"></div>
        </div>
    </section>

    {{-- Список руководителей --}}
    <section class="py-16 px-6">
        <div class="max-w-5xl mx-auto space-y-6">
            @if($allLeaders->count())
                @foreach($allLeaders as $leader)
                    <a href="{{ route('frontend.leader.detail', $leader->id) }}" class="leader-card block">
                        <div class="flex flex-col md:flex-row items-center md:items-start gap-6 p-6 leader-inner">
                            {{-- Фото --}}
                            <div class="leader-photo">
                                @if($leader->image)
                                    <img src="{{ asset($leader->image) }}"
                                        alt="{{ session('lang')=='ru' ? $leader->title_ru : (session('lang')=='en' ? $leader->title_en : $leader->title_tj) }}">
                                @else
                                    <div class="w-full h-full flex items-center justify-center" style="background: var(--dark-surface);">
                                        <svg class="w-12 h-12 text-gray-600" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                @endif
                            </div>

                            {{-- Информация --}}
                            <div class="flex-1">
                                <h3 class="display-font text-xl font-bold text-white mb-1">
                                    @if(session('lang')=='ru') {{ $leader->title_ru }}
                                    @elseif(session('lang')=='en') {{ $leader->title_en }}
                                    @else {{ $leader->title_tj }} @endif
                                </h3>
                                <p class="text-sm mb-4" style="color: var(--gold);">
                                    @if(session('lang')=='ru') {{ $leader->position_ru }}
                                    @elseif(session('lang')=='en') {{ $leader->position_en }}
                                    @else {{ $leader->position_tj }} @endif
                                </p>

                                <div class="flex flex-wrap gap-3 leader-contacts-row">
                                    @if(!empty($leader->email))
                                        <span class="leader-contact-badge">
                                            <svg class="w-4 h-4" style="color: var(--gold);" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                            </svg>
                                            {{ $leader->email }}
                                        </span>
                                    @endif
                                    @if(!empty($leader->phone))
                                        <span class="leader-contact-badge">
                                            <svg class="w-4 h-4" style="color: var(--gold);" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                                            </svg>
                                            {{ $leader->phone }}
                                        </span>
                                    @endif
                                    @if(!empty($leader->working_days))
                                        <span class="leader-contact-badge">
                                            <svg class="w-4 h-4" style="color: var(--gold);" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                                            </svg>
                                            {{ $leader->working_days }}
                                        </span>
                                    @endif
                                </div>
                            </div>

                            {{-- Стрелка --}}
                            <div class="hidden md:flex items-center">
                                <svg class="w-5 h-5" style="color: var(--text-muted);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </div>
                        </div>
                    </a>
                @endforeach
            @else
                <div class="text-center py-16">
                    <h3 class="display-font text-2xl font-bold text-white mb-2">
                        @if(session('lang')=='ru') Список руководства пуст
                        @elseif(session('lang')=='en') Management list is empty
                        @else Рӯйхати роҳбарият холӣ аст @endif
                    </h3>
                </div>
            @endif
        </div>
    </section>
@endsection
