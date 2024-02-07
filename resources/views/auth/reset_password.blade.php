<?php
/** @var string $token */
?>
@extends('layouts.public-layout')

@section('content')
    <section class="section1__main">
        <div class="container">
            <div class="section1-container__main">
                <div class="section1-container-top__main">
                    <h1>
                        Reset password
                    </h1>
                    <form action="{{ route('password.update') }}" method="POST">
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
                            <label for="password_confirmation">
                                Password confirmation
                                <input type="password" name="password_confirmation" required>
                            </label>
                            <label>
                                <input type="hidden" name="token" value="{{$token}}" required>
                            </label>
                            <button type="submit">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
