@extends('layouts.user-layout')

@section('content')
    <section class="section1__lk-agreement">
        <div class="container container-lk">
            <h1 class="section1-title__lk-documents">Договоры</h1>
            <div class="section1-top__lk-agreement">
                <div data-tab-agreement="#agreement1" class="section1-top-block__lk-agreement section1-top-block-active__lk-agreement">
                    Создание договора
                </div>
                <div data-tab-agreement="#agreement2" class="section1-top-block__lk-agreement">
                    Просмотр и редактирование договора
                </div>
            </div>
            <div id="agreement1" class="section1-container__lk-agreement section1-container-active__lk-agreement">
                <div class="section1-container-block__lk-agreement">
                    <div class="section1-container-block-img__lk-agreement">
                        <img src="/img/image%2010.png" alt="">
                    </div>
                    <div class="section1-container-block-text__lk-agreement">
                        <h3>Название договора</h3>
                        <p>
                            Our membership management software provides full automation of membership renewals and payments
                        </p>
                    </div>
                    <button type="button" class="openModal">Выбрать</button>
                </div>
                <div class="section1-container-block__lk-agreement">
                    <div class="section1-container-block-img__lk-agreement">
                        <img src="/img/image%2010.png" alt="">
                    </div>
                    <div class="section1-container-block-text__lk-agreement">
                        <h3>Название договора</h3>
                        <p>
                            Our membership management software provides full automation of membership renewals and payments
                        </p>
                    </div>
                    <button type="button" class="openModal">Выбрать</button>
                </div>
                <div class="section1-container-block__lk-agreement">
                    <div class="section1-container-block-img__lk-agreement">
                        <img src="/img/image%2010.png" alt="">
                    </div>
                    <div class="section1-container-block-text__lk-agreement">
                        <h3>Название договора</h3>
                        <p>
                            Our membership management software provides full automation of membership renewals and payments
                        </p>
                    </div>
                    <button type="button" class="openModal">Выбрать</button>
                </div>
                <div class="section1-container-block__lk-agreement">
                    <div class="section1-container-block-img__lk-agreement">
                        <img src="/img/image%2010.png" alt="">
                    </div>
                    <div class="section1-container-block-text__lk-agreement">
                        <h3>Название договора</h3>
                        <p>
                            Our membership management software provides full automation of membership renewals and payments
                        </p>
                    </div>
                    <button type="button" class="openModal">Выбрать</button>
                </div>
                <div class="section1-container-block__lk-agreement">
                    <div class="section1-container-block-img__lk-agreement">
                        <img src="/img/image%2010.png" alt="">
                    </div>
                    <div class="section1-container-block-text__lk-agreement">
                        <h3>Название договора</h3>
                        <p>
                            Our membership management software provides full automation of membership renewals and payments
                        </p>
                    </div>
                    <button type="button" class="openModal">Выбрать</button>
                </div>
                <div class="section1-container-block__lk-agreement">
                    <div class="section1-container-block-img__lk-agreement">
                        <img src="/img/image%2010.png" alt="">
                    </div>
                    <div class="section1-container-block-text__lk-agreement">
                        <h3>Название договора</h3>
                        <p>
                            Our membership management software provides full automation of membership renewals and payments
                        </p>
                    </div>
                    <button type="button" class="openModal">Выбрать</button>
                </div>
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
                <embed src="/img/Договор_об_оказании_услуг%20(5).pdf" type="application/pdf" width="100%" height="100%">
                <div class="section1-container-btns__lk-agreement">
                    <a href="#!" class="redact-data-btn">Редактировать данные</a>
                    <a href="#!" class="download-pdf-btn">Скачать pdf договор</a>
                </div>
            </div>

        </div>
    </section>
@endsection