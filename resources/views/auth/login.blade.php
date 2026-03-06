@extends('frontend.master')

@section('title', 'Вход — Борбад')

@push('styles')
    <style>
        .login-card {
            background: var(--dark-card);
            border: 1px solid var(--dark-border);
            border-radius: 16px;
            box-shadow: 0 24px 64px rgba(0, 0, 0, 0.35);
        }
        .login-card .form-input {
            background: var(--dark-surface);
            border: 1px solid var(--dark-border);
            color: var(--text-primary);
            border-radius: 10px;
            padding: 12px 16px;
            width: 100%;
            transition: border-color 0.2s, box-shadow 0.2s;
        }
        .login-card .form-input::placeholder {
            color: var(--text-muted);
        }
        .login-card .form-input:focus {
            outline: none;
            border-color: var(--gold);
            box-shadow: 0 0 0 3px var(--gold-dim);
        }
        .login-card label {
            color: var(--text-secondary);
            font-size: 0.875rem;
            font-weight: 500;
            margin-bottom: 6px;
            display: block;
        }
        .login-card .input-wrap {
            margin-bottom: 1.25rem;
        }
        .login-card .alert {
            border-radius: 10px;
            padding: 12px 16px;
            margin-bottom: 1.25rem;
        }
        .login-card .alert-success { background: rgba(34, 197, 94, 0.15); color: #86efac; border: 1px solid rgba(34, 197, 94, 0.3); }
        .login-card .alert-danger { background: rgba(239, 68, 68, 0.15); color: #fca5a5; border: 1px solid rgba(239, 68, 68, 0.3); }
        .login-card .text-link {
            color: var(--gold);
            text-decoration: none;
            font-weight: 500;
        }
        .login-card .text-link:hover { color: var(--gold-light); text-decoration: underline; }
        .login-card .divider {
            height: 1px;
            background: var(--dark-border);
            margin: 1.25rem 0;
        }
    </style>
@endpush

@section('content')
    <section class="pt-24 pb-12 px-6" style="min-height: 60vh; display: flex; align-items: center;">
        <div class="max-w-md mx-auto w-full">
            <div class="login-card p-8">
                <div class="text-center mb-8">
                    <p class="text-sm uppercase tracking-widest mb-2" style="color: var(--gold);">Личный кабинет</p>
                    <h1 class="display-font text-2xl md:text-3xl font-bold text-white">Вход в аккаунт</h1>
                    <div class="gold-divider mx-auto mt-3"></div>
                </div>

                @if(session('status'))
                    <div class="alert alert-success" role="alert">{{ session('status') }}</div>
                @endif
                @if(session('error'))
                    <div class="alert alert-danger" role="alert">{{ session('error') }}</div>
                @endif
                @if($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <ul class="list-disc list-inside text-sm space-y-1">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="input-wrap">
                        <label for="email">Email</label>
                        <input type="email"
                               id="email"
                               name="email"
                               class="form-input"
                               value="{{ old('email') }}"
                               placeholder="example@mail.com"
                               autocomplete="email"
                               required
                               autofocus>
                    </div>

                    <div class="input-wrap">
                        <label for="password">Пароль</label>
                        <input type="password"
                               id="password"
                               name="password"
                               class="form-input"
                               placeholder="••••••••"
                               autocomplete="current-password"
                               required>
                    </div>

                    <div class="flex items-center justify-between mb-6">
                        <label class="inline-flex items-center cursor-pointer">
                            <input type="checkbox" name="remember" class="rounded border-gray-600 bg-transparent text-[var(--gold)] focus:ring-[var(--gold)]">
                            <span class="ml-2 text-sm" style="color: var(--text-secondary);">Запомнить меня</span>
                        </label>
                        @if(Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-sm text-link">Забыли пароль?</a>
                        @endif
                    </div>

                    <button type="submit" class="btn-primary w-full py-3 text-center inline-block">
                        Войти
                    </button>
                </form>

                <div class="divider"></div>
                <p class="text-center text-sm" style="color: var(--text-secondary);">
                    Нет аккаунта?
                    <a href="{{ route('register') }}" class="text-link">Зарегистрироваться</a>
                </p>
            </div>
        </div>
    </section>
@endsection
