@extends('layouts.public-layout')

@section('content')
    <section class="section1__main">
        <div class="container">
            <div class="section1-container__main">
                <div class="section1-container-top__main">
                    <h1>
                        Enter your email to reset password
                    </h1>
                    <form action="{{ route('password.email') }}" method="POST">
                        @csrf

                        <div class="row" style="width: 200px">
                            <label for="email">
                                Email
                                <input type="email" name="email" required>
                            </label>
                            <button type="submit">Send password reset code</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
