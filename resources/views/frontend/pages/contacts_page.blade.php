@extends('frontend.master')

@section('title', 'Контакты - Борбад')

@section('content')
    {{-- Header — по макету contacts.html, без формы и без блока «Как нас найти» --}}
    <section class="pt-16 pb-12 px-6" style="background: var(--dark-surface); border-bottom: 1px solid var(--dark-border);">
        <div class="max-w-7xl mx-auto text-center">
            <p class="text-sm uppercase tracking-widest mb-3" style="color: var(--gold);">Свяжитесь с нами</p>
            <h1 class="display-font text-5xl md:text-6xl font-bold mb-4 text-white">Контакты</h1>
            <div class="gold-divider"></div>
            <p class="text-lg text-gray-400 mt-4">Мы всегда рады вашим вопросам и предложениям</p>
        </div>
    </section>

    {{-- Контактные карточки: адрес, телефон, email — из настроек сайта --}}
    <section class="py-16 px-6 section-dark">
        <div class="max-w-7xl mx-auto">
            <div class="grid md:grid-cols-3 gap-8 mb-16">
                {{-- Адрес --}}
                <div class="text-center p-8 rounded-2xl transition-all duration-300 hover:-translate-y-2"
                    style="background: var(--dark-card); border: 1px solid var(--dark-border);">
                    <div class="w-14 h-14 mx-auto mb-5 rounded-xl flex items-center justify-center"
                        style="background: var(--gold-dim);">
                        <svg class="w-7 h-7" style="color: var(--gold);" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <h3 class="display-font text-xl font-bold mb-3 text-white">Адрес</h3>
                    <p class="text-gray-400">
                        @if (isset($settings) && $settings->street_ru)
                            {!! nl2br(e($settings->street_ru)) !!}
                        @else
                            г. Душанбе<br />Таджикистан<br />ул. Рудаки, 42
                        @endif
                    </p>
                </div>

                {{-- Телефон --}}
                <div class="text-center p-8 rounded-2xl transition-all duration-300 hover:-translate-y-2"
                    style="background: var(--dark-card); border: 1px solid var(--dark-border);">
                    <div class="w-14 h-14 mx-auto mb-5 rounded-xl flex items-center justify-center"
                        style="background: var(--gold-dim);">
                        <svg class="w-7 h-7" style="color: var(--gold);" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                        </svg>
                    </div>
                    <h3 class="display-font text-xl font-bold mb-3 text-white">Телефон</h3>
                    <p class="text-gray-400">
                        @if (isset($settings) && $settings->phone)
                            {!! nl2br(e($settings->phone)) !!}
                        @else
                            +992 XX XXX XXXX<br />+992 XX XXX YYYY<br />Касса: +992 XX XXX ZZZZ
                        @endif
                    </p>
                </div>

                {{-- Email --}}
                <div class="text-center p-8 rounded-2xl transition-all duration-300 hover:-translate-y-2"
                    style="background: var(--dark-card); border: 1px solid var(--dark-border);">
                    <div class="w-14 h-14 mx-auto mb-5 rounded-xl flex items-center justify-center"
                        style="background: var(--gold-dim);">
                        <svg class="w-7 h-7" style="color: var(--gold);" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                        </svg>
                    </div>
                    <h3 class="display-font text-xl font-bold mb-3 text-white">Email</h3>
                    <p class="text-gray-400">
                        @if (isset($settings) && $settings->email)
                            {{ $settings->email }}
                        @else
                            info@borbad.tj<br />tickets@borbad.tj<br />pr@borbad.tj
                        @endif
                    </p>
                </div>
            </div>

            {{-- Режим работы — из настроек или значения по умолчанию --}}
            <div class="max-w-2xl mx-auto p-8 rounded-2xl"
                style="background: var(--dark-card); border: 1px solid var(--dark-border);">
                <h3 class="display-font text-2xl font-bold text-center mb-6 text-white">@trans('footer_working_hours')</h3>
                <div class="grid md:grid-cols-2 gap-4">
                    <div class="flex justify-between items-center p-4 rounded-xl" style="background: var(--dark-surface);">
                        <span class="text-gray-400">@trans('footer_weekdays')</span>
                        <span class="text-white font-medium">
                            {{ isset($settings) && $settings->working_hours_weekdays ? $settings->working_hours_weekdays : '08:00 — 20:00' }}
                        </span>
                    </div>
                    <div class="flex justify-between items-center p-4 rounded-xl" style="background: var(--dark-surface);">
                        <span class="text-gray-400">@trans('footer_weekend')</span>
                        <span class="text-white font-medium">
                            {{ isset($settings) && $settings->working_hours_weekend ? $settings->working_hours_weekend : '12:00 — 21:00' }}
                        </span>
                    </div>
                    <div class="flex justify-between items-center p-4 rounded-xl md:col-span-2"
                        style="background: var(--dark-surface);">
                        <span class="text-gray-400">@trans('cashbox')</span>
                        <span class="font-medium" style="color: var(--gold);">
                            {{ isset($settings) && $settings->working_hours_box ? $settings->working_hours_box : \App\Models\StaticTranslation::trans('cashbox_hours') }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
