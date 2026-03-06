@extends('frontend.master')

@section('title')
    @trans('contact')
@endsection

@php
    $siteSettings = App\Models\Setting::find(1);
@endphp

@push('styles')
    <style>
        .contact-card {
            background: var(--dark-card);
            border: 1px solid var(--dark-border);
            border-radius: 16px;
            padding: 32px;
            text-align: center;
            transition: all 0.3s ease;
        }

        .contact-card:hover {
            transform: translateY(-4px);
            border-color: var(--gold);
            box-shadow: 0 16px 40px rgba(0, 0, 0, 0.4);
        }

        .contact-icon {
            width: 56px;
            height: 56px;
            border-radius: 14px;
            background: var(--gold-dim);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
        }
    </style>
@endpush

@section('content')
    {{-- Заголовок --}}
    <section class="pt-16 pb-12 px-6" style="background: var(--dark-surface); border-bottom: 1px solid var(--dark-border);">
        <div class="max-w-7xl mx-auto text-center">
            <p class="text-sm uppercase tracking-widest mb-3" style="color: var(--gold);">@trans('contact')</p>
            <h1 class="display-font text-5xl md:text-6xl font-bold mb-4 text-white">@trans('contact')</h1>
            <div class="gold-divider"></div>
        </div>
    </section>

    {{-- Контактная информация --}}
    <section class="py-16 px-6">
        <div class="max-w-7xl mx-auto">
            <div class="grid md:grid-cols-3 gap-8 mb-16">
                {{-- Телефон --}}
                <div class="contact-card">
                    <div class="contact-icon">
                        <svg class="w-7 h-7" style="color: var(--gold);" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                        </svg>
                    </div>
                    <h3 class="display-font text-xl font-bold text-white mb-3">
                        @if(session()->get('lang') == 'ru') Телефон @elseif(session()->get('lang') == 'en') Phone @else Телефон @endif
                    </h3>
                    <a href="tel:+{{ $siteSettings->phone }}" class="text-gray-400 hover:underline">{{ $siteSettings->phone }}</a>
                </div>

                {{-- Email --}}
                <div class="contact-card">
                    <div class="contact-icon">
                        <svg class="w-7 h-7" style="color: var(--gold);" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                        </svg>
                    </div>
                    <h3 class="display-font text-xl font-bold text-white mb-3">Email</h3>
                    <a href="mailto:{{ $siteSettings->email }}" class="text-gray-400 hover:underline">{{ $siteSettings->email }}</a>
                </div>

                {{-- Адрес --}}
                <div class="contact-card">
                    <div class="contact-icon">
                        <svg class="w-7 h-7" style="color: var(--gold);" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <h3 class="display-font text-xl font-bold text-white mb-3">
                        @if(session()->get('lang') == 'ru') Адрес @elseif(session()->get('lang') == 'en') Address @else Суроға @endif
                    </h3>
                    <p class="text-gray-400">
                        @if(session()->get('lang') == 'ru') {{ $siteSettings->street_ru }}
                        @elseif(session()->get('lang') == 'en') {{ $siteSettings->street_en }}
                        @else {{ $siteSettings->street_tj }} @endif
                    </p>
                </div>
            </div>

            {{-- Форма --}}
            <div class="max-w-3xl mx-auto">
                <div class="text-center mb-10">
                    <p class="text-sm uppercase tracking-widest mb-3" style="color: var(--gold);">@trans('contact_us')</p>
                    <h2 class="section-title">
                        @if(session()->get('lang') == 'ru') Напишите нам
                        @elseif(session()->get('lang') == 'en') Write to us
                        @else Ба мо нависед @endif
                    </h2>
                    <div class="gold-divider"></div>
                </div>

                <div style="background: var(--dark-card); border: 1px solid var(--dark-border); border-radius: 20px; padding: 40px; position: relative; overflow: hidden;">
                    <div style="position: absolute; top: 0; left: 0; right: 0; height: 3px; background: linear-gradient(90deg, var(--gold), transparent);"></div>
                    <form action="{{ route('contact_form_submit') }}" method="POST" class="form_subscribe_ajax">
                        @csrf
                        <div class="grid md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-400 mb-2">
                                    @if(session()->get('lang') == 'ru') Имя @elseif(session()->get('lang') == 'en') Name @else Ном @endif
                                </label>
                                <input type="text" name="name" required class="form-input" placeholder="@if(session()->get('lang') == 'ru')Ваше имя@elseif(session()->get('lang') == 'en')Your name@else Номи шумо@endif">
                                <span class="text-red-400 text-xs error-text name_error"></span>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-400 mb-2">Email</label>
                                <input type="email" name="email" required class="form-input" placeholder="your@email.com">
                                <span class="text-red-400 text-xs error-text email_error"></span>
                            </div>
                        </div>

                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-400 mb-2">
                                @if(session()->get('lang') == 'ru') Сообщение @elseif(session()->get('lang') == 'en') Message @else Паём @endif
                            </label>
                            <textarea name="message" required class="form-input" rows="5"
                                placeholder="@if(session()->get('lang') == 'ru')Ваше сообщение...@elseif(session()->get('lang') == 'en')Your message...@else Паёми шумо...@endif"></textarea>
                        </div>

                        <button type="submit" class="btn-primary w-full py-4 text-lg font-semibold">
                            @if(session()->get('lang') == 'ru') Отправить @elseif(session()->get('lang') == 'en') Send @else Ирсол @endif
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
