    @php
        $footerLocale = session('lang') == 'ru' ? 'ru' : (session('lang') == 'en' ? 'en' : 'tj');
        $footerAddressDefault = \App\Models\StaticTranslation::trans('footer_address_default');
        $footerAddress =
            isset($siteSettings) && $siteSettings
                ? $siteSettings->{'street_' . $footerLocale} ?? ($siteSettings->street_ru ?? $footerAddressDefault)
                : $footerAddressDefault;
        $footerPhone = isset($siteSettings) && $siteSettings?->phone ? $siteSettings->phone : '+992 XX XXX XXXX';
        $footerEmail = isset($siteSettings) && $siteSettings?->email ? $siteSettings->email : 'info@borbad.tj';
        $footerHoursWeekdays =
            isset($siteSettings) && $siteSettings?->working_hours_weekdays
                ? $siteSettings->working_hours_weekdays
                : '10:00 — 20:00';
        $footerHoursWeekend =
            isset($siteSettings) && $siteSettings?->working_hours_weekend
                ? $siteSettings->working_hours_weekend
                : '12:00 — 21:00';
        $footerBoxNote =
            isset($siteSettings) && $siteSettings?->working_hours_box
                ? $siteSettings->working_hours_box
                : \App\Models\StaticTranslation::trans('footer_box_note');
    @endphp
    <footer class="pt-16 pb-8 px-6"
        style="background: linear-gradient(180deg, var(--dark-surface) 0%, var(--dark-bg) 100%); border-top: 1px solid var(--dark-border);">
        <div class="max-w-7xl mx-auto">
            <div class="w-full h-px mb-12"
                style="background: linear-gradient(90deg, transparent 10%, var(--gold) 50%, transparent 90%); opacity: 0.5;">
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-10 mb-12">
                <div>
                    <div class="flex items-center gap-3 mb-5">
                        <div>
                            <svg class="w-10 h-10" viewBox="0 0 40 40" fill="none">
                                <circle cx="20" cy="20" r="18" stroke="var(--gold)" stroke-width="2" />
                                <text x="50%" y="55%" text-anchor="middle" dominant-baseline="middle" fill="var(--gold)"
                                    font-family="'Roboto', sans-serif" font-size="18" font-weight="700">К</text>
                            </svg>
                        </div>
                        <div>
                            <span class="display-font text-xl font-bold tracking-wider" style="color: var(--text-primary);">
                                @if (session('lang') == 'ru')
                                    Кохи Борбад
                                @elseif(session('lang') == 'en')
                                    Кохи Борбад
                                @else
                                    Кохи Борбад
                                @endif
                            </span>
                        </div>
                    </div>
                    <p class="text-gray-400 text-sm leading-relaxed mb-6">
                        @trans('footer_description')
                    </p>
                    <div class="flex items-center gap-3">
                        @if (isset($siteSettings) && $siteSettings?->telegram)
                            <a href="{{ $siteSettings->telegram }}" target="_blank" rel="noopener noreferrer"
                                class="w-9 h-9 rounded-lg flex items-center justify-center transition-all hover:scale-110"
                                style="background: var(--gold-dim); color: var(--gold);" aria-label="Telegram">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M11.944 0A12 12 0 0 0 0 12a12 12 0 0 0 12 12 12 12 0 0 0 12-12A12 12 0 0 0 12 0a12 12 0 0 0-.056 0zm4.962 7.224c.1-.002.321.023.465.14a.506.506 0 0 1 .171.325c.016.093.036.306.02.472-.18 1.898-.962 6.502-1.36 8.627-.168.9-.499 1.201-.82 1.23-.696.065-1.225-.46-1.9-.902-1.056-.693-1.653-1.124-2.678-1.8-1.185-.78-.417-1.21.258-1.91.177-.184 3.247-2.977 3.307-3.23.007-.032.014-.15-.056-.212s-.174-.041-.249-.024c-.106.024-1.793 1.14-5.061 3.345-.479.33-.913.49-1.302.48-.428-.008-1.252-.241-1.865-.44-.752-.245-1.349-.374-1.297-.789.027-.216.325-.437.893-.663 3.498-1.524 5.83-2.529 6.998-3.014 3.332-1.386 4.025-1.627 4.476-1.635z" />
                                </svg>
                            </a>
                        @endif
                        @if (isset($siteSettings) && $siteSettings?->instagram)
                            <a href="{{ $siteSettings->instagram }}" target="_blank" rel="noopener noreferrer"
                                class="w-9 h-9 rounded-lg flex items-center justify-center transition-all hover:scale-110"
                                style="background: var(--gold-dim); color: var(--gold);" aria-label="Instagram">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z" />
                                </svg>
                            </a>
                        @endif
                        @if (isset($siteSettings) && $siteSettings?->facebook)
                            <a href="{{ $siteSettings->facebook }}" target="_blank" rel="noopener noreferrer"
                                class="w-9 h-9 rounded-lg flex items-center justify-center transition-all hover:scale-110"
                                style="background: var(--gold-dim); color: var(--gold);" aria-label="Facebook">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                                </svg>
                            </a>
                        @endif
                        @if (!isset($siteSettings) || (!$siteSettings?->telegram && !$siteSettings?->instagram && !$siteSettings?->facebook))
                            <a href="#"
                                class="w-9 h-9 rounded-lg flex items-center justify-center transition-all hover:scale-110"
                                style="background: var(--gold-dim); color: var(--gold);" aria-label="Telegram">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M11.944 0A12 12 0 0 0 0 12a12 12 0 0 0 12 12 12 12 0 0 0 12-12A12 12 0 0 0 12 0a12 12 0 0 0-.056 0zm4.962 7.224c.1-.002.321.023.465.14a.506.506 0 0 1 .171.325c.016.093.036.306.02.472-.18 1.898-.962 6.502-1.36 8.627-.168.9-.499 1.201-.82 1.23-.696.065-1.225-.46-1.9-.902-1.056-.693-1.653-1.124-2.678-1.8-1.185-.78-.417-1.21.258-1.91.177-.184 3.247-2.977 3.307-3.23.007-.032.014-.15-.056-.212s-.174-.041-.249-.024c-.106.024-1.793 1.14-5.061 3.345-.479.33-.913.49-1.302.48-.428-.008-1.252-.241-1.865-.44-.752-.245-1.349-.374-1.297-.789.027-.216.325-.437.893-.663 3.498-1.524 5.83-2.529 6.998-3.014 3.332-1.386 4.025-1.627 4.476-1.635z" />
                                </svg>
                            </a>
                            <a href="#"
                                class="w-9 h-9 rounded-lg flex items-center justify-center transition-all hover:scale-110"
                                style="background: var(--gold-dim); color: var(--gold);" aria-label="Instagram">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z" />
                                </svg>
                            </a>
                            <a href="#"
                                class="w-9 h-9 rounded-lg flex items-center justify-center transition-all hover:scale-110"
                                style="background: var(--gold-dim); color: var(--gold);" aria-label="Facebook">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                                </svg>
                            </a>
                        @endif
                    </div>
                </div>

                <div>
                    <h4 class="text-sm font-semibold uppercase tracking-wider mb-5" style="color: var(--gold);">
                        @trans('footer_navigation')</h4>
                    <ul class="space-y-3">
                        @if (isset($pages) && $pages->count())
                            @foreach ($pages as $p)
                                <li>
                                    <a href="{{ route('menu.show', $p->id) }}"
                                        class="text-gray-400 hover:opacity-80 transition text-sm flex items-center gap-2" style="color: var(--text-secondary);">
                                        <span class="w-1 h-1 rounded-full" style="background: var(--gold);"></span>
                                        @if (session('lang') == 'ru')
                                            {{ $p->title_ru }}
                                        @elseif(session('lang') == 'en')
                                            {{ $p->title_en }}
                                        @else
                                            {{ $p->title_tj }}
                                        @endif
                                    </a>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>

                <div>
                    <h4 class="text-sm font-semibold uppercase tracking-wider mb-5" style="color: var(--gold);">
                        @trans('footer_contacts')</h4>
                    <ul class="space-y-4">
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 mt-0.5 flex-shrink-0" style="color: var(--gold);" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span class="text-sm" style="color: var(--text-secondary);">{!! nl2br(e($footerAddress)) !!}</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 mt-0.5 flex-shrink-0" style="color: var(--gold);" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            <a href="tel:{{ preg_replace('/\s+/', '', $footerPhone) }}"
                                class="text-sm transition hover:opacity-80" style="color: var(--text-secondary);">{{ $footerPhone }}</a>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 mt-0.5 flex-shrink-0" style="color: var(--gold);" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <a href="mailto:{{ $footerEmail }}"
                                class="text-sm transition hover:opacity-80" style="color: var(--text-secondary);">{{ $footerEmail }}</a>
                        </li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-sm font-semibold uppercase tracking-wider mb-5" style="color: var(--gold);">
                        @trans('footer_working_hours')</h4>
                    <ul class="space-y-3">
                        <li class="flex items-center justify-between text-sm">
                            <span class="text-gray-400">@trans('footer_weekdays')</span>
                            <span class="font-medium" style="color: var(--text-primary);">{{ $footerHoursWeekdays }}</span>
                        </li>
                        <li class="flex items-center justify-between text-sm">
                            <span class="text-gray-400">@trans('footer_weekend')</span>
                            <span class="font-medium" style="color: var(--text-primary);">{{ $footerHoursWeekend }}</span>
                        </li>
                    </ul>

                    <div class="mt-6 p-4 rounded-xl"
                        style="background: var(--gold-dim); border: 1px solid var(--dark-border);">
                        <p class="text-sm" style="color: var(--gold);">{{ $footerBoxNote }}</p>
                    </div>
                </div>
            </div>

            <div class="pt-8" style="border-top: 1px solid var(--dark-border);">
                <div class="flex flex-col md:flex-row items-center justify-between gap-4">
                    <p class="text-gray-500 text-sm">
                        &copy; {{ date('Y') }} Борбад. @trans('footer_copyright')
                    </p>
                    <p class="text-gray-600 text-xs">
                        @trans('footer_bottom_text')
                    </p>
                </div>
            </div>
        </div>
    </footer>
