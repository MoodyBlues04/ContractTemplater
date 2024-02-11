<?php
/**
 * @var \App\Models\Template[] $templates
 * @var \App\Models\Document[] $documents
 */
?>

@extends('layouts.user-layout')

@section('content')
    <section class="section1__lk-agreement">
        <div class="container container-lk">
            <h1 class="section1-title__lk-documents">Договоры</h1>
            <div class="section1-top__lk-agreement">
                <div data-tab-agreement="#agreement1"
                     class="section1-top-block__lk-agreement section1-top-block-active__lk-agreement">
                    Создание договора
                </div>
                <div data-tab-agreement="#agreement2" class="section1-top-block__lk-agreement">
                    Просмотр и редактирование договора
                </div>
            </div>

            <div id="agreement1" class="section1-container__lk-agreement section1-container-active__lk-agreement">
                @foreach($templates as $template)
                    <div class="section1-container-block__lk-agreement">
                        <div class="section1-container-block-img__lk-agreement">
                            <img src="{{ $template->previewIcon ? $template->previewIcon->getPublicUrl() : asset('img/image%2010.png') }}" alt="">
                        </div>
                        <div class="section1-container-block-text__lk-agreement">
                            <h3>{{ $template->name }}</h3>
                            <p>
                                {{ $template->description ?? '' }}
                            </p>
                        </div>
                        <a type="button" class="openModal" onclick="chooseTemplate({{$template->id}})">Выбрать</a>
                    </div>
                @endforeach
            </div>

            <div class="section1-container__lk-agreement" id="agreement2">
                <div class="section1-container-blur__lk-agreement">
                    <p>
                        Доступ откроется после оплаты подписки на нашем сервисе
                    </p>
                    <a href="#!">
                       Выбрать тариф для оплаты
                    </a>
                </div>
{{--                TODO test change link to real pdf file --}}

                <embed src="{{asset('/img/Договор_об_оказании_услуг%20(5).pdf')}}" type="application/pdf" width="100%" height="100%">
                <div class="section1-container-btns__lk-agreement">
                    <a href="#!" class="redact-data-btn">Редактировать данные</a>
                    <a href="#!" class="download-pdf-btn">Скачать pdf договор</a>
                </div>
            </div>
        </div>
    </section>

    <div  id="modal__project" class="modal" data-modal="one">
        <div class="modal-content">
            <svg class="close" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                <path d="M10.6663 10.6668L21.3328 21.3333" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M10.667 21.3333L21.3335 10.6668" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <p class="titleModal">
                Выберите данные для заполнения
            </p>
            <form action="{{route('user.contract.fill_template')}}" method="POST">
                @csrf
                <div class="modal-container">
                    @foreach($documents as $idx => $document)
                        <div class="modal-container-block">
                            <div class="radio">
                                <input class="custom-radio" type="radio" id="color-{{$idx + 1}}" name="document" value="{{$document->id}}">
                                <label for="color-{{$idx + 1}}">
                                <span class="radio-content">
                                    <span class="radio-title">{{$document->name}}</span>
                                    <span class="radio-text">{{$document->documentType->name}}</span>
                                </span>
                                </label>
                            </div>
                        </div>
                    @endforeach
                    <input type="hidden" name="template" id="template-id-input" value="{{null}}">
                    <button type="submit" class="redact-data-btn">Заполнить</button>
                </div>
            </form>
        </div>

        <script>
            let modal = document.getElementById("modal__project");
            let closeModalSpan = document.getElementsByClassName("close")[0];

            function chooseTemplate(templateId) {
                modal.style.display = "flex";
                document.getElementById('template-id-input').value = templateId;
            }

            closeModalSpan.onclick = function() {
                modal.style.display = "none";
            }

            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        </script>
    </div>
@endsection
