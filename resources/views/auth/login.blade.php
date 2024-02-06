@extends('layouts.public-layout')

@section('content')
    <section class="section1__main">
        <div class="container">
            <div class="section1-container__main">
                <div class="section1-container-top__main">
                    <h1>
                        Login
                    </h1>
                    <form action="{{ route('auth.login') }}" method="POST">
                        @csrf

                        <div class="row" style="width: 200px">
                            <label for="email">
                                Email
                                <input type="email" name="email" required>
                            </label>
                            <label for="password">
                                Password
                                <input type="password" name="password" required>
                            </label>
                            <button type="submit">Login</button>
                            <br>
                            <a href="{{ route('auth.register_page') }}"> У меня нет аккаунта</a>
                            <br>
                            <a href="#"> TODO Забыли пароль</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
