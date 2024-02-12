<?php
/**
 * @var \App\Models\Contract $contract
 */
?>

@extends('layouts.user-layout')

@section('content')
    <section class="section1__lk-documents">
        <div class="container container-lk">
            <h1 class="section1-title__lk-documents">Документы</h1>
            <div class="section1-top__lk-documents">
                <a href="{{ route('user.contract.index') }}"
                   class="section1-top-block__lk-agreement">
                    Создание договора
                </a>
                <a href="{{ route('user.contract.show', $contract) }}"
                    data-tab-agreement="#doc1"
                     class="section1-top-block__lk-agreement">
                    Просмотр договора
                </a>
                <div data-tab-agreement="#doc1"
                     class="section1-top-block__lk-agreement section1-top-block-active__lk-agreement">
                    Редактирование договора
                </div>
            </div>

            <div class="section1-top-container__lk-documents section1-top-container-active__lk-documents" id="doc3">
                <div class="doc-type-form">
                    <form action="{{ route('user.contract.update', $contract) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="section1-container__lk-data">
                            @foreach($contract->template->getFields() as $field)
                                <div class="section1-container-block__lk-data">
                                    <p>{{$field->label}}</p>
                                    <input type="{{$field->type}}" name="fields[{{$field->name}}]" value="{{$contract->data[$field->name] ?? null}}">
                                </div>
                            @endforeach
                            <input type="hidden" name="template" value="{{$contract->template->id}}">
                        </div>
                        <button class="save-lk-btn-doc" type="submit">Сохранить данные</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
