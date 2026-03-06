@extends('admin.admin_dashboard')
@section('admin')

@if(auth()->user()->hasRole('Super Admin') || auth()->user()->hasRole('admin') || auth()->user()->hasRole('Editor'))
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Панель</a></li>
                            <li class="breadcrumb-item active">О нас</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Редактирование страницы «О нас»</h4>
                </div>
            </div>
        </div>

        @if(session('message'))
            <div class="alert alert-{{ session('alert-type', 'success') }}">
                {{ session('message') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.about.update', $about) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="accordion mb-4" id="aboutAccordion">

            {{-- Заголовок страницы --}}
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseHeader" aria-expanded="true" aria-controls="collapseHeader">
                        Заголовок страницы
                    </button>
                </h2>
                <div id="collapseHeader" class="accordion-collapse collapse show" data-bs-parent="#aboutAccordion">
                    <div class="accordion-body">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Заголовок (RU)</label>
                            <input type="text" class="form-control" name="title_ru"
                                   value="{{ old('title_ru', $about->title_ru) }}" placeholder="О театре">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Заголовок (TJ)</label>
                            <input type="text" class="form-control" name="title_tj"
                                   value="{{ old('title_tj', $about->title_tj) }}">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Заголовок (EN)</label>
                            <input type="text" class="form-control" name="title_en"
                                   value="{{ old('title_en', $about->title_en) }}">
                        </div>
                        <div class="col-12 mb-2">
                            <label class="form-label">Подзаголовок (RU)</label>
                            <input type="text" class="form-control" name="subtitle_ru"
                                   value="{{ old('subtitle_ru', $about->subtitle_ru) }}"
                                   placeholder="История, миссия и ценности...">
                        </div>
                        <div class="col-md-6 mb-2">
                            <label class="form-label">Подзаголовок (TJ)</label>
                            <input type="text" class="form-control" name="subtitle_tj"
                                   value="{{ old('subtitle_tj', $about->subtitle_tj) }}">
                        </div>
                        <div class="col-md-6 mb-2">
                            <label class="form-label">Подзаголовок (EN)</label>
                            <input type="text" class="form-control" name="subtitle_en"
                                   value="{{ old('subtitle_en', $about->subtitle_en) }}">
                        </div>
                        <div class="col-12 mb-2 mt-3">
                            <label class="form-label">Изображение страницы</label>
                            @if($about->image)
                                <div class="mb-2">
                                    <img src="{{ asset($about->image) }}" alt="" class="img-thumbnail" style="max-height: 200px;">
                                    <div class="form-check mt-2">
                                        <input type="checkbox" class="form-check-input" name="remove_image" value="1" id="remove_image">
                                        <label class="form-check-label" for="remove_image">Удалить изображение</label>
                                    </div>
                                </div>
                            @endif
                            <input type="file" class="form-control" name="image" accept="image/jpeg,image/png,image/jpg,image/gif,image/webp">
                            <small class="text-muted">JPEG, PNG, JPG, GIF, WebP, макс. 5 МБ</small>
                        </div>
                    </div>
                    </div>
                </div>
            </div>

            {{-- Миссия (карточки, количество произвольное) --}}
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseMission" aria-expanded="false" aria-controls="collapseMission">
                        Блок «Наша миссия» (карточки)
                    </button>
                </h2>
                <div id="collapseMission" class="accordion-collapse collapse" data-bs-parent="#aboutAccordion">
                    <div class="accordion-body">
                    @php
                        $missions = old('missions', $about->missions ?? []);
                        $missionDefaults = ['title_ru' => '', 'title_tj' => '', 'title_en' => '', 'text_ru' => '', 'text_tj' => '', 'text_en' => ''];
                    @endphp
                    <div id="missions-container">
                    @foreach ($missions as $i => $m)
                        <div class="mission-card border rounded p-3 mb-3">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h6 class="text-muted mb-0">Карточка <span class="mission-num">{{ $i + 1 }}</span></h6>
                                <button type="button" class="btn btn-sm btn-outline-danger mission-remove">Удалить</button>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-2">
                                    <label class="form-label">Заголовок (RU)</label>
                                    <input type="text" class="form-control" name="missions[{{ $i }}][title_ru]"
                                           value="{{ $m['title_ru'] ?? '' }}">
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label class="form-label">Заголовок (TJ)</label>
                                    <input type="text" class="form-control" name="missions[{{ $i }}][title_tj]"
                                           value="{{ $m['title_tj'] ?? '' }}">
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label class="form-label">Заголовок (EN)</label>
                                    <input type="text" class="form-control" name="missions[{{ $i }}][title_en]"
                                           value="{{ $m['title_en'] ?? '' }}">
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label class="form-label">Текст (RU)</label>
                                    <textarea class="form-control" name="missions[{{ $i }}][text_ru]" rows="2">{{ $m['text_ru'] ?? '' }}</textarea>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label class="form-label">Текст (TJ)</label>
                                    <textarea class="form-control" name="missions[{{ $i }}][text_tj]" rows="2">{{ $m['text_tj'] ?? '' }}</textarea>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label class="form-label">Текст (EN)</label>
                                    <textarea class="form-control" name="missions[{{ $i }}][text_en]" rows="2">{{ $m['text_en'] ?? '' }}</textarea>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                    <button type="button" id="mission-add" class="btn btn-outline-primary btn-sm">
                        <i class="mdi mdi-plus"></i> Добавить карточку
                    </button>
                    </div>
                </div>
            </div>

            <script type="text/template" id="mission-card-tpl">
                <div class="mission-card border rounded p-3 mb-3">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h6 class="text-muted mb-0">Карточка <span class="mission-num">__NUM__</span></h6>
                        <button type="button" class="btn btn-sm btn-outline-danger mission-remove">Удалить</button>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-2">
                            <label class="form-label">Заголовок (RU)</label>
                            <input type="text" class="form-control" name="missions[__INDEX__][title_ru]" value="">
                        </div>
                        <div class="col-md-4 mb-2">
                            <label class="form-label">Заголовок (TJ)</label>
                            <input type="text" class="form-control" name="missions[__INDEX__][title_tj]" value="">
                        </div>
                        <div class="col-md-4 mb-2">
                            <label class="form-label">Заголовок (EN)</label>
                            <input type="text" class="form-control" name="missions[__INDEX__][title_en]" value="">
                        </div>
                        <div class="col-md-4 mb-2">
                            <label class="form-label">Текст (RU)</label>
                            <textarea class="form-control" name="missions[__INDEX__][text_ru]" rows="2"></textarea>
                        </div>
                        <div class="col-md-4 mb-2">
                            <label class="form-label">Текст (TJ)</label>
                            <textarea class="form-control" name="missions[__INDEX__][text_tj]" rows="2"></textarea>
                        </div>
                        <div class="col-md-4 mb-2">
                            <label class="form-label">Текст (EN)</label>
                            <textarea class="form-control" name="missions[__INDEX__][text_en]" rows="2"></textarea>
                        </div>
                    </div>
                </div>
            </script>

            {{-- История (таймлайн) --}}
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseHistory" aria-expanded="false" aria-controls="collapseHistory">
                        Блок «История развития»
                    </button>
                </h2>
                <div id="collapseHistory" class="accordion-collapse collapse" data-bs-parent="#aboutAccordion">
                    <div class="accordion-body">
                    <small class="text-muted d-block mb-2">Сторона: left — слева, right — справа на десктопе.</small>
                    @php
                        $histories = old('histories', $about->histories ?? []);
                        $historyDefaults = ['year' => '', 'title_ru' => '', 'title_tj' => '', 'title_en' => '', 'text_ru' => '', 'text_tj' => '', 'text_en' => '', 'side' => 'left'];
                        while (count($histories) < 6) { $histories[] = $historyDefaults; }
                    @endphp
                    @foreach ($histories as $i => $h)
                        <div class="border rounded p-3 mb-3">
                            <h6 class="text-muted">Пункт {{ $i + 1 }}</h6>
                            <div class="row">
                                <div class="col-md-2 mb-2">
                                    <label class="form-label">Год</label>
                                    <input type="text" class="form-control" name="histories[{{ $i }}][year]"
                                           value="{{ $h['year'] ?? '' }}" placeholder="1985">
                                </div>
                                <div class="col-md-2 mb-2">
                                    <label class="form-label">Сторона</label>
                                    <select class="form-select" name="histories[{{ $i }}][side]">
                                        <option value="left" {{ ($h['side'] ?? 'left') === 'left' ? 'selected' : '' }}>Слева</option>
                                        <option value="right" {{ ($h['side'] ?? '') === 'right' ? 'selected' : '' }}>Справа</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label class="form-label">Заголовок (RU)</label>
                                    <input type="text" class="form-control" name="histories[{{ $i }}][title_ru]"
                                           value="{{ $h['title_ru'] ?? '' }}">
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label class="form-label">Заголовок (TJ)</label>
                                    <input type="text" class="form-control" name="histories[{{ $i }}][title_tj]"
                                           value="{{ $h['title_tj'] ?? '' }}">
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label class="form-label">Заголовок (EN)</label>
                                    <input type="text" class="form-control" name="histories[{{ $i }}][title_en]"
                                           value="{{ $h['title_en'] ?? '' }}">
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label class="form-label">Текст (RU)</label>
                                    <textarea class="form-control" name="histories[{{ $i }}][text_ru]" rows="2">{{ $h['text_ru'] ?? '' }}</textarea>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label class="form-label">Текст (TJ)</label>
                                    <textarea class="form-control" name="histories[{{ $i }}][text_tj]" rows="2">{{ $h['text_tj'] ?? '' }}</textarea>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label class="form-label">Текст (EN)</label>
                                    <textarea class="form-control" name="histories[{{ $i }}][text_en]" rows="2">{{ $h['text_en'] ?? '' }}</textarea>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>

            {{-- 6 блоков контента --}}
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseBlocks" aria-expanded="false" aria-controls="collapseBlocks">
                        Блоки страницы «О нас»
                    </button>
                </h2>
                <div id="collapseBlocks" class="accordion-collapse collapse" data-bs-parent="#aboutAccordion">
                    <div class="accordion-body">
                    <small class="text-muted d-block mb-2">История строительства, архитектура, наследие, оснащение, реконструкция.</small>
                    @php
                        $blockKeys = \App\Models\About::blockKeys();
                        $blocks = old('blocks', $about->blocks ?? []);
                    @endphp
                    @foreach ($blockKeys as $key => $label)
                        @php
                            $b = $blocks[$key] ?? ['title_ru' => '', 'title_tj' => '', 'title_en' => '', 'text_ru' => '', 'text_tj' => '', 'text_en' => ''];
                        @endphp
                        <div class="border rounded p-3 mb-4">
                            <h6 class="text-primary">{{ $label }}</h6>
                            <div class="row">
                                <div class="col-md-4 mb-2">
                                    <label class="form-label">Заголовок (RU)</label>
                                    <input type="text" class="form-control" name="blocks[{{ $key }}][title_ru]"
                                           value="{{ $b['title_ru'] ?? '' }}" placeholder="{{ $label }}">
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label class="form-label">Заголовок (TJ)</label>
                                    <input type="text" class="form-control" name="blocks[{{ $key }}][title_tj]"
                                           value="{{ $b['title_tj'] ?? '' }}">
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label class="form-label">Заголовок (EN)</label>
                                    <input type="text" class="form-control" name="blocks[{{ $key }}][title_en]"
                                           value="{{ $b['title_en'] ?? '' }}">
                                </div>
                                <div class="col-12 mb-2">
                                    <label class="form-label">Текст (RU)</label>
                                    <textarea class="form-control" name="blocks[{{ $key }}][text_ru]" rows="4">{{ $b['text_ru'] ?? '' }}</textarea>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label class="form-label">Текст (TJ)</label>
                                    <textarea class="form-control" name="blocks[{{ $key }}][text_tj]" rows="4">{{ $b['text_tj'] ?? '' }}</textarea>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label class="form-label">Текст (EN)</label>
                                    <textarea class="form-control" name="blocks[{{ $key }}][text_en]" rows="4">{{ $b['text_en'] ?? '' }}</textarea>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>

            {{-- Статистика --}}
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseStats" aria-expanded="false" aria-controls="collapseStats">
                        Блок «Статистика» (цифры)
                    </button>
                </h2>
                <div id="collapseStats" class="accordion-collapse collapse" data-bs-parent="#aboutAccordion">
                    <div class="accordion-body">
                    @php
                        $stats = old('stats', $about->stats ?? []);
                        while (count($stats) < 6) { $stats[] = ['num' => '', 'label_ru' => '', 'label_tj' => '', 'label_en' => '']; }
                    @endphp
                    @foreach ($stats as $i => $s)
                        <div class="row border-bottom pb-2 mb-2 align-items-end">
                            <div class="col-md-2 mb-2">
                                <label class="form-label">Число</label>
                                <input type="text" class="form-control" name="stats[{{ $i }}][num]"
                                       value="{{ $s['num'] ?? '' }}" placeholder="500+">
                            </div>
                            <div class="col-md-3 mb-2">
                                <label class="form-label">Подпись (RU)</label>
                                <input type="text" class="form-control" name="stats[{{ $i }}][label_ru]"
                                       value="{{ $s['label_ru'] ?? '' }}" placeholder="Посадочных мест">
                            </div>
                            <div class="col-md-3 mb-2">
                                <label class="form-label">Подпись (TJ)</label>
                                <input type="text" class="form-control" name="stats[{{ $i }}][label_tj]"
                                       value="{{ $s['label_tj'] ?? '' }}" placeholder="Ҷойҳои нишаст">
                            </div>
                            <div class="col-md-4 mb-2">
                                <label class="form-label">Подпись (EN)</label>
                                <input type="text" class="form-control" name="stats[{{ $i }}][label_en]"
                                       value="{{ $s['label_en'] ?? '' }}" placeholder="Seats">
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>

            </div>

            <script>
            (function() {
                var container = document.getElementById('missions-container');
                var tpl = document.getElementById('mission-card-tpl');
                var addBtn = document.getElementById('mission-add');
                if (!container || !tpl || !addBtn) return;

                addBtn.addEventListener('click', function() {
                    var cards = container.querySelectorAll('.mission-card');
                    var index = cards.length;
                    var html = tpl.innerHTML
                        .replace(/__INDEX__/g, index)
                        .replace(/__NUM__/g, index + 1);
                    container.insertAdjacentHTML('beforeend', html);
                });

                container.addEventListener('click', function(e) {
                    if (e.target.classList.contains('mission-remove')) {
                        var card = e.target.closest('.mission-card');
                        if (card) card.remove();
                    }
                });
            })();
            </script>

            <div class="mb-4">
                <button type="submit" class="btn btn-success">
                    <i class="mdi mdi-content-save"></i> Сохранить
                </button>
                <a href="{{ route('frontend.about') }}" class="btn btn-outline-primary" target="_blank">
                    <i class="mdi mdi-open-in-new"></i> Посмотреть на сайте
                </a>
            </div>
        </form>
    </div>
</div>
@else
<div class="alert alert-danger">У вас нет доступа.</div>
@endif
@endsection
