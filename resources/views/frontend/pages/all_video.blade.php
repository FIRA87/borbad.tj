@extends('frontend.master')

@section('title')
    @trans('all_video')
@endsection

@push('styles')
    <style>
        .video-card {
            background: var(--dark-card);
            border: 1px solid var(--dark-border);
            border-radius: 16px;
            overflow: hidden;
            transition: all 0.4s ease;
            cursor: pointer;
        }

        .video-card:hover {
            transform: translateY(-4px);
            border-color: var(--gold);
            box-shadow: 0 16px 40px rgba(0, 0, 0, 0.4);
        }

        .video-thumb {
            position: relative;
            overflow: hidden;
        }

        .video-thumb img {
            transition: transform 0.4s ease;
        }

        .video-card:hover .video-thumb img {
            transform: scale(1.05);
        }

        .play-btn {
            position: absolute;
            inset: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(0, 0, 0, 0.3);
            transition: background 0.3s;
        }

        .video-card:hover .play-btn {
            background: rgba(0, 0, 0, 0.5);
        }

        .play-btn-circle {
            width: 64px;
            height: 64px;
            border-radius: 50%;
            background: var(--gold);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: transform 0.3s;
        }

        .video-card:hover .play-btn-circle {
            transform: scale(1.1);
        }

        /* Модальное окно видео */
        .video-modal {
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

        .video-modal.active {
            opacity: 1;
            pointer-events: all;
        }

        .video-modal-content {
            width: 90vw;
            max-width: 960px;
            aspect-ratio: 16/9;
            border-radius: 16px;
            overflow: hidden;
        }

        .video-modal-content iframe {
            width: 100%;
            height: 100%;
            border: 0;
        }
    </style>
@endpush

@section('content')
    {{-- Заголовок --}}
    <section class="pt-16 pb-12 px-6" style="background: var(--dark-surface); border-bottom: 1px solid var(--dark-border);">
        <div class="max-w-7xl mx-auto text-center">
            <p class="text-sm uppercase tracking-widest mb-3" style="color: var(--gold);">@trans('main_video')</p>
            <h1 class="display-font text-5xl md:text-6xl font-bold mb-4 text-white">@trans('main_video')</h1>
            <div class="gold-divider"></div>
        </div>
    </section>

    {{-- Видео --}}
    <section class="py-16 px-6">
        <div class="max-w-7xl mx-auto">
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($videos as $video)
                    @php
                        $videoUrl = $video->video_url;
                        if (preg_match('/(?:youtube\.com\/(?:.*v=|v\/|embed\/)|youtu\.be\/)([^"&?\/\s]{11})/i', $videoUrl, $matches)) {
                            $youtubeId = $matches[1];
                            $embedUrl = "https://www.youtube.com/embed/{$youtubeId}?autoplay=1";
                            $thumbnail = "https://img.youtube.com/vi/{$youtubeId}/maxresdefault.jpg";
                        } else {
                            $embedUrl = $videoUrl;
                            $thumbnail = asset($video->caption ?? 'upload/no-image.jpg');
                        }
                    @endphp

                    <div class="video-card" onclick="openVideoModal('{{ $embedUrl }}')">
                        <div class="video-thumb h-48">
                            <img src="{{ $thumbnail }}" class="w-full h-full object-cover" alt="Video"
                                onerror="this.src='{{ asset('upload/no-image.jpg') }}'">
                            <div class="play-btn">
                                <div class="play-btn-circle">
                                    <svg class="w-7 h-7 ml-1" style="color: var(--dark-bg);" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="p-4">
                            <h4 class="text-white font-semibold text-sm">
                                @if(session('lang') === 'ru') {{ $video->title_ru }}
                                @elseif(session('lang') === 'en') {{ $video->title_en }}
                                @else {{ $video->title_tj }} @endif
                            </h4>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-10">
                {{ $videos->links() }}
            </div>
        </div>
    </section>

    {{-- Модальное окно --}}
    <div class="video-modal" id="videoModal" onclick="closeVideoModal()">
        <button class="absolute top-6 right-6 text-white text-4xl hover:scale-110 transition-transform">&times;</button>
        <div class="video-modal-content" onclick="event.stopPropagation()">
            <iframe id="videoIframe" src="" allow="autoplay; encrypted-media" allowfullscreen></iframe>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function openVideoModal(url) {
            document.getElementById('videoIframe').src = url;
            document.getElementById('videoModal').classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeVideoModal() {
            document.getElementById('videoIframe').src = '';
            document.getElementById('videoModal').classList.remove('active');
            document.body.style.overflow = '';
        }

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') closeVideoModal();
        });
    </script>
@endpush
