    <!-- Curtain Effect -->
    <div class="curtain-left" id="curtainLeft"></div>
    <div class="curtain-right" id="curtainRight"></div>

    <!-- Top Bar -->
    <div class="top-bar">
        <div class="max-w-7xl mx-auto px-6 flex items-center justify-between">
            <div class="flex items-center gap-6 text-sm">
                <a href="tel:+992000000000" class="flex items-center gap-2 text-gray-400 hover:text-gold transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                    </svg>
                    {{ $siteSettings->phone }}
                </a>
                <a href="mailto:info@borbad.tj"
                    class="hidden sm:flex items-center gap-2 text-gray-400 hover:text-gold transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    {{ $siteSettings->email }}
                </a>
            </div>
            <div class="flex items-center gap-4">
                {{-- Соцсети --}}
                <a href="{{ $siteSettings->telegram }}" class="text-gray-400 hover:text-gold transition"
                    aria-label="Telegram">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M11.944 0A12 12 0 0 0 0 12a12 12 0 0 0 12 12 12 12 0 0 0 12-12A12 12 0 0 0 12 0a12 12 0 0 0-.056 0zm4.962 7.224c.1-.002.321.023.465.14a.506.506 0 0 1 .171.325c.016.093.036.306.02.472-.18 1.898-.962 6.502-1.36 8.627-.168.9-.499 1.201-.82 1.23-.696.065-1.225-.46-1.9-.902-1.056-.693-1.653-1.124-2.678-1.8-1.185-.78-.417-1.21.258-1.91.177-.184 3.247-2.977 3.307-3.23.007-.032.014-.15-.056-.212s-.174-.041-.249-.024c-.106.024-1.793 1.14-5.061 3.345-.479.33-.913.49-1.302.48-.428-.008-1.252-.241-1.865-.44-.752-.245-1.349-.374-1.297-.789.027-.216.325-.437.893-.663 3.498-1.524 5.83-2.529 6.998-3.014 3.332-1.386 4.025-1.627 4.476-1.635z" />
                    </svg>
                </a>
                <a href="{{ $siteSettings->instagram }}" class="text-gray-400 hover:text-gold transition"
                    aria-label="Instagram">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z" />
                    </svg>
                </a>
                <a href="{{ $siteSettings->facebook }}" class="text-gray-400 hover:text-gold transition"
                    aria-label="Facebook">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                    </svg>
                </a>

                {{-- Разделитель --}}
                <div class="w-px h-4" style="background: var(--dark-border);"></div>

                {{-- Переключатель языков --}}
                <div class="lang-switcher hidden sm:flex items-center">
                    @php $currentLang = session('lang', 'tj'); @endphp
                    <a href="{{ route('tj.lang') }}" class="lang-btn {{ $currentLang == 'tj' ? 'active' : '' }}"
                        title="Тоҷикӣ">Тҷ</a>
                    <a href="{{ route('ru.lang') }}" class="lang-btn {{ $currentLang == 'ru' ? 'active' : '' }}"
                        title="Русский">Ру</a>
                    <a href="{{ route('en.lang') }}" class="lang-btn {{ $currentLang == 'en' ? 'active' : '' }}"
                        title="English">En</a>
                </div>

                {{-- Разделитель --}}
                <div class="hidden sm:block w-px h-4" style="background: var(--dark-border);"></div>

                {{-- Кнопка поиска --}}
                <button class="search-toggle" id="searchToggle" aria-label="Поиск">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>

                {{-- Разделитель --}}
                <div class="hidden sm:block w-px h-4" style="background: var(--dark-border);"></div>

                {{-- Переключатель темы --}}
                <button class="theme-toggle" id="themeToggle" aria-label="Переключить тему" title="Переключить тему">
                    <span class="theme-toggle-thumb">
                        <svg class="icon-moon" fill="var(--dark-bg)" viewBox="0 0 20 20">
                            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z" />
                        </svg>
                        <svg class="icon-sun" fill="var(--dark-bg)" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                                clip-rule="evenodd" />
                        </svg>
                    </span>
                </button>
            </div>
        </div>
    </div>

    <!-- Main Navigation -->
    <nav class="main-nav" id="mainNav">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex items-center justify-between h-20">
                {{-- Логотип --}}
                <a href="{{ route('index') }}" class="flex items-center gap-3">
                    <div class="logo-icon">
                        <svg class="w-10 h-10" viewBox="0 0 40 40" fill="none">
                            <circle cx="20" cy="20" r="18" stroke="var(--gold)" stroke-width="2" />
                            <text x="50%" y="55%" text-anchor="middle" dominant-baseline="middle" fill="var(--gold)"
                                font-family="'Playfair Display', serif" font-size="18" font-weight="700">К</text>
                        </svg>
                    </div>
                    <div>
                        <span class="display-font text-2xl font-bold text-white tracking-wider logo-text-white">
                            @if (session('lang') == 'ru')
                                Кохи Борбад
                            @elseif(session('lang') == 'en')
                                Кохи Борбад
                            @else
                                Кохи Борбад
                            @endif


                        </span>
                        <span class="hidden sm:block text-xs text-gray-400 tracking-widest uppercase">
                            @if (session('lang') == 'ru')
                                Концертный зал
                            @elseif(session('lang') == 'en')
                                Concert hall
                            @else
                                Толори консертӣ
                            @endif


                        </span>
                    </div>
                </a>

                {{-- Навигация (динамическая) --}}
                <div class="hidden lg:flex items-center gap-1">
                    <a href="{{ url('/') }}" class="nav-link">
                        @if (session('lang') == 'ru')
                            Главная
                        @elseif(session('lang') == 'en')
                            Home
                        @else
                            Асосӣ
                        @endif
                    </a>

                    @foreach ($pages as $p)
                        @php $hasSubmenu = isset($subPages[$p->id]) && $subPages[$p->id]->count() > 0; @endphp

                        @if ($hasSubmenu)
                            <div class="nav-dropdown">
                                <a href="{{ route('menu.show', $p->id) }}" class="nav-link nav-link-dropdown">
                                    @if (session('lang') == 'ru')
                                        {{ $p->title_ru }}
                                    @elseif(session('lang') == 'en')
                                        {{ $p->title_en }}
                                    @else
                                        {{ $p->title_tj }}
                                    @endif
                                    <svg class="nav-dropdown-arrow" width="10" height="10"
                                        viewBox="0 0 10 10" fill="currentColor">
                                        <path d="M2 4l3 3 3-3" />
                                    </svg>
                                </a>
                                <div class="nav-dropdown-menu">
                                    @foreach ($subPages[$p->id] as $child)
                                        <a href="{{ route('submenu.show', $child) }}" class="nav-dropdown-item">
                                            @if (session('lang') == 'ru')
                                                {{ $child->title_ru }}
                                            @elseif(session('lang') == 'en')
                                                {{ $child->title_en }}
                                            @else
                                                {{ $child->title_tj }}
                                            @endif
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @else
                            <a href="{{ route('menu.show', $p->id) }}" class="nav-link">
                                @if (session('lang') == 'ru')
                                    {{ $p->title_ru }}
                                @elseif(session('lang') == 'en')
                                    {{ $p->title_en }}
                                @else
                                    {{ $p->title_tj }}
                                @endif
                            </a>
                        @endif
                    @endforeach
                </div>

                {{-- Бургер-меню (мобильное) --}}
                <button class="lg:hidden text-white hover:text-gold transition" id="mobileMenuBtn" aria-label="Меню">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>

        {{-- Поисковая панель --}}
        <div class="search-panel" id="searchPanel">
            <div class="max-w-3xl mx-auto px-6 py-4">
                <form action="{{ route('index') }}" method="GET" class="flex items-center gap-3">
                    <div class="flex-1 relative">
                        <input type="text" name="q" placeholder="Поиск по сайту..." class="search-input"
                            autocomplete="off">
                        <svg class="w-5 h-5 absolute left-4 top-1/2 -translate-y-1/2 text-gray-500" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <button type="button" class="text-gray-400 hover:text-white transition p-2" id="searchClose">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </form>
            </div>
        </div>

        {{-- Мобильное меню --}}
        <div class="mobile-menu" id="mobileMenu">
            <div class="px-6 py-6 space-y-1">
                <a href="{{ url('/') }}" class="mobile-nav-link">
                    @if (session('lang') == 'ru')
                        Главная
                    @elseif(session('lang') == 'en')
                        Home
                    @else
                        Асосӣ
                    @endif
                </a>

                @foreach ($pages as $p)
                    @php $hasSubmenu = isset($subPages[$p->id]) && $subPages[$p->id]->count() > 0; @endphp

                    @if ($hasSubmenu)
                        <div class="mobile-nav-group">
                            <div class="mobile-nav-link mobile-nav-toggle"
                                data-target="mobileSub{{ $p->id }}">
                                @if (session('lang') == 'ru')
                                    {{ $p->title_ru }}
                                @elseif(session('lang') == 'en')
                                    {{ $p->title_en }}
                                @else
                                    {{ $p->title_tj }}
                                @endif
                                <svg class="mobile-nav-arrow" width="12" height="12" viewBox="0 0 12 12"
                                    fill="currentColor">
                                    <path d="M3 5l3 3 3-3" />
                                </svg>
                            </div>
                            <div class="mobile-submenu" id="mobileSub{{ $p->id }}">
                                <a href="{{ route('menu.show', $p->id) }}" class="mobile-nav-link mobile-nav-sub">
                                    @if (session('lang') == 'ru')
                                        Все: {{ $p->title_ru }}
                                    @elseif(session('lang') == 'en')
                                        All: {{ $p->title_en }}
                                    @else
                                        Ҳама: {{ $p->title_tj }}
                                    @endif
                                </a>
                                @foreach ($subPages[$p->id] as $child)
                                    <a href="{{ route('submenu.show', $child) }}"
                                        class="mobile-nav-link mobile-nav-sub">
                                        @if (session('lang') == 'ru')
                                            {{ $child->title_ru }}
                                        @elseif(session('lang') == 'en')
                                            {{ $child->title_en }}
                                        @else
                                            {{ $child->title_tj }}
                                        @endif
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @else
                        <a href="{{ route('menu.show', $p->id) }}" class="mobile-nav-link">
                            @if (session('lang') == 'ru')
                                {{ $p->title_ru }}
                            @elseif(session('lang') == 'en')
                                {{ $p->title_en }}
                            @else
                                {{ $p->title_tj }}
                            @endif
                        </a>
                    @endif
                @endforeach

                {{-- Переключатель темы в мобильном меню --}}
                <div class="pt-4 mt-4 px-4 flex items-center justify-between"
                    style="border-top: 1px solid var(--dark-border);">
                    <span class="text-sm" style="color: var(--text-secondary);">Светлая тема</span>
                    <button class="theme-toggle" id="themeToggleMobile" aria-label="Переключить тему">
                        <span class="theme-toggle-thumb">
                            <svg class="icon-moon" fill="var(--dark-bg)" viewBox="0 0 20 20">
                                <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z" />
                            </svg>
                            <svg class="icon-sun" fill="var(--dark-bg)" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>
                    </button>
                </div>

                {{-- Язык в мобильном меню --}}
                <div class="pt-4 mt-4" style="border-top: 1px solid var(--dark-border);">
                    <p class="text-xs text-gray-500 uppercase tracking-wider mb-3 px-4">Язык / Language</p>
                    <div class="flex items-center gap-2 px-4">
                        @php $currentLang = session('lang', 'tj'); @endphp
                        <a href="{{ route('tj.lang') }}"
                            class="lang-btn {{ $currentLang == 'tj' ? 'active' : '' }}">Тоҷикӣ</a>
                        <a href="{{ route('ru.lang') }}"
                            class="lang-btn {{ $currentLang == 'ru' ? 'active' : '' }}">Русский</a>
                        <a href="{{ route('en.lang') }}"
                            class="lang-btn {{ $currentLang == 'en' ? 'active' : '' }}">English</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
