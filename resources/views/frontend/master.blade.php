<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        @yield('title', 'Борбад - Театрально-концертный зал')
    </title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    {{-- Toastr CSS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.css">

    <style>
        :root {
            /* Тёплые тёмные тона — как зрительный зал театра */
            --dark-bg: #0F0E0C;
            --dark-surface: #181614;
            --dark-card: #1F1D1A;
            --dark-border: #2D2A25;
            --dark-hover: #282520;

            /* Золото — благородное, насыщенное */
            --gold: #D4A843;
            --gold-light: #E8CC7A;
            --gold-dim: rgba(212, 168, 67, 0.12);
            --gold-glow: rgba(212, 168, 67, 0.06);

            /* Бархатный акцент — глубокий бордо */
            --velvet: #6B1D2A;
            --velvet-dim: rgba(107, 29, 42, 0.15);

            /* Текст */
            --text-primary: #F0EDE8;
            --text-secondary: #9B9590;
            --text-muted: #5C5650;
        }

        /* ===== Светлая тема ===== */
        [data-theme="light"] {
            --dark-bg: #FAFAF8;
            --dark-surface: #FFFFFF;
            --dark-card: #FFFFFF;
            --dark-border: #E5E2DC;
            --dark-hover: #F0EDE8;

            --gold: #B8922E;
            --gold-light: #D4A843;
            --gold-dim: rgba(184, 146, 46, 0.10);
            --gold-glow: rgba(184, 146, 46, 0.06);

            --velvet: #8B2E3D;
            --velvet-dim: rgba(139, 46, 61, 0.10);

            --text-primary: #1A1816;
            --text-secondary: #5C5650;
            --text-muted: #9B9590;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background: var(--dark-bg);
            color: var(--text-primary);
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        /* Тонкая золотая линия вверху страницы */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, transparent 5%, var(--gold) 50%, transparent 95%);
            z-index: 9999;
            opacity: 0.7;
        }

        .display-font {
            font-family: 'Roboto', sans-serif;
        }

        .body-font {
            font-family: 'Roboto', sans-serif;
        }

        /* Кастомный скроллбар */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: var(--dark-bg);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--dark-border);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--gold);
        }

        /* Плавное выделение текста */
        ::selection {
            background: var(--gold);
            color: var(--dark-bg);
        }

        /* ===== Curtain Effect ===== */
        .curtain-left,
        .curtain-right {
            position: fixed;
            top: 0;
            width: 50%;
            height: 100vh;
            background: linear-gradient(135deg, var(--dark-bg) 0%, #1A1410 50%, var(--dark-bg) 100%);
            z-index: 99999;
            transition: transform 1.8s cubic-bezier(0.77, 0, 0.175, 1);
        }

        .curtain-left {
            left: 0;
        }

        .curtain-right {
            right: 0;
        }

        .curtain-left.open {
            transform: translateX(-100%);
        }

        .curtain-right.open {
            transform: translateX(100%);
        }

        /* ===== Top Bar ===== */
        .top-bar {
            background: var(--dark-bg);
            border-bottom: 1px solid var(--dark-border);
            padding: 8px 0;
            position: fixed;
            top: 2px;
            /* под золотой линией */
            left: 0;
            right: 0;
            z-index: 100;
        }

        /* ===== Main Navigation ===== */
        .main-nav {
            position: fixed;
            top: 43px;
            left: 0;
            right: 0;
            z-index: 99;
            background: rgba(15, 14, 12, 0.92);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border-bottom: 1px solid var(--dark-border);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        [data-theme="light"] .main-nav {
            background: rgba(250, 250, 248, 0.92);
        }

        .main-nav.scrolled {
            top: 2px;
            background: rgba(15, 14, 12, 0.97);
            box-shadow: 0 8px 40px rgba(0, 0, 0, 0.6);
        }

        [data-theme="light"] .main-nav.scrolled {
            background: rgba(250, 250, 248, 0.97);
            box-shadow: 0 8px 40px rgba(0, 0, 0, 0.08);
        }

        .nav-link {
            position: relative;
            color: var(--text-secondary);
            font-size: 0.8rem;
            font-weight: 500;
            padding: 10px 16px;
            border-radius: 6px;
            transition: all 0.3s ease;
            text-decoration: none;
            letter-spacing: 1.2px;
            text-transform: uppercase;
        }

        .nav-link:hover,
        .nav-link.active {
            color: var(--gold);
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 4px;
            left: 16px;
            right: 16px;
            height: 2px;
            background: var(--gold);
            transform: scaleX(0);
            transform-origin: center;
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .nav-link:hover::after {
            transform: scaleX(1);
        }

        /* ===== Desktop Dropdown ===== */
        .nav-dropdown {
            position: relative;
        }

        .nav-link-dropdown {
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }

        .nav-dropdown-arrow {
            transition: transform 0.25s ease;
            opacity: 0.6;
        }

        .nav-dropdown:hover .nav-dropdown-arrow {
            transform: rotate(180deg);
            opacity: 1;
        }

        .nav-dropdown-menu {
            position: absolute;
            top: 100%;
            left: 50%;
            transform: translateX(-50%) translateY(4px);
            min-width: 220px;
            background: var(--dark-card);
            border: 1px solid var(--dark-border);
            border-radius: 10px;
            padding: 6px 0;
            box-shadow: 0 16px 48px rgba(0, 0, 0, 0.35);
            opacity: 0;
            visibility: hidden;
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 200;
        }

        [data-theme="light"] .nav-dropdown-menu {
            box-shadow: 0 16px 48px rgba(0, 0, 0, 0.1);
        }

        .nav-dropdown:hover .nav-dropdown-menu {
            opacity: 1;
            visibility: visible;
            transform: translateX(-50%) translateY(0);
        }

        .nav-dropdown-item {
            display: block;
            padding: 10px 20px;
            color: var(--text-secondary);
            font-size: 0.82rem;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.2s ease;
            white-space: nowrap;
        }

        .nav-dropdown-item:hover {
            color: var(--gold);
            background: var(--gold-dim);
            padding-left: 24px;
        }

        /* ===== Language Switcher ===== */
        .lang-switcher {
            gap: 2px;
        }

        .lang-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 4px 10px;
            font-size: 0.72rem;
            font-weight: 500;
            letter-spacing: 0.04em;
            text-transform: uppercase;
            color: var(--text-secondary);
            background: transparent;
            border: 1px solid transparent;
            border-radius: 4px;
            text-decoration: none;
            transition: all 0.25s ease;
            line-height: 1;
        }

        .lang-btn:hover {
            color: var(--gold);
            background: var(--gold-dim);
            border-color: rgba(212, 168, 67, 0.2);
        }

        .lang-btn.active {
            color: var(--gold);
            background: var(--gold-dim);
            border-color: var(--gold);
        }

        /* ===== Search ===== */
        .search-toggle {
            color: var(--text-secondary);
            padding: 8px;
            border-radius: 50%;
            transition: all 0.3s ease;
            background: transparent;
            border: 1px solid transparent;
            cursor: pointer;
        }

        .search-toggle:hover {
            color: var(--gold);
            border-color: var(--gold-dim);
            background: var(--gold-dim);
        }

        .search-panel {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.4s ease;
            background: var(--dark-surface);
            border-top: 1px solid var(--dark-border);
        }

        .search-panel.open {
            max-height: 100px;
        }

        .search-input {
            width: 100%;
            padding: 12px 16px 12px 48px;
            background: var(--dark-bg);
            border: 1px solid var(--dark-border);
            border-radius: 10px;
            color: var(--text-primary);
            font-size: 0.95rem;
            transition: all 0.3s ease;
            outline: none;
        }

        .search-input:focus {
            border-color: var(--gold);
            box-shadow: 0 0 0 3px var(--gold-dim);
        }

        .search-input::placeholder {
            color: var(--text-muted);
        }

        /* ===== Mobile Menu ===== */
        .mobile-menu {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.5s ease;
            background: var(--dark-surface);
        }

        .mobile-menu.open {
            max-height: 80vh;
            overflow-y: auto;
        }

        .mobile-nav-link {
            display: block;
            padding: 14px 16px;
            color: var(--text-secondary);
            font-size: 1rem;
            font-weight: 500;
            border-radius: 8px;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .mobile-nav-link:hover {
            color: var(--gold);
            background: var(--gold-dim);
        }

        /* Mobile dropdown accordion */
        .mobile-nav-toggle {
            display: flex;
            align-items: center;
            justify-content: space-between;
            cursor: pointer;
        }

        .mobile-nav-arrow {
            transition: transform 0.3s ease;
            opacity: 0.5;
        }

        .mobile-nav-toggle.open .mobile-nav-arrow {
            transform: rotate(180deg);
            opacity: 1;
        }

        .mobile-submenu {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.35s ease;
        }

        .mobile-submenu.open {
            max-height: 500px;
        }

        .mobile-nav-sub {
            padding-left: 32px;
            font-size: 0.9rem;
            color: var(--text-muted);
        }

        .mobile-nav-sub:hover {
            color: var(--gold);
        }

        /* ===== Hero gradient text ===== */
        .gradient-text {
            background: linear-gradient(135deg, var(--gold), var(--gold-light));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* ===== Decorative line ===== */
        .decorative-line {
            width: 60px;
            height: 2px;
            background: var(--gold);
            margin: 1rem auto;
        }

        /* ===== Animations ===== */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in-up {
            animation: fadeInUp 0.8s ease-out forwards;
            opacity: 0;
        }

        .delay-100 {
            animation-delay: 0.1s;
        }

        .delay-200 {
            animation-delay: 0.2s;
        }

        .delay-300 {
            animation-delay: 0.3s;
        }

        .delay-400 {
            animation-delay: 0.4s;
        }

        .delay-500 {
            animation-delay: 0.5s;
        }

        /* ===== Event card ===== */
        .event-card {
            background: var(--dark-card);
            border: 1px solid var(--dark-border);
            border-radius: 16px;
            overflow: hidden;
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .event-card:hover {
            transform: translateY(-8px);
            border-color: rgba(212, 168, 67, 0.4);
            box-shadow:
                0 24px 48px rgba(0, 0, 0, 0.4),
                0 0 60px var(--gold-glow),
                inset 0 1px 0 rgba(212, 168, 67, 0.1);
        }

        /* ===== Buttons ===== */
        .btn-primary {
            background: linear-gradient(135deg, var(--gold) 0%, #BF9A38 100%);
            color: var(--dark-bg);
            font-weight: 600;
            padding: 14px 36px;
            border-radius: 8px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            display: inline-block;
            text-decoration: none;
            border: none;
            cursor: pointer;
            letter-spacing: 0.3px;
            position: relative;
            overflow: hidden;
        }

        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.15), transparent);
            transition: left 0.5s ease;
        }

        .btn-primary:hover::before {
            left: 100%;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, var(--gold-light) 0%, var(--gold) 100%);
            transform: translateY(-2px);
            box-shadow: 0 12px 32px rgba(212, 168, 67, 0.25);
        }

        .btn-outline {
            background: transparent;
            color: var(--gold);
            font-weight: 600;
            padding: 14px 36px;
            border-radius: 8px;
            border: 1.5px solid var(--gold);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            display: inline-block;
            text-decoration: none;
            cursor: pointer;
            letter-spacing: 0.3px;
        }

        .btn-outline:hover {
            background: var(--gold);
            color: var(--dark-bg);
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(212, 168, 67, 0.2);
        }

        /* ===== Section headings ===== */
        .section-title {
            font-family: 'Roboto', sans-serif;
            font-size: 2.8rem;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 0.5rem;
            line-height: 1.2;
        }

        .section-subtitle {
            color: var(--text-secondary);
            font-size: 1.1rem;
            margin-top: 1rem;
            line-height: 1.6;
        }

        /* ===== Gold accent divider ===== */
        .gold-divider {
            width: 80px;
            height: 2px;
            background: linear-gradient(90deg, transparent, var(--gold), transparent);
            margin: 1.2rem auto;
        }

        /* ===== Scroll indicator ===== */
        @keyframes bounce {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(8px);
            }
        }

        .scroll-indicator {
            animation: bounce 2s infinite;
        }

        /* ===== Form styles ===== */
        .form-input {
            width: 100%;
            padding: 14px 18px;
            background: var(--dark-bg);
            border: 1px solid var(--dark-border);
            border-radius: 10px;
            color: var(--text-primary);
            font-size: 0.95rem;
            transition: all 0.3s ease;
            outline: none;
        }

        .form-input:focus {
            border-color: var(--gold);
            box-shadow: 0 0 0 3px var(--gold-dim);
            background: rgba(15, 14, 12, 0.8);
        }

        .form-input::placeholder {
            color: var(--text-muted);
        }

        /* Select стилизация */
        select.form-input {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%239B9590' d='M6 8L1 3h10z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 16px center;
            padding-right: 40px;
        }

        /* ===== Утилиты ===== */
        .text-gold {
            color: var(--gold);
        }

        .bg-dark-surface {
            background: var(--dark-surface);
        }

        .border-dark {
            border-color: var(--dark-border);
        }

        /* ===== Theme Toggle ===== */
        .theme-toggle {
            position: relative;
            width: 44px;
            height: 24px;
            background: var(--dark-border);
            border: 1px solid var(--dark-border);
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
            flex-shrink: 0;
        }

        .theme-toggle:hover {
            border-color: var(--gold);
        }

        .theme-toggle-thumb {
            position: absolute;
            top: 2px;
            left: 2px;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            background: var(--gold);
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .theme-toggle-thumb svg {
            width: 11px;
            height: 11px;
        }

        [data-theme="light"] .theme-toggle-thumb {
            transform: translateX(20px);
        }

        .theme-toggle .icon-moon,
        [data-theme="light"] .theme-toggle .icon-sun {
            display: none;
        }

        .theme-toggle .icon-sun,
        [data-theme="light"] .theme-toggle .icon-moon {
            display: block;
        }

        /* Светлая тема: адаптация текста логотипа */
        [data-theme="light"] .logo-text-white {
            color: var(--text-primary) !important;
        }

        /* Светлая тема: мобильное меню кнопка */
        [data-theme="light"] #mobileMenuBtn {
            color: var(--text-primary);
        }

        /* Светлая тема: curtain */
        [data-theme="light"] .curtain-left,
        [data-theme="light"] .curtain-right {
            background: linear-gradient(135deg, #FAFAF8 0%, #F0EDE8 50%, #FAFAF8 100%);
        }

        /* Светлая тема: белый текст на светлом фоне — заменяем на читаемый */
        [data-theme="light"] .text-white {
            color: var(--text-primary) !important;
        }

        /* Исключение: hero с тёмным оверлеем — текст остаётся белым */
        [data-theme="light"] .hero-slide-caption,
        [data-theme="light"] .hero-slide-caption * {
            color: #fff !important;
        }

        [data-theme="light"] #searchClose:hover {
            color: var(--text-primary) !important;
        }

        /* ===== Responsiveness ===== */
        @media (max-width: 768px) {
            .section-title {
                font-size: 2rem;
            }

            body::before {
                height: 2px;
            }
        }
    </style>

    {{-- Стили отдельных страниц --}}
    @stack('styles')

    {{-- Мгновенное применение сохранённой темы (до рендера — без мерцания). По умолчанию — светлая тема. --}}
    <script>
        (function() {
            var theme = localStorage.getItem('borbad_theme');
            if (theme !== 'dark') {
                document.documentElement.setAttribute('data-theme', 'light');
            }
        })();
    </script>
</head>

<body>

    @include('frontend.inc.header')

    {{-- Отступ под фиксированную навигацию --}}
    <div style="height: 125px;"></div>

    @yield('content')

    @include('frontend.inc.footer')

    {{-- jQuery + Toastr --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.js"></script>
    <script>
        toastr.options = {
            closeButton: true,
            progressBar: true,
            positionClass: 'toast-top-right',
            preventDuplicates: true,
            showDuration: 300,
            hideDuration: 500,
            timeOut: 5000,
            extendedTimeOut: 2000,
            showEasing: 'swing',
            hideEasing: 'linear',
            showMethod: 'fadeIn',
            hideMethod: 'fadeOut'
        };

        @if (Session::has('message'))
            let type = "{{ Session::get('alert-type', 'info') }}";
            switch (type) {
                case 'info':
                    toastr.info("{{ Session::get('message') }}");
                    break;
                case 'success':
                    toastr.success("{{ Session::get('message') }}");
                    break;
                case 'warning':
                    toastr.warning("{{ Session::get('message') }}");
                    break;
                case 'error':
                    toastr.error("{{ Session::get('message') }}");
                    break;
            }
        @endif
    </script>

    <script>
        // Анимация занавеса
        window.addEventListener('load', () => {
            setTimeout(() => {
                const left = document.getElementById('curtainLeft');
                const right = document.getElementById('curtainRight');
                if (left) left.classList.add('open');
                if (right) right.classList.add('open');
            }, 300);
        });

        // Мобильное меню
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const mobileMenu = document.getElementById('mobileMenu');
        if (mobileMenuBtn && mobileMenu) {
            mobileMenuBtn.addEventListener('click', () => {
                mobileMenu.classList.toggle('open');
            });
        }

        // Мобильное подменю (аккордеон)
        document.querySelectorAll('.mobile-nav-toggle').forEach(function(toggle) {
            toggle.addEventListener('click', function() {
                var targetId = this.getAttribute('data-target');
                var submenu = document.getElementById(targetId);
                if (submenu) {
                    this.classList.toggle('open');
                    submenu.classList.toggle('open');
                }
            });
        });

        // Поиск
        const searchToggle = document.getElementById('searchToggle');
        const searchPanel = document.getElementById('searchPanel');
        const searchClose = document.getElementById('searchClose');

        if (searchToggle && searchPanel) {
            searchToggle.addEventListener('click', () => {
                searchPanel.classList.toggle('open');
                if (searchPanel.classList.contains('open')) {
                    searchPanel.querySelector('input')?.focus();
                }
            });
        }
        if (searchClose && searchPanel) {
            searchClose.addEventListener('click', () => {
                searchPanel.classList.remove('open');
            });
        }

        // Скрытие top bar при скролле
        const mainNav = document.getElementById('mainNav');
        let lastScroll = 0;

        window.addEventListener('scroll', () => {
            const currentScroll = window.scrollY;
            if (mainNav) {
                if (currentScroll > 60) {
                    mainNav.classList.add('scrolled');
                } else {
                    mainNav.classList.remove('scrolled');
                }
            }
            lastScroll = currentScroll;
        });

        // Плавная прокрутка по якорям
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            });
        });
    </script>

    {{-- Переключатель темы --}}
    <script>
        (function() {
            function toggleTheme() {
                var isLight = document.documentElement.getAttribute('data-theme') === 'light';
                if (isLight) {
                    document.documentElement.removeAttribute('data-theme');
                    localStorage.setItem('borbad_theme', 'dark');
                } else {
                    document.documentElement.setAttribute('data-theme', 'light');
                    localStorage.setItem('borbad_theme', 'light');
                }
            }

            // Desktop toggle
            var btn = document.getElementById('themeToggle');
            if (btn) btn.addEventListener('click', toggleTheme);

            // Mobile toggle
            var btnMobile = document.getElementById('themeToggleMobile');
            if (btnMobile) btnMobile.addEventListener('click', toggleTheme);
        })();
    </script>

    {{-- Скрипты отдельных страниц --}}
    @stack('scripts')

</body>

</html>
