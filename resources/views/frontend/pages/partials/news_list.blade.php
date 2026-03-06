@if ($news->count() > 0)
    <div class="grid md:grid-cols-3 gap-8">
        @foreach ($news as $item)
            <a href="{{ url('news/details/' . $item->id) }}" class="news-card block">
                <div class="h-52 overflow-hidden">
                    @if (!empty($item->image) && $item->image !== 'no-image.jpg')
                        <img src="{{ asset($item->image) }}" class="w-full h-full object-cover" alt="News">
                    @else
                        <div class="w-full h-full flex items-center justify-center"
                            style="background: var(--dark-surface);">
                            <svg class="w-12 h-12 text-gray-700" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" />
                            </svg>
                        </div>
                    @endif
                </div>
                <div class="p-5">
                    <div class="flex items-center gap-2 mb-3">
                        <span class="text-xs" style="color: var(--text-muted);">
                            {{ \Carbon\Carbon::parse($item->publish_date ?? $item->created_at)->format('d.m.Y') }}
                        </span>
                    </div>
                    <h4 class="display-font text-lg font-bold text-white mb-2" style="line-height: 1.4;">
                        @if (session()->get('lang') == 'ru')
                            {{ Str::limit($item->title_ru, 70) }}
                        @elseif(session()->get('lang') == 'en')
                            {{ Str::limit($item->title_en, 70) }}
                        @else
                            {{ Str::limit($item->title_tj, 70) }}
                        @endif
                    </h4>
                    <p class="text-sm mb-3" style="color: var(--text-secondary);">
                        @if (session()->get('lang') == 'ru')
                            {{ Str::limit(strip_tags($item->news_details_ru ?? ''), 100) }}
                        @elseif(session()->get('lang') == 'en')
                            {{ Str::limit(strip_tags($item->news_details_en ?? ''), 100) }}
                        @else
                            {{ Str::limit(strip_tags($item->news_details_tj ?? ''), 100) }}
                        @endif
                    </p>
                    <span class="text-sm font-medium" style="color: var(--gold);">
                        @if (session()->get('lang') == 'ru')
                            Читать далее
                        @elseif(session()->get('lang') == 'en')
                            Read more
                        @else
                            Бештар хондан
                        @endif →
                    </span>
                </div>
            </a>
        @endforeach
    </div>

    <div class="mt-10">
        {{ $news->links() }}
    </div>
@else
    <div class="text-center py-16">
        <svg class="w-16 h-16 mx-auto mb-4" style="color: var(--text-muted); opacity: 0.3;" fill="currentColor"
            viewBox="0 0 20 20">
            <path d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" />
        </svg>
        <h3 class="display-font text-2xl font-bold text-white mb-2">
            @if (session()->get('lang') == 'ru')
                Новости не найдены
            @elseif(session()->get('lang') == 'en')
                No news found
            @else
                Хабарҳо ёфт нашуданд
            @endif
        </h3>
    </div>
@endif
