@extends('frontend.master')

@section('title')
    @if(session()->get('lang') == 'ru')
        {{ $project->title_ru }}
    @elseif(session()->get('lang') == 'en')
        {{ $project->title_en }}
    @else
        {{ $project->title_tj }}
    @endif
@endsection

@push('styles')
    <style>
        .date-badge {
            background: var(--dark-card);
            border: 1px solid var(--dark-border);
            border-radius: 12px;
            padding: 20px 24px;
            display: flex;
            align-items: center;
            gap: 16px;
            transition: all 0.3s ease;
        }

        .date-badge:hover {
            border-color: var(--gold);
        }

        .date-badge-icon {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background: var(--gold-dim);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .project-body img {
            max-width: 100%;
            height: auto;
            border-radius: 12px;
            margin: 1.5rem 0;
        }

        .project-body p {
            margin-bottom: 1.2rem;
            line-height: 1.8;
            color: var(--text-secondary);
        }

        .project-gallery-item {
            position: relative;
            overflow: hidden;
            border-radius: 12px;
            border: 1px solid var(--dark-border);
            cursor: pointer;
            transition: all 0.4s ease;
        }

        .project-gallery-item:hover {
            transform: scale(1.03);
            border-color: var(--gold);
            box-shadow: 0 16px 40px rgba(0, 0, 0, 0.4);
        }

        .project-gallery-item img {
            width: 100%;
            height: 220px;
            object-fit: cover;
            display: block;
        }

        .project-gallery-item::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, transparent 50%, rgba(0, 0, 0, 0.6) 100%);
            opacity: 0;
            transition: opacity 0.3s;
        }

        .project-gallery-item:hover::after {
            opacity: 1;
        }

        /* Лайтбокс */
        .project-lightbox {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.95);
            z-index: 9998;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s;
        }

        .project-lightbox.active {
            opacity: 1;
            pointer-events: all;
        }

        .project-lightbox img {
            max-width: 90vw;
            max-height: 85vh;
            object-fit: contain;
            border-radius: 12px;
        }
    </style>
@endpush

@section('content')
    {{-- Заголовок --}}
    <section class="pt-16 pb-12 px-6" style="background: var(--dark-surface); border-bottom: 1px solid var(--dark-border);">
        <div class="max-w-4xl mx-auto">
            {{-- Кнопка назад --}}
            <a href="{{ route('frontend.projects') }}" class="inline-flex items-center text-sm mb-6 transition-colors"
                style="color: var(--gold);">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                @trans('our_projects')
            </a>

            <h1 class="display-font text-3xl md:text-4xl font-bold text-white mb-4 leading-tight">
                @if(session()->get('lang') == 'ru') {{ $project->title_ru }}
                @elseif(session()->get('lang') == 'en') {{ $project->title_en }}
                @else {{ $project->title_tj }} @endif
            </h1>

            @php
                $isActive = $project->end_date ? \Carbon\Carbon::now()->lessThanOrEqualTo($project->end_date) : true;
            @endphp
            <span class="inline-block px-3 py-1 rounded-lg text-xs font-semibold"
                style="background: {{ $isActive ? 'rgba(34, 197, 94, 0.15)' : 'rgba(156, 163, 175, 0.15)' }};
                    color: {{ $isActive ? '#22c55e' : '#9ca3af' }};">
                @if($isActive)
                    @if(session()->get('lang') == 'ru') Активный @elseif(session()->get('lang') == 'en') Active @else Фаъол @endif
                @else
                    @if(session()->get('lang') == 'ru') Завершён @elseif(session()->get('lang') == 'en') Completed @else Анҷомёфта @endif
                @endif
            </span>
        </div>
    </section>

    {{-- Контент --}}
    <section class="py-16 px-6">
        <div class="max-w-4xl mx-auto">
            {{-- Изображение --}}
            @if($project->image)
                <div class="mb-10 rounded-2xl overflow-hidden border" style="border-color: var(--dark-border);">
                    <img src="/{{ $project->image }}" class="w-full" style="max-height: 500px; object-fit: cover;"
                        alt="{{ $project->title_tj }}">
                </div>
            @endif

            {{-- Даты проекта --}}
            @if($project->start_date || $project->end_date)
                <div class="grid md:grid-cols-2 gap-4 mb-10">
                    @if($project->start_date)
                        <div class="date-badge">
                            <div class="date-badge-icon">
                                <svg class="w-5 h-5" style="color: var(--gold);" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs uppercase tracking-wider mb-1" style="color: var(--text-muted);">
                                    @if(session()->get('lang') == 'ru') Дата начала @elseif(session()->get('lang') == 'en') Start Date @else Санаи оғоз @endif
                                </p>
                                <p class="text-white text-lg font-bold">{{ \Carbon\Carbon::parse($project->start_date)->format('d.m.Y') }}</p>
                            </div>
                        </div>
                    @endif
                    @if($project->end_date)
                        <div class="date-badge">
                            <div class="date-badge-icon">
                                <svg class="w-5 h-5" style="color: var(--gold);" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs uppercase tracking-wider mb-1" style="color: var(--text-muted);">
                                    @if(session()->get('lang') == 'ru') Дата окончания @elseif(session()->get('lang') == 'en') End Date @else Санаи анҷом @endif
                                </p>
                                <p class="text-white text-lg font-bold">{{ \Carbon\Carbon::parse($project->end_date)->format('d.m.Y') }}</p>
                            </div>
                        </div>
                    @endif
                </div>
            @endif

            {{-- Текст --}}
            <div class="project-body text-lg leading-relaxed mb-12">
                @if(session()->get('lang') == 'ru') {!! $project->text_ru !!}
                @elseif(session()->get('lang') == 'en') {!! $project->text_en !!}
                @else {!! $project->text_tj !!} @endif
            </div>

            {{-- Галерея --}}
            @if($project->gallery)
                @php
                    $galleryImages = is_string($project->gallery) ? json_decode($project->gallery, true) : $project->gallery;
                @endphp

                @if(is_array($galleryImages) && count($galleryImages) > 0)
                    <div class="mt-12">
                        <h3 class="display-font text-2xl font-bold text-white mb-6">
                            @if(session()->get('lang') == 'ru') Галерея проекта
                            @elseif(session()->get('lang') == 'en') Project Gallery
                            @else Галереяи лоиҳа @endif
                        </h3>
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                            @foreach($galleryImages as $image)
                                <div class="project-gallery-item" onclick="openProjectLightbox('{{ asset($image) }}')">
                                    <img src="{{ asset($image) }}" alt="Gallery" loading="lazy">
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            @endif
        </div>
    </section>

    {{-- Лайтбокс --}}
    <div class="project-lightbox" id="projectLightbox" onclick="closeProjectLightbox()">
        <button class="absolute top-6 right-6 text-white text-4xl hover:scale-110 transition-transform">&times;</button>
        <img id="projectLightboxImg" src="" alt="Фото">
    </div>
@endsection

@push('scripts')
    <script>
        function openProjectLightbox(src) {
            document.getElementById('projectLightboxImg').src = src;
            document.getElementById('projectLightbox').classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeProjectLightbox() {
            document.getElementById('projectLightbox').classList.remove('active');
            document.body.style.overflow = '';
        }

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') closeProjectLightbox();
        });
    </script>
@endpush
