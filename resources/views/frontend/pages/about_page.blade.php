@extends('frontend.master')

@section('title')
    @trans('about_page_title')
@endsection

@push('styles')
    <style>
        .stat-card {
            transition: transform 0.3s ease;
            background: var(--dark-card);
            border: 1px solid var(--dark-border);
        }

        .stat-card:hover {
            transform: translateY(-8px);
            border-color: var(--gold);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
        }

        .timeline-line {
            position: absolute;
            left: 50%;
            top: 0;
            bottom: 0;
            width: 2px;
            background: linear-gradient(180deg, var(--gold), var(--dark-border));
            transform: translateX(-50%);
        }

        .timeline-dot {
            width: 16px;
            height: 16px;
            border-radius: 50%;
            background: var(--gold);
            border: 3px solid var(--dark-bg);
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            z-index: 2;
        }

        .timeline-card {
            background: var(--dark-card);
            border: 1px solid var(--dark-border);
            border-radius: 16px;
            padding: 28px;
            transition: all 0.3s ease;
        }

        .timeline-card:hover {
            border-color: var(--gold);
        }
    </style>
@endpush

@section('content')
    @php
        $locale = session('lang') == 'ru' ? 'ru' : (session('lang') == 'en' ? 'en' : 'tj');
        $title = 'О театре';
        $subtitle = 'История, миссия и ценности театрально-концертного зала Борбад';
        $missions = [];
        $histories = [];
        $stats = [];
        $blocks = [];
        if (isset($about) && $about) {
            $title = $about->{'title_' . $locale} ?? ($about->title_ru ?? $title);
            $subtitle = $about->{'subtitle_' . $locale} ?? ($about->subtitle_ru ?? $subtitle);
            $missions = $about->missions ?? [];
            $histories = $about->histories ?? [];
            $stats = $about->stats ?? [];
            $blocks = $about->blocks ?? [];
        }
        $blockKeys = \App\Models\About::blockKeys();
        $byLocale = function ($item, $key) use ($locale) {
            $v = $item[$key . '_' . $locale] ?? ($item[$key . '_ru'] ?? '');
            return $v;
        };
    @endphp

    <section class="pt-16 pb-12 px-6" style="background: var(--dark-surface); border-bottom: 1px solid var(--dark-border);">
        <div class="max-w-7xl mx-auto">
            @if (isset($about) && $about->image)
                <div class="mb-10 rounded-2xl overflow-hidden" style="border: 1px solid var(--dark-border);">
                    <img src="{{ asset($about->image) }}" alt="{{ $title }}" class="w-full object-cover"
                        style="max-height: 420px;">
                </div>
            @endif
            <div class="text-center">
                <p class="text-sm uppercase tracking-widest mb-3" style="color: var(--gold);">@trans('about_our_history')</p>

                <div class="gold-divider"></div>
                <p class="text-lg text-gray-400 mt-4 max-w-3xl mx-auto">
                    {{ $subtitle }}
                </p>
            </div>
        </div>
    </section>

    @foreach ($blockKeys as $key => $defaultTitle)
        @php
            $b = $blocks[$key] ?? [];
            $blockTitle = $b['title_' . $locale] ?? ($b['title_ru'] ?? $defaultTitle);
            $blockText = $b['text_' . $locale] ?? ($b['text_ru'] ?? '');
        @endphp
        @if (!$blockText)
            @continue
        @endif
        <section class="py-20 px-6 {{ $loop->iteration % 2 === 0 ? 'section-dark' : 'section-surface' }}">
            <div class="max-w-6xl mx-auto">
                <h2 class="section-title mb-6">{{ $blockTitle }}</h2>
                <div class="gold-divider mb-8"></div>
                <div class="prose prose-invert max-w-none text-gray-400 whitespace-pre-line">{{ $blockText }}</div>
            </div>
        </section>
    @endforeach



    <section class="py-20 px-6 section-dark">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-14">
                <p class="text-sm uppercase tracking-widest mb-3" style="color: var(--gold);">@trans('about_values')</p>

                <div class="gold-divider"></div>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-2 gap-8">
                @forelse($missions as $m)
                    <div class="stat-card text-center p-8 rounded-2xl">
                        <div class="w-16 h-16 mx-auto mb-6 rounded-xl flex items-center justify-center"
                            style="background: var(--gold-dim);">
                            <svg class="w-8 h-8" style="color: var(--gold);" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                        </div>
                        <h3 class="display-font text-xl font-bold mb-3 text-white">{{ $byLocale($m, 'title') }}</h3>
                        <p class="text-gray-400">{{ $byLocale($m, 'text') }}</p>
                    </div>
                @empty
                    <div class="stat-card text-center p-8 rounded-2xl md:col-span-2 lg:col-span-3">
                        <p class="text-gray-400">@trans('about_mission_empty') <a href="{{ route('admin.about.index') }}"
                                class="text-gold">@trans('about_admin_link')</a>.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <section class="py-20 px-6 section-surface">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-14">
                <p class="text-sm uppercase tracking-widest mb-3" style="color: var(--gold);">@trans('about_development_path')</p>

                <div class="gold-divider"></div>
            </div>

            <div class="relative">
                <div class="timeline-line hidden md:block"></div>
                <div class="space-y-12">
                    @forelse($histories as $i => $ms)
                        @if (empty($ms['year']) && empty($ms['title_ru']) && empty($ms['title_tj']) && empty($ms['title_en']))
                            @continue
                        @endif
                        @php $side = $ms['side'] ?? ($i % 2 === 0 ? 'left' : 'right'); @endphp
                        <div class="relative grid md:grid-cols-2 gap-8">
                            <div class="timeline-dot hidden md:block" style="top: 30px;"></div>
                            @if ($side === 'left')
                                <div class="md:text-right">
                                    <div class="timeline-card inline-block">
                                        <div class="display-font text-3xl font-bold mb-3" style="color: var(--gold);">
                                            {{ $ms['year'] ?? '' }}</div>
                                        <h3 class="display-font text-xl font-bold mb-3 text-white">
                                            {{ $byLocale($ms, 'title') }}</h3>
                                        <p class="text-gray-400">{{ $byLocale($ms, 'text') }}</p>
                                    </div>
                                </div>
                                <div></div>
                            @else
                                <div></div>
                                <div>
                                    <div class="timeline-card inline-block">
                                        <div class="display-font text-3xl font-bold mb-3" style="color: var(--gold);">
                                            {{ $ms['year'] ?? '' }}</div>
                                        <h3 class="display-font text-xl font-bold mb-3 text-white">
                                            {{ $byLocale($ms, 'title') }}</h3>
                                        <p class="text-gray-400">{{ $byLocale($ms, 'text') }}</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    @empty
                        <p class="text-gray-400 text-center">@trans('about_history_empty')</p>
                    @endforelse
                </div>
            </div>
        </div>
    </section>


    <section class="py-20 px-6 section-dark"
        style="border-top: 1px solid var(--dark-border); border-bottom: 1px solid var(--dark-border);">
        <div class="max-w-7xl mx-auto">
            <div class="grid md:grid-cols-4 gap-8 text-center">
                @forelse($stats as $stat)
                    @if (empty($stat['num']) && empty($stat['label_ru']) && empty($stat['label_tj']) && empty($stat['label_en']))
                        @continue
                    @endif
                    <div>
                        <div class="display-font text-5xl font-bold mb-3" style="color: var(--gold);">
                            {{ $stat['num'] ?? '' }}</div>
                        <p class="text-gray-400">{{ $byLocale($stat, 'label') }}</p>
                    </div>
                @empty
                    <div class="col-span-4 text-gray-400">@trans('about_stats_empty')</div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
