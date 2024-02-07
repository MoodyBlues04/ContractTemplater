@extends('layouts.user-layout')

@section('scripts')
    <script>

    </script>
@endsection

@section('content')
    <section class="section1__lk-data">
        <div class="container container-lk">
            <div class="section1-top__lk-data">
                <p>Привет Олег!</p>
                <a href="">
                    Редактировать данные
                </a>
            </div>
            <div class="section1-container__lk-data">
                <div class="section1-container-block__lk-data">
                    <p>Ваше имя</p>
                    <input type="text" placeholder="Олег Олегович">
                </div>
                <div class="section1-container-block__lk-data">
                    <p>Ваша почта</p>
                    <input type="email" placeholder="example@yandex.ru">
                </div>
                <div class="section1-container-block__lk-data">
                    <p>Ваш телефон</p>
                    <input type="tel" placeholder="8 (999) 999 99-99">
                </div>
                <div class="section1-container-block__lk-data">
                    <p>Ваша подписка</p>
                    <input type="text" placeholder="Ваша подписка">
                </div>
                <div class="section1-container-block__lk-data">
                    <p>Ваш пароль</p>
                    <input type="password" placeholder="***************">
                </div>
                <div class="section1-container-block__lk-data">
                    <p>Повторите пароль</p>
                    <input type="password" placeholder="***************">
                </div>
            </div>
            <a class="save-lk-btn" type="button">Сохранить данные</a>
        </div>
    </section>

@endsection
