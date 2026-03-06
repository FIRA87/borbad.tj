@extends('frontend.master')

@section('title')
    @if (session()->get('lang') == 'ru')
        Подать заявку
    @elseif(session()->get('lang') == 'en')
        Apply
    @else
        Аризадиҳӣ
    @endif
@endsection

@section('content')
    {{-- Заголовок --}}
    <section class="pt-16 pb-12 px-6" style="background: var(--dark-surface); border-bottom: 1px solid var(--dark-border);">
        <div class="max-w-3xl mx-auto">
            {{-- Хлебные крошки --}}
            <div class="flex items-center gap-2 text-sm mb-6 flex-wrap">
                <a href="{{ route('frontend.jobs.index') }}" class="text-gray-500 hover:text-white transition">
                    @if (session()->get('lang') == 'ru')
                        Вакансии
                    @elseif(session()->get('lang') == 'en')
                        Vacancies
                    @else
                        Вакансияҳо
                    @endif
                </a>
                <svg class="w-4 h-4 text-gray-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
                <a href="{{ route('frontend.jobs.show', $job->slug) }}"
                    class="text-gray-500 hover:text-white transition truncate">

                    @if (session()->get('lang') == 'ru')
                        {{ $job->title_ru }}
                    @elseif(session()->get('lang') == 'en')
                        {{ $job->title_en }}
                    @else
                        {{ $job->title_tj }}
                    @endif

                </a>
                <svg class="w-4 h-4 text-gray-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
                <span class="text-gray-400">
                    @if (session()->get('lang') == 'ru')
                        Заявка
                    @elseif(session()->get('lang') == 'en')
                        Application
                    @else
                        Ариза
                    @endif
                </span>
            </div>

            <p class="text-sm uppercase tracking-widest mb-3" style="color: var(--gold);">
                @if (session()->get('lang') == 'ru')
                    Подать заявку на вакансию
                @elseif(session()->get('lang') == 'en')
                    Apply for vacancy
                @else
                    Ариза додан барои ҷои корӣ
                @endif
            </p>
            <h1 class="display-font text-3xl md:text-4xl font-bold text-white">

                @if (session()->get('lang') == 'ru')
                    {{ $job->title_ru }}
                @elseif(session()->get('lang') == 'en')
                    {{ $job->title_en }}
                @else
                    {{ $job->title_tj }}
                @endif
            </h1>
        </div>
    </section>

    <section class="py-16 px-6 section-dark">
        <div class="max-w-3xl mx-auto">
            {{-- Ошибки валидации --}}
            @if ($errors->any())
                <div class="mb-8 p-4 rounded-xl text-sm"
                    style="background: rgba(239, 68, 68, 0.1); border: 1px solid rgba(239, 68, 68, 0.3); color: #f87171;">
                    <ul class="list-disc list-inside space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="rounded-2xl overflow-hidden"
                style="background: var(--dark-card); border: 1px solid var(--dark-border);">
                {{-- Верхний золотой акцент --}}
                <div style="height: 2px; background: linear-gradient(90deg, transparent, var(--gold), transparent);"></div>

                <form action="{{ route('frontend.jobs.submit') }}" method="POST" enctype="multipart/form-data"
                    id="jobApplicationForm" class="p-8 md:p-10">
                    @csrf
                    <input type="hidden" name="job_id" value="{{ $job->id }}">

                    {{-- Блок: Личные данные --}}
                    <div class="mb-10">
                        <h2 class="display-font text-xl font-bold text-white mb-6 flex items-center gap-3">
                            <div class="w-1 h-5 rounded-full" style="background: var(--gold);"></div>
                            @if (session()->get('lang') == 'ru')
                                Личные данные
                            @elseif(session()->get('lang') == 'en')
                                Personal Information
                            @else
                                Маълумоти шахсӣ
                            @endif
                        </h2>

                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-400 mb-2">
                                    @if (session()->get('lang') == 'ru')
                                        Имя
                                    @elseif(session()->get('lang') == 'en')
                                        First Name
                                    @else
                                        Ном
                                    @endif
                                    <span style="color: var(--gold);">*</span>
                                </label>
                                <input type="text" name="first_name" value="{{ old('first_name') }}" required
                                    class="form-input @error('first_name') border-red-500 @enderror">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-400 mb-2">
                                    @if (session()->get('lang') == 'ru')
                                        Фамилия
                                    @elseif(session()->get('lang') == 'en')
                                        Last Name
                                    @else
                                        Насаб
                                    @endif
                                    <span style="color: var(--gold);">*</span>
                                </label>
                                <input type="text" name="last_name" value="{{ old('last_name') }}" required
                                    class="form-input @error('last_name') border-red-500 @enderror">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-400 mb-2">
                                    Email <span style="color: var(--gold);">*</span>
                                </label>
                                <input type="email" name="email" value="{{ old('email') }}" required
                                    class="form-input @error('email') border-red-500 @enderror">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-400 mb-2">
                                    @if (session()->get('lang') == 'ru')
                                        Телефон
                                    @elseif(session()->get('lang') == 'en')
                                        Phone
                                    @else
                                        Телефон
                                    @endif
                                    <span style="color: var(--gold);">*</span>
                                </label>
                                <input type="tel" name="phone" value="{{ old('phone') }}" required
                                    placeholder="+992 XXX XX XX XX"
                                    class="form-input @error('phone') border-red-500 @enderror">
                            </div>
                        </div>
                    </div>

                    {{-- Блок: Сопроводительное письмо --}}
                    <div class="mb-10">
                        <h2 class="display-font text-xl font-bold text-white mb-6 flex items-center gap-3">
                            <div class="w-1 h-5 rounded-full" style="background: var(--gold);"></div>
                            @if (session()->get('lang') == 'ru')
                                Сопроводительное письмо
                            @elseif(session()->get('lang') == 'en')
                                Cover Letter
                            @else
                                Мактуби ҳамроҳкунанда
                            @endif
                        </h2>

                        <div>
                            <label class="block text-sm font-medium text-gray-400 mb-2">
                                @if (session()->get('lang') == 'ru')
                                    Расскажите о себе
                                @elseif(session()->get('lang') == 'en')
                                    Tell us about yourself
                                @else
                                    Дар бораи худ нависед
                                @endif
                            </label>
                            <textarea name="cover_letter" rows="5" class="form-input"
                                placeholder="@if (session()->get('lang') == 'ru') Почему вы хотите работать у нас...@elseif(session()->get('lang') == 'en')Why do you want to work with us...@elseЧаро мехоҳед дар назди мо кор кунед... @endif">{{ old('cover_letter') }}</textarea>
                            <p class="text-xs text-gray-600 mt-2">
                                @if (session()->get('lang') == 'ru')
                                    Максимум 5000 символов
                                @elseif(session()->get('lang') == 'en')
                                    Maximum 5000 characters
                                @else
                                    Ҳадди аксар 5000 аломат
                                @endif
                            </p>
                        </div>
                    </div>

                    {{-- Блок: Документы --}}
                    <div class="mb-10">
                        <h2 class="display-font text-xl font-bold text-white mb-6 flex items-center gap-3">
                            <div class="w-1 h-5 rounded-full" style="background: var(--gold);"></div>
                            @if (session()->get('lang') == 'ru')
                                Документы
                            @elseif(session()->get('lang') == 'en')
                                Documents
                            @else
                                Ҳуҷҷатҳо
                            @endif
                        </h2>

                        <div class="space-y-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-400 mb-2">
                                    @if (session()->get('lang') == 'ru')
                                        Резюме (CV)
                                    @elseif(session()->get('lang') == 'en')
                                        Resume (CV)
                                    @else
                                        Резюме (CV)
                                    @endif
                                    <span style="color: var(--gold);">*</span>
                                </label>
                                <input type="file" name="resume" accept=".pdf,.doc,.docx" required
                                    class="form-input file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-transparent file:text-gray-400 @error('resume') border-red-500 @enderror">
                                <p class="text-xs text-gray-600 mt-2">PDF, DOC, DOCX — max 5MB</p>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-400 mb-2">
                                    @if (session()->get('lang') == 'ru')
                                        Дополнительные документы
                                    @elseif(session()->get('lang') == 'en')
                                        Additional Documents
                                    @else
                                        Ҳуҷҷатҳои иловагӣ
                                    @endif
                                </label>
                                <input type="file" name="additional_files[]" accept=".pdf,.doc,.docx,.jpg,.jpeg,.png"
                                    multiple
                                    class="form-input file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-transparent file:text-gray-400">
                                <p class="text-xs text-gray-600 mt-2">
                                    @if (session()->get('lang') == 'ru')
                                        Портфолио, сертификаты, рекомендации
                                    @elseif(session()->get('lang') == 'en')
                                        Portfolio, certificates, recommendations
                                    @else
                                        Портфолио, сертификатҳо, тавсияномаҳо
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- Кнопки --}}
                    <div class="flex flex-col sm:flex-row gap-4">
                        <button type="submit" class="btn-primary flex-1 py-4 text-lg font-semibold text-center"
                            id="submitBtn">
                            @if (session()->get('lang') == 'ru')
                                Отправить заявку
                            @elseif(session()->get('lang') == 'en')
                                Submit Application
                            @else
                                Ариза фиристодан
                            @endif
                        </button>
                        <a href="{{ route('frontend.jobs.show', $job->slug) }}"
                            class="btn-outline flex-1 py-4 text-center">
                            @if (session()->get('lang') == 'ru')
                                Отмена
                            @elseif(session()->get('lang') == 'en')
                                Cancel
                            @else
                                Бекор кардан
                            @endif
                        </a>
                    </div>

                    <p class="text-xs text-gray-600 mt-4">
                        <span style="color: var(--gold);">*</span>
                        @if (session()->get('lang') == 'ru')
                            Обязательные поля
                        @elseif(session()->get('lang') == 'en')
                            Required fields
                        @else
                            Майдонҳои ҳатмӣ
                        @endif
                    </p>
                </form>
            </div>

            {{-- Инфо о вакансии --}}
            <div class="mt-8 p-6 rounded-2xl" style="background: var(--dark-card); border: 1px solid var(--dark-border);">
                <h3 class="text-sm font-semibold uppercase tracking-wider mb-4" style="color: var(--gold);">
                    @if (session()->get('lang') == 'ru')
                        О вакансии
                    @elseif(session()->get('lang') == 'en')
                        About Vacancy
                    @else
                        Дар бораи ҷои корӣ
                    @endif
                </h3>
                <div class="space-y-2 text-sm">
                    <div class="flex justify-between">
                        <span class="text-gray-500">
                            @if (session()->get('lang') == 'ru')
                                Позиция
                            @elseif(session()->get('lang') == 'en')
                                Position
                            @else
                                Мақом
                            @endif
                        </span>
                        <span class="text-gray-300">

                            @if (session()->get('lang') == 'ru')
                                {{ $job->title_ru }}
                            @elseif(session()->get('lang') == 'en')
                                {{ $job->title_en }}
                            @else
                                {{ $job->title_tj }}
                            @endif
                        </span>
                    </div>
                    @if ($job->location)
                        <div class="flex justify-between">
                            <span class="text-gray-500">
                                @if (session()->get('lang') == 'ru')
                                    Место
                                @elseif(session()->get('lang') == 'en')
                                    Location
                                @else
                                    Ҷой
                                @endif
                            </span>
                            <span class="text-gray-300">{{ $job->location }}</span>
                        </div>
                    @endif
                    @if ($job->salary)
                        <div class="flex justify-between">
                            <span class="text-gray-500">
                                @if (session()->get('lang') == 'ru')
                                    Зарплата
                                @elseif(session()->get('lang') == 'en')
                                    Salary
                                @else
                                    Музд
                                @endif
                            </span>
                            <span style="color: var(--gold);">{{ $job->salary }}</span>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        document.getElementById('jobApplicationForm').addEventListener('submit', function(e) {
            const btn = document.getElementById('submitBtn');
            btn.disabled = true;
            btn.style.opacity = '0.6';
            btn.innerHTML =
                '<svg class="animate-spin inline w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path></svg>@if (session()->get('lang') == 'ru')Отправка...@elseif (session()->get('lang') == 'en')Submitting...@elseФиристода мешавад...@endif';
        });
    </script>
@endpush
