@extends('layouts.public-layout')

@section('content')
    <section class="section1__main">
        <div class="container">
            <div class="section1-container__main">
                <div class="section1-container-top__main">
                    <h1>
                        Register
                    </h1>
                    <form action="{{ route('auth.register') }}" method="POST">
                        @csrf

                        <div class="row" style="width: 200px">
                            <label for="name">
                                Name
                                <input type="text" name="name" required>
                            </label>
                            <label for="email">
                                Email
                                <input type="email" name="email" required>
                            </label>
                            <label for="phone">
                                Phone
                                <input type="tel" name="phone" required>
                            </label>
                            <label for="password">
                                Password
                                <input type="password" name="password" required>
                            </label>
                            <label for="password_confirmation">
                                Password confirmation
                                <input type="password" name="password_confirmation" required>
                            </label>
                            <button type="submit">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
