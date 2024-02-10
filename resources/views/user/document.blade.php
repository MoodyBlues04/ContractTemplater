<?php
/**  @var \App\Models\DocumentType[] $documentTypes */
?>

@extends('layouts.user-layout')

@section('scripts')
    <script>
        function chooseDocType() {
            event.preventDefault();
            let docTypeId = document.getElementById('doc_type_select').value;
            let docTypeFormId = `form-container-doc-type-${docTypeId}`;

            let docTypeForms = document.getElementsByClassName('doc-type-form');
            for (const docTypeForm of docTypeForms) {
                docTypeForm.style.display = 'none';
            }

            document.getElementById(docTypeFormId).style.display = 'block';
        }
    </script>
@endsection

@section('content')
    <section class="section1__lk-documents">
        <div class="container container-lk">
            <h1 class="section1-title__lk-documents">Документы</h1>
            <div class="section1-top__lk-documents">
                <div data-tab-documents="#doc1" class="section1-top-block__lk-documents section1-top-block-active__lk-documents">
                    Сканирование документов
                </div>
                <div data-tab-documents="#doc2" class="section1-top-block__lk-documents">
                    Загрузка документов
                </div>
                <div data-tab-documents="#doc3" class="section1-top-block__lk-documents">
                    Редактирование документа
                </div>
                <div data-tab-documents="#doc4" class="section1-top-block__lk-documents">
                    Создание документа
                </div>
            </div>

            <div class="section1-top-container__lk-documents section1-top-container1__lk-documents section1-top-container-active__lk-documents" id="doc1">
                <img src="/{{ asset('img/icons-upload.svg') }}" alt="">
                <p>
                    Нажмите чтобы сделать фотографию документа
                </p>
                <button type="button">Сделать фото</button>
            </div>

            <div class="section1-top-container__lk-documents section1-top-container1__lk-documents" id="doc2">
                <img src="/{{ asset('img/icons-upload.svg') }}" alt="">
                <p>
                    Перетащите файл в эту область, чтобы загрузить
                </p>
                <button type="button">Выбрать файл</button>
            </div>

            <div class="section1-top-container__lk-documents" id="doc3">
                <h3>Документ 1</h3>
                <div class="section1-container__lk-data">
                    <div class="section1-container-block__lk-data">
                        <p>Ваше имя</p>
                        <input type="text" placeholder="Олег">
                    </div>
                    <div class="section1-container-block__lk-data">
                        <p>Ваша фамилия</p>
                        <input type="text" placeholder="Петров">
                    </div>
                    <div class="section1-container-block__lk-data">
                        <p>Ваша фамилия</p>
                        <input type="text" placeholder="Олегович">
                    </div>
                    <div class="section1-container-block__lk-data">
                        <p>Ваш день рождение</p>
                        <input type="date">
                    </div>
                    <div class="section1-container-block__lk-data">
                        <p>Серия документа</p>
                        <input type="text" placeholder="123 123">
                    </div>
                    <div class="section1-container-block__lk-data">
                        <p>Номер документа</p>
                        <input type="text" placeholder="123 123">
                    </div>
                    <div class="section1-container-block__lk-data">
                        <p>Кем выдан документ</p>
                        <input type="text" placeholder="МВД ПО МСК">
                    </div>
                    <div class="section1-container-block__lk-data">
                        <p>Дата выдачи</p>
                        <input type="date">
                    </div>
                </div>
                <button class="save-lk-btn-doc" type="button">Сохранить данные</button>
            </div>

            <div class="section1-top-container__lk-documents" id="doc4">
                <h3>Создание</h3>
                <select id="doc_type_select" name="doc_type" onchange="chooseDocType()">
                    <option value="{{null}}">Выберите тип документа</option>
                    @foreach($documentTypes as $documentType)
                        <option value="{{ $documentType->id }}">
                            {{ $documentType->name }}
                        </option>
                    @endforeach
                </select>

                @foreach($documentTypes as $documentType)
                    <div id="form-container-doc-type-{{$documentType->id}}" class="doc-type-form" style="display:none">
                        <form action="{{ route('user.document.store') }}" method="POST">
                            @csrf
                            <div class="section1-container__lk-data">
                                <div class="section1-container-block__lk-data">
                                    <p>Имя документа</p>
                                    <input type="text" name="name">
                                </div>
                                @foreach($documentType->fields->all() as $field)
                                    <div class="section1-container-block__lk-data">
                                        <p>{{$field->label}}</p>
                                        <input type="{{$field->type}}" name="fields[{{$field->name}}]">
                                    </div>
                                @endforeach
                                <input type="hidden" name="document_type" value="{{$documentType->id}}">
                            </div>
                            <button class="save-lk-btn-doc" type="submit">Сохранить данные</button>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
