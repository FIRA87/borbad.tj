<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Вход в панель администратора — Борбад</title>
    <meta name="description" content="Авторизация в панели администратора">
    <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.ico') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --bg: #0F0E0C;
            --surface: #181614;
            --card: #1F1D1A;
            --border: #2D2A25;
            --gold: #D4A843;
            --gold-light: #E8CC7A;
            --gold-dim: rgba(212, 168, 67, 0.15);
            --text: #F0EDE8;
            --text-muted: #9B9590;
            --error: #e07c7c;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--bg);
            color: var(--text);
            padding: 24px;
        }

        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, transparent 5%, var(--gold) 50%, transparent 95%);
            opacity: 0.7;
            z-index: 1;
        }

        .login-wrap {
            position: relative;
            width: 100%;
            max-width: 420px;
        }

        .login-card {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 48px 40px;
            box-shadow: 0 24px 64px rgba(0, 0, 0, 0.4);
        }

        .login-header {
            text-align: center;
            margin-bottom: 32px;
        }

        .login-logo {
            display: block;
            margin: 0 auto 20px;
            height: 64px;
            width: auto;
            object-fit: contain;
        }

        .login-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--text);
            margin-bottom: 6px;
        }

        .login-subtitle {
            font-size: 0.875rem;
            color: var(--text-muted);
        }

        .gold-line {
            width: 48px;
            height: 2px;
            background: linear-gradient(90deg, transparent, var(--gold), transparent);
            margin: 16px auto 0;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            font-size: 0.875rem;
            font-weight: 500;
            color: var(--text-muted);
            margin-bottom: 8px;
        }

        .form-input {
            width: 100%;
            padding: 12px 16px;
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 10px;
            color: var(--text);
            font-size: 1rem;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .form-input::placeholder {
            color: var(--text-muted);
            opacity: 0.8;
        }

        .form-input:focus {
            outline: none;
            border-color: var(--gold);
            box-shadow: 0 0 0 3px var(--gold-dim);
        }

        .form-input.is-invalid {
            border-color: var(--error);
        }

        .input-wrap {
            position: relative;
        }

        .input-wrap .form-input {
            padding-right: 44px;
        }

        .btn-toggle-password {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            padding: 4px;
            cursor: pointer;
            color: var(--text-muted);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-toggle-password:hover {
            color: var(--gold);
        }

        .btn-toggle-password svg {
            width: 20px;
            height: 20px;
        }

        .form-error {
            font-size: 0.8125rem;
            color: var(--error);
            margin-top: 6px;
        }

        .remember-row {
            display: flex;
            align-items: center;
            margin-bottom: 24px;
        }

        .form-check {
            display: flex;
            align-items: center;
            cursor: pointer;
        }

        .form-check-input {
            width: 18px;
            height: 18px;
            margin-right: 10px;
            accent-color: var(--gold);
            cursor: pointer;
        }

        .form-check-label {
            font-size: 0.875rem;
            color: var(--text-muted);
            cursor: pointer;
            user-select: none;
        }

        .btn-login {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, var(--gold) 0%, #BF9A38 100%);
            color: var(--bg);
            border: none;
            border-radius: 10px;
            font-size: 1rem;
            font-weight: 600;
            font-family: inherit;
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .btn-login:hover {
            transform: translateY(-1px);
            box-shadow: 0 8px 24px rgba(212, 168, 67, 0.25);
        }

        .btn-login:active {
            transform: translateY(0);
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 24px;
            font-size: 0.875rem;
        }

        .back-link a {
            color: var(--gold);
            text-decoration: none;
        }

        .back-link a:hover {
            text-decoration: underline;
            color: var(--gold-light);
        }

        @media (max-width: 480px) {
            .login-card {
                padding: 32px 24px;
            }

            .login-title {
                font-size: 1.25rem;
            }
        }
    </style>
</head>

<body>
    <div class="login-wrap">
        <div class="login-card">
            <div class="login-header">
                <img src="{{ asset('frontend/gerb.png') }}" alt="Борбад" class="login-logo">
                <h1 class="login-title">Панель администратора</h1>
                <p class="login-subtitle">Введите данные для входа</p>
                <div class="gold-line"></div>
            </div>

            @if(session('error'))
                <div class="form-group" style="margin-bottom: 16px;">
                    <p class="form-error">{{ session('error') }}</p>
                </div>
            @endif

            @if($errors->any())
                <div class="form-group" style="margin-bottom: 16px;">
                    @foreach($errors->all() as $err)
                        <p class="form-error">{{ $err }}</p>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input type="email"
                           id="email"
                           name="email"
                           class="form-input @error('email') is-invalid @enderror"
                           value="{{ old('email') }}"
                           placeholder="admin@example.com"
                           autocomplete="email"
                           required
                           autofocus>
                    @error('email')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">Пароль</label>
                    <div class="input-wrap">
                        <input type="password"
                               id="password"
                               name="password"
                               class="form-input @error('password') is-invalid @enderror"
                               placeholder="••••••••"
                               autocomplete="current-password"
                               required>
                        <button type="button" class="btn-toggle-password" aria-label="Показать пароль" title="Показать пароль">
                            <svg class="eye-open" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                            <svg class="eye-closed" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" style="display: none;">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>
                            </svg>
                        </button>
                    </div>
                    @error('password')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="remember-row">
                    <label class="form-check">
                        <input type="checkbox" name="remember" class="form-check-input" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <span class="form-check-label" for="remember">Запомнить меня</span>
                    </label>
                </div>

                <button type="submit" class="btn-login">Войти</button>
            </form>

            <a href="{{ url('/') }}" class="back-link">← На главную</a>
        </div>
    </div>

    <script>
        (function() {
            var btn = document.querySelector('.btn-toggle-password');
            var input = document.getElementById('password');
            var eyeOpen = btn.querySelector('.eye-open');
            var eyeClosed = btn.querySelector('.eye-closed');
            if (!btn || !input) return;
            btn.addEventListener('click', function() {
                var isPass = input.type === 'password';
                input.type = isPass ? 'text' : 'password';
                eyeOpen.style.display = isPass ? 'none' : 'block';
                eyeClosed.style.display = isPass ? 'block' : 'none';
                btn.setAttribute('aria-label', isPass ? 'Скрыть пароль' : 'Показать пароль');
            });
        })();
    </script>
</body>

</html>
