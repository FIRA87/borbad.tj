@extends('frontend.master')

@section('title')
    @if(session()->get('lang') == 'ru') Услуги
    @elseif(session()->get('lang') == 'en') Services
    @else Хизматрасонӣ @endif
@endsection

@push('styles')
    <style>
        .service-card {
            background: var(--dark-card);
            border: 1px solid var(--dark-border);
            border-radius: 16px;
            padding: 28px;
            transition: all 0.4s ease;
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .service-card:hover {
            transform: translateY(-4px);
            border-color: var(--gold);
            box-shadow: 0 16px 40px rgba(0, 0, 0, 0.4);
        }

        .service-icon {
            width: 56px;
            height: 56px;
            border-radius: 14px;
            background: var(--gold-dim);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
        }

        /* Модальное окно */
        .service-modal-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.85);
            z-index: 9998;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s;
        }

        .service-modal-overlay.active {
            opacity: 1;
            pointer-events: all;
        }

        .service-modal-box {
            background: var(--dark-card);
            border: 1px solid var(--dark-border);
            border-radius: 20px;
            padding: 32px;
            width: 90vw;
            max-width: 500px;
            position: relative;
        }
    </style>
@endpush

@section('content')
    {{-- Заголовок --}}
    <section class="pt-16 pb-12 px-6" style="background: var(--dark-surface); border-bottom: 1px solid var(--dark-border);">
        <div class="max-w-7xl mx-auto text-center">
            <p class="text-sm uppercase tracking-widest mb-3" style="color: var(--gold);">
                @if(session()->get('lang') == 'ru') Услуги @elseif(session()->get('lang') == 'en') Services @else Хизматрасонӣ @endif
            </p>
            <h1 class="display-font text-5xl md:text-6xl font-bold mb-4 text-white">
                @if(session()->get('lang') == 'ru') Услуги @elseif(session()->get('lang') == 'en') Services @else Хизматрасонӣ @endif
            </h1>
            <div class="gold-divider"></div>
        </div>
    </section>

    {{-- Услуги --}}
    <section class="py-16 px-6">
        <div class="max-w-7xl mx-auto">
            <div class="grid md:grid-cols-3 gap-8">
                @foreach($services as $service)
                    <div class="service-card">
                        <div class="service-icon">
                            <svg class="w-7 h-7" style="color: var(--gold);" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <h4 class="display-font text-lg font-bold text-white mb-3">
                            @if(session()->get('lang') == 'ru') {{ $service->title_ru }}
                            @elseif(session()->get('lang') == 'en') {{ $service->title_en }}
                            @else {{ $service->title_tj }} @endif
                        </h4>
                        @if($service->description_ru || $service->description_en || $service->description_tj)
                            <p class="text-sm mb-6 flex-1" style="color: var(--text-secondary);">
                                @if(session()->get('lang') == 'ru') {{ Str::limit($service->description_ru, 150) }}
                                @elseif(session()->get('lang') == 'en') {{ Str::limit($service->description_en, 150) }}
                                @else {{ Str::limit($service->description_tj, 150) }} @endif
                            </p>
                        @endif
                        <button type="button" class="btn-outline text-sm py-2 px-6 order-service-btn"
                            data-service-id="{{ $service->id }}"
                            data-service-name="@if(session()->get('lang') == 'ru'){{ $service->title_ru }}@elseif(session()->get('lang') == 'en'){{ $service->title_en }}@else{{ $service->title_tj }}@endif">
                            @if(session()->get('lang') == 'ru') Заказать @elseif(session()->get('lang') == 'en') Order @else Фармоиш @endif
                        </button>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Модальное окно --}}
    <div class="service-modal-overlay" id="serviceModalOverlay" onclick="closeServiceModal()">
        <div class="service-modal-box" onclick="event.stopPropagation()">
            <button class="absolute top-4 right-4 text-gray-400 hover:text-white text-2xl" onclick="closeServiceModal()">&times;</button>
            <h3 class="display-font text-xl font-bold text-white mb-6">
                @if(session()->get('lang') == 'ru') Заказать услугу
                @elseif(session()->get('lang') == 'en') Order Service
                @else Фармоиш додан @endif
            </h3>
            <form action="{{ route('frontend.service.request') }}" method="POST" id="serviceRequestForm">
                @csrf
                <input type="hidden" name="service_id" id="serviceIdInput">

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-400 mb-2">
                        @if(session()->get('lang') == 'ru') Услуга @elseif(session()->get('lang') == 'en') Service @else Хизмат @endif
                    </label>
                    <input type="text" class="form-input" id="serviceNameDisplay" readonly>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-400 mb-2">
                        @if(session()->get('lang') == 'ru') ФИО @elseif(session()->get('lang') == 'en') Full Name @else Номи пурра @endif *
                    </label>
                    <input type="text" class="form-input" name="fio" required>
                    <span class="text-red-400 text-xs error-text fio_error"></span>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-400 mb-2">
                        @if(session()->get('lang') == 'ru') Телефон @elseif(session()->get('lang') == 'en') Phone @else Телефон @endif *
                    </label>
                    <input type="text" class="form-input" name="phone" required>
                    <span class="text-red-400 text-xs error-text phone_error"></span>
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-400 mb-2">
                        @if(session()->get('lang') == 'ru') Комментарий @elseif(session()->get('lang') == 'en') Comment @else Шарҳ @endif
                    </label>
                    <textarea class="form-input" name="comment" rows="3"></textarea>
                </div>

                <button type="submit" class="btn-primary w-full py-3 font-semibold">
                    @if(session()->get('lang') == 'ru') Отправить заявку
                    @elseif(session()->get('lang') == 'en') Submit request
                    @else Ирсоли дархост @endif
                </button>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // Открыть модалку
        document.querySelectorAll('.order-service-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                document.getElementById('serviceIdInput').value = this.dataset.serviceId;
                document.getElementById('serviceNameDisplay').value = this.dataset.serviceName;
                document.getElementById('serviceModalOverlay').classList.add('active');
                document.body.style.overflow = 'hidden';
            });
        });

        function closeServiceModal() {
            document.getElementById('serviceModalOverlay').classList.remove('active');
            document.body.style.overflow = '';
        }

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') closeServiceModal();
        });

        // AJAX-отправка
        (function($) {
            $("#serviceRequestForm").on('submit', function(e) {
                e.preventDefault();
                let form = this;
                let btn = $(form).find('button[type="submit"]');
                let original = btn.html();
                btn.prop('disabled', true).html('...');

                $.ajax({
                    url: $(form).attr('action'),
                    method: $(form).attr('method'),
                    data: new FormData(form),
                    processData: false,
                    contentType: false,
                    dataType: 'json',
                    beforeSend: function() { $(form).find('span.error-text').text(''); },
                    success: function(data) {
                        btn.prop('disabled', false).html(original);
                        if (data.code == 0) {
                            $.each(data.error_message, function(prefix, val) {
                                $(form).find('span.' + prefix + '_error').text(val[0]);
                            });
                            toastr.error('{{ session()->get("lang") == "ru" ? "Исправьте ошибки" : "Fix errors" }}');
                        } else if (data.code == 1) {
                            form.reset();
                            closeServiceModal();
                            toastr.success(data.success_message);
                        }
                    },
                    error: function() {
                        btn.prop('disabled', false).html(original);
                        toastr.error('{{ session()->get("lang") == "ru" ? "Ошибка сервера" : "Server error" }}');
                    }
                });
            });
        })(jQuery);
    </script>
@endpush
