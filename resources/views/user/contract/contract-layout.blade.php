@extends('layouts.user-layout')

@section('content')
    <section class="section1__lk-agreement">
        <div class="container container-lk">
            <h1 class="section1-title__lk-documents">Договоры</h1>
            <div class="section1-top__lk-agreement">
                <div id="contract-list-button" data-tab-agreement="#agreement1"
                     class="section1-top-block__lk-agreement">
                    Список договоров
                </div>
                <div id="contract-show-button" data-tab-agreement="#agreement1" class="section1-top-block__lk-agreement">
                    Просмотр и редактирование договора
                </div>
                <div id="contract-create-button" data-tab-agreement="#agreement3" class="section1-top-block__lk-agreement">
                    Создание договора
                </div>
            </div>

            @yield('contract-section')

        </div>
    </section>
@endsection
