@extends('frontend.master')

@section('title')
    @trans('documents')
@endsection

@push('styles')
    <style>
        .filter-bar {
            background: var(--dark-card);
            border: 1px solid var(--dark-border);
            border-radius: 16px;
            padding: 24px;
        }

        .filter-input {
            width: 100%;
            padding: 12px 16px;
            background: var(--dark-bg);
            border: 1px solid var(--dark-border);
            border-radius: 10px;
            color: var(--text-primary);
            font-size: 0.9rem;
            transition: all 0.3s ease;
            outline: none;
        }

        .filter-input:focus {
            border-color: var(--gold);
            box-shadow: 0 0 0 3px var(--gold-dim);
        }

        .filter-input::placeholder {
            color: var(--text-muted);
        }

        select.filter-input {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%239B9590' d='M6 8L1 3h10z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 14px center;
            padding-right: 36px;
        }

        .filter-label {
            display: block;
            font-size: 0.8rem;
            font-weight: 600;
            color: var(--text-secondary);
            margin-bottom: 6px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .filter-reset {
            padding: 12px 24px;
            background: transparent;
            border: 1px solid var(--dark-border);
            border-radius: 10px;
            color: var(--text-secondary);
            cursor: pointer;
            transition: all 0.3s;
            font-size: 0.9rem;
        }

        .filter-reset:hover {
            border-color: var(--gold);
            color: var(--gold);
        }

        .doc-card {
            background: var(--dark-card);
            border: 1px solid var(--dark-border);
            border-radius: 16px;
            padding: 24px;
            transition: all 0.4s ease;
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .doc-card:hover {
            transform: translateY(-4px);
            border-color: var(--gold);
            box-shadow: 0 16px 40px rgba(0, 0, 0, 0.4);
        }

        .doc-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 16px;
            font-size: 1.5rem;
            font-weight: 700;
        }

        .doc-icon.pdf { background: rgba(239, 68, 68, 0.15); color: #ef4444; }
        .doc-icon.doc { background: rgba(59, 130, 246, 0.15); color: #3b82f6; }
        .doc-icon.xls { background: rgba(34, 197, 94, 0.15); color: #22c55e; }
        .doc-icon.ppt { background: rgba(245, 158, 11, 0.15); color: #f59e0b; }
        .doc-icon.zip { background: rgba(156, 163, 175, 0.15); color: #9ca3af; }
        .doc-icon.other { background: var(--gold-dim); color: var(--gold); }

        .doc-wrapper {
            transition: opacity 0.3s ease, transform 0.3s ease;
        }

        .doc-wrapper.hiding {
            opacity: 0;
            transform: scale(0.95);
        }
    </style>
@endpush

@section('content')
    {{-- Заголовок --}}
    <section class="pt-16 pb-12 px-6" style="background: var(--dark-surface); border-bottom: 1px solid var(--dark-border);">
        <div class="max-w-7xl mx-auto text-center">
            <p class="text-sm uppercase tracking-widest mb-3" style="color: var(--gold);">@trans('documents')</p>
            <h1 class="display-font text-5xl md:text-6xl font-bold mb-4 text-white">@trans('documents')</h1>
            <div class="gold-divider"></div>
        </div>
    </section>

    <section class="py-16 px-6">
        <div class="max-w-7xl mx-auto">
            {{-- Фильтры --}}
            <div class="filter-bar mb-10">
                <div class="grid md:grid-cols-4 gap-4 items-end">
                    <div>
                        <label class="filter-label">
                            @if(session('lang') == 'ru') Поиск @elseif(session('lang') == 'en') Search @else Ҷустуҷӯ @endif
                        </label>
                        <input type="text" id="searchInput" class="filter-input"
                            placeholder="@if(session('lang') == 'ru')Введите название...@elseif(session('lang') == 'en')Enter title...@else Номро ворид кунед...@endif">
                    </div>
                    <div>
                        <label class="filter-label">
                            @if(session('lang') == 'ru') Тип файла @elseif(session('lang') == 'en') File type @else Навъи файл @endif
                        </label>
                        <select id="typeFilter" class="filter-input">
                            <option value="all">@if(session('lang') == 'ru') Все @elseif(session('lang') == 'en') All @else Ҳама @endif</option>
                            <option value="pdf">PDF</option>
                            <option value="doc">DOC/DOCX</option>
                            <option value="xls">XLS/XLSX</option>
                            <option value="ppt">PPT/PPTX</option>
                            <option value="zip">ZIP</option>
                        </select>
                    </div>
                    <div>
                        <label class="filter-label">
                            @if(session('lang') == 'ru') Сортировка @elseif(session('lang') == 'en') Sort @else Ҷобаҷо @endif
                        </label>
                        <select id="sortFilter" class="filter-input">
                            <option value="desc">@if(session('lang') == 'ru') Новые → Старые @elseif(session('lang') == 'en') New → Old @else Нав → Куҳна @endif</option>
                            <option value="asc">@if(session('lang') == 'ru') Старые → Новые @elseif(session('lang') == 'en') Old → New @else Куҳна → Нав @endif</option>
                        </select>
                    </div>
                    <div class="flex items-end">
                        <button type="button" class="filter-reset w-full" id="resetFilters">
                            @if(session('lang') == 'ru') Сбросить @elseif(session('lang') == 'en') Reset @else Тоза кардан @endif
                        </button>
                    </div>
                </div>
                <p class="text-sm mt-3" style="color: var(--text-muted);" id="resultsCount"></p>
            </div>

            {{-- Документы --}}
            <div class="grid md:grid-cols-4 gap-6" id="documentsGrid">
                @foreach($documents as $doc)
                    @php
                        $ext = strtolower($doc->file_type);
                        $iconClass = match(true) {
                            $ext === 'pdf' => 'pdf',
                            in_array($ext, ['doc', 'docx']) => 'doc',
                            in_array($ext, ['xls', 'xlsx']) => 'xls',
                            in_array($ext, ['ppt', 'pptx']) => 'ppt',
                            $ext === 'zip' => 'zip',
                            default => 'other'
                        };
                    @endphp
                    <div class="doc-wrapper"
                        data-title-ru="{{ strtolower($doc->title_ru ?? '') }}"
                        data-title-en="{{ strtolower($doc->title_en ?? '') }}"
                        data-title-tj="{{ strtolower($doc->title_tj ?? '') }}"
                        data-type="{{ $ext }}"
                        data-date="{{ $doc->published_at }}">
                        <div class="doc-card">
                            <div class="doc-icon {{ $iconClass }}">{{ strtoupper($ext) }}</div>
                            <h5 class="text-white font-bold mb-2 text-sm">
                                @if(session('lang') == 'ru') {{ $doc->title_ru }}
                                @elseif(session('lang') == 'en') {{ $doc->title_en }}
                                @else {{ $doc->title_tj }} @endif
                            </h5>
                            <p class="text-xs mb-2" style="color: var(--text-muted);">
                                {{ \Carbon\Carbon::parse($doc->published_at)->format('d.m.Y') }}
                            </p>
                            <p class="text-sm mb-4 flex-1" style="color: var(--text-secondary);">
                                @if(session('lang') == 'ru') {{ Str::limit($doc->description_ru, 100) }}
                                @elseif(session('lang') == 'en') {{ Str::limit($doc->description_en, 100) }}
                                @else {{ Str::limit($doc->description_tj, 100) }} @endif
                            </p>
                            <a href="{{ route('frontend.documents.download', $doc->id) }}" class="btn-outline text-sm py-2 px-4 text-center">
                                <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                @if(session('lang') == 'ru') Скачать @elseif(session('lang') == 'en') Download @else Боргирӣ @endif
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <div id="noResults" class="text-center py-16" style="display: none;">
                <h3 class="display-font text-2xl font-bold text-white mb-2">
                    @if(session('lang') == 'ru') Документы не найдены
                    @elseif(session('lang') == 'en') No documents found
                    @else Ҳуҷҷатҳо ёфт нашуданд @endif
                </h3>
            </div>

            <div class="mt-10" id="paginationContainer">
                {{ $documents->links() }}
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            const typeFilter = document.getElementById('typeFilter');
            const sortFilter = document.getElementById('sortFilter');
            const resetButton = document.getElementById('resetFilters');
            const cards = document.querySelectorAll('.doc-wrapper');
            const noResults = document.getElementById('noResults');
            const grid = document.getElementById('documentsGrid');

            function filterDocuments() {
                const term = searchInput.value.toLowerCase().trim();
                const type = typeFilter.value;
                let visible = [];

                cards.forEach(card => {
                    const matchesSearch = !term ||
                        (card.dataset.titleRu || '').includes(term) ||
                        (card.dataset.titleEn || '').includes(term) ||
                        (card.dataset.titleTj || '').includes(term);
                    const matchesType = type === 'all' || card.dataset.type === type;

                    if (matchesSearch && matchesType) {
                        card.classList.remove('hiding');
                        card.style.display = '';
                        visible.push(card);
                    } else {
                        card.classList.add('hiding');
                        setTimeout(() => { if (card.classList.contains('hiding')) card.style.display = 'none'; }, 300);
                    }
                });

                // Сортировка
                visible.sort((a, b) => {
                    const dA = new Date(a.dataset.date), dB = new Date(b.dataset.date);
                    return sortFilter.value === 'asc' ? dA - dB : dB - dA;
                });
                visible.forEach(c => grid.appendChild(c));
                noResults.style.display = visible.length === 0 ? 'block' : 'none';
            }

            let timeout;
            searchInput.addEventListener('input', () => { clearTimeout(timeout); timeout = setTimeout(filterDocuments, 300); });
            typeFilter.addEventListener('change', filterDocuments);
            sortFilter.addEventListener('change', filterDocuments);
            resetButton.addEventListener('click', () => {
                searchInput.value = '';
                typeFilter.value = 'all';
                sortFilter.value = 'desc';
                filterDocuments();
            });

            filterDocuments();
        });
    </script>
@endpush
