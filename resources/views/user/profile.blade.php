<?php
/** @var \App\Models\User $user */
?>

@extends('layouts.user-layout')

@section('scripts')
    <script>
        function enableForm() {
            event.preventDefault();
            let inputs = document.getElementsByTagName('input');
            for (const input of inputs) {
                input.removeAttribute('readonly');
            }
        }
    </script>
@endsection

@section('content')
    <section class="section1__lk-data">
        <div class="container container-lk">
            <div class="section1-top__lk-data">
                <p>Привет, {{ $user->name }}!</p>
                <a href="" type="button" onclick="enableForm()">
                    Редактировать данные
                </a>
            </div>
            <form action="{{ route('user.profile.update', $user) }}" method="POST">
                @csrf
                @method('PATCH')

                <div class="section1-container__lk-data">
                    <div class="section1-container-block__lk-data">
                        <p>Ваше имя</p>
                        <input type="text" value="{{ $user->name }}" name="name" readonly>
                    </div>
                    <div class="section1-container-block__lk-data">
                        <p>Ваша почта</p>
                        <input type="email" value="{{ $user->email }}" name="email" readonly>
                    </div>
                    <div class="section1-container-block__lk-data">
                        <p>Ваш телефон</p>
                        <input type="tel" value="{{ $user->phone }}" name="phone" readonly>
                    </div>
                    <div class="section1-container-block__lk-data">
                        <p>Ваша подписка</p>
                        <input type="text" value="{{ 'Not yet' }}" readonly>
                    </div>
                    <div class="section1-container-block__lk-data">
                        <p>Новый пароль</p>
                        <input type="password" placeholder="password" name="password" readonly>
                    </div>
                    <div class="section1-container-block__lk-data">
                        <p>Повторите пароль</p>
                        <input type="password" placeholder="password confirmation" name="password_confirmation" readonly>
                    </div>
                </div>
                <button class="save-lk-btn" type="submit">Сохранить данные</button>
            </form>
        </div>
    </section>
@endsection
