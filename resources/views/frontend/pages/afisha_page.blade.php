@extends('frontend.master')

@section('title', 'Афиша - Борбад')

@push('styles')
    <style>
        .afisha-card {
            background: var(--dark-card);
            border: 1px solid var(--dark-border);
            border-radius: 16px;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .afisha-card:hover {
            transform: translateY(-4px);
            border-color: var(--gold);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.4), 0 0 30px var(--gold-dim);
        }
    </style>
@endpush

@section('content')
    <!-- Header -->
    <section class="pt-16 pb-12 px-6" style="background: var(--dark-surface); border-bottom: 1px solid var(--dark-border);">
        <div class="max-w-7xl mx-auto text-center">
            <p class="text-sm uppercase tracking-widest mb-3" style="color: var(--gold);">Афиша</p>
            <div class="gold-divider"></div>
            <p class="text-lg text-gray-400 mt-4">Предстоящие события и мероприятия</p>
        </div>
    </section>

    <!-- Events List -->
    <section class="py-16 px-6 section-dark">
        <div class="max-w-6xl mx-auto space-y-6">
            @if (isset($news) && $news->count())
                @foreach ($news as $item)
                    <div class="afisha-card">
                        <div class="flex flex-col md:flex-row">
                            {{-- Дата --}}
                            <div class="md:w-48 p-6 flex flex-col items-center justify-center"
                                style="background: var(--dark-surface); border-right: 1px solid var(--dark-border);">
                                <div class="text-center">
                                    <p class="text-4xl font-bold" style="color: var(--gold);">
                                        {{ \Carbon\Carbon::parse($item->publish_date)->format('d') }}
                                    </p>
                                    <p class="text-lg text-gray-400 mt-1">
                                        {{ \Carbon\Carbon::parse($item->publish_date)->translatedFormat('F') }}
                                    </p>
                                    <p class="text-sm text-gray-500 mt-1">
                                        {{ \Carbon\Carbon::parse($item->publish_date)->translatedFormat('l') }}
                                    </p>
                                </div>
                            </div>
                            {{-- Контент --}}
                            <div class="flex-1 p-6">
                                <div class="flex items-start justify-between mb-3">
                                    <h3 class="display-font text-2xl font-bold text-white">{{ $item->title_ru }}</h3>
                                    @if ($item->category)
                                        <span class="px-3 py-1 rounded-lg text-xs font-semibold flex-shrink-0 ml-4"
                                            style="background: var(--gold-dim); color: var(--gold);">
                                            {{ $item->category->name_ru ?? '' }}
                                        </span>
                                    @endif
                                </div>
                                <p class="text-gray-400 mb-4 leading-relaxed">
                                    {!! Str::limit(strip_tags($item->news_details_ru), 200) !!}
                                </p>
                                <div class="flex flex-wrap items-center gap-4 text-gray-500 text-sm mb-5">
                                    <div class="flex items-center">
                                        <svg class="w-4 h-4 mr-1.5" style="color: var(--gold);" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        {{ \Carbon\Carbon::parse($item->publish_date)->format('H:i') }}
                                    </div>
                                </div>
                                <a href="{{ route('frontend.afisha.detail', $item->id) }}" class="btn-outline text-sm py-2 px-6">
                                    Подробнее
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="mt-8">{{ $news->links() }}</div>
            @else
                <div class="text-center py-16">
                    <h3 class="display-font text-2xl font-bold mb-4 text-white">Скоро здесь появятся события</h3>
                    <p class="text-gray-400">Следите за обновлениями</p>
                </div>
            @endif
        </div>
    </section>
@endsection
