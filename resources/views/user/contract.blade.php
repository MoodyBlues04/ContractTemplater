<?php
/**
 * @var \App\Models\Template[] $templates
 * @var \App\Models\Contract[] $contracts
 */
?>

@extends('layouts.user-layout')

@section('scripts')
    <script>
        function selectTemplate() {
            event.preventDefault();
            let templateId = document.getElementById('template_select').value;
            let templateFormId = `form-container-template-${templateId}`;

            let contractForms = document.getElementsByClassName('contract-form');
            for (const contractForm of contractForms) {
                contractForm.style.display = 'none';
            }

            document.getElementById(templateFormId).style.display = 'block';
        }
    </script>
@endsection

@section('content')
    <section class="section1__lk-agreement">
        <div class="container container-lk">
            <h1 class="section1-title__lk-documents">Договоры</h1>
            <div class="section1-top__lk-agreement">
                <div data-tab-agreement="#agreement1"
                     class="section1-top-block__lk-agreement section1-top-block-active__lk-agreement">
                    Список договоров
                </div>
                <div data-tab-agreement="#agreement2" class="section1-top-block__lk-agreement">
                    Просмотр и редактирование договора
                </div>
                <div data-tab-agreement="#agreement3" class="section1-top-block__lk-agreement">
                    Создание договора
                </div>
                {{--                TODO third button for creation pop up & creation. Total: Мои договоры; создвние; просмотр и редактирование (add form for redact) --}}
            </div>

            <div id="agreement1" class="section1-container__lk-agreement section1-container-active__lk-agreement">
                @foreach($contracts as $contract)
                    <div class="section1-container-block__lk-agreement">
                        <div class="section1-container-block-img__lk-agreement">
                            <img src="{{ asset('img/image%2010.png') }}" alt="">
                        </div>
                        <div class="section1-container-block-text__lk-agreement">
                            <h3>{{ $contract->name }}</h3>
                            <p>
                                {{ $contract->description ?? '' }}
                            </p>
                        </div>
                        <a type="button" class="openModal">Выбрать</a>
                    </div>
                @endforeach
            </div>

            <div class="section1-container__lk-agreement" id="agreement2">
                {{--                <div class="section1-container-blur__lk-agreement">--}}
                {{--                    <p>--}}
                {{--                        Доступ откроется после оплаты подписки на нашем сервисе--}}
                {{--                    </p>--}}
                {{--                    <a href="#!">--}}
                {{--                       Выбрать тариф для оплаты--}}
                {{--                    </a>--}}
                {{--                </div>--}}
                {{--                TODO test change link to real pdf file --}}






{{--            TODO !!!!!!!!!! buttons on top not on JS, but on php => 3 views with same top buttons => 3 actions: index, create, show --}}





                <embed src="/img/Договор_об_оказании_услуг%20(5).pdf" type="application/pdf" width="100%" height="100%">
                <div class="section1-container-btns__lk-agreement">
                    <a href="#!" class="redact-data-btn">Редактировать данные</a>
                    <a href="#!" class="download-pdf-btn">Скачать pdf договор</a>
                </div>
            </div>

            <div class="section1-container__lk-agreement" id="agreement3">
                <h3>Создание</h3>
                <select id="template_select" name="template" onchange="selectTemplate()">
                    <option value="{{null}}">Выберите шаблон</option>
                    @foreach($templates as $template)
                        <option value="{{ $template->id }}">
                            {{ $template->name }}
                        </option>
                    @endforeach
                </select>

                @foreach($templates as $template)
                    <div id="form-container-template-{{$template->id}}" class="contract-form" style="display:none">
                        <form action="{{ route('user.contract.store') }}" method="POST">
                            @csrf
                            <div class="section1-container__lk-data">
                                <div class="section1-container-block__lk-data">
                                    <p>Имя договора</p>
                                    <input type="text" name="name">
                                </div>
                                <div class="section1-container-block__lk-data">
                                    <p>Описание</p>
                                    <input type="text" name="description">
                                </div>
                                <div class="section1-container-block__lk-data"> {{-- выравнивание --}}
                                </div>
                                @foreach($template->getFields() as $field)
                                    <div class="section1-container-block__lk-data">
                                        <p>{{$field->label}}</p>
                                        <input type="{{$field->type}}" name="fields[{{$field->name}}]">
                                    </div>
                                @endforeach
                                <input type="hidden" name="template" value="{{$template->id}}">
                            </div>
                            <button class="save-lk-btn-doc" type="submit">Создать договор</button>
                        </form>
                    </div>
                @endforeach
            </div>

        </div>
    </section>
@endsection
