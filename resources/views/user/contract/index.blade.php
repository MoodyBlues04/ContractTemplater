<?php
/** @var \App\Models\Contract[] $contracts */
?>

@extends('user.contract.contract-layout')

@section('scripts')
    <script>
        window.onload = () => {
            document.getElementById('contract-list-button')
                .classList.add('section1-top-block-active__lk-agreement');
        }
    </script>
@endsection

@section('contract-section')
    <div id="agreement1" class="section1-container__lk-agreement section1-container-active__lk-agreement">
        @foreach($contracts as $contract)
            <div class="section1-container-block__lk-agreement">
                <div class="section1-container-block-img__lk-agreement">
                    <img src="{{ asset('img/image%2010.png') }}" alt="">
                </div>
                <div class="section1-container-block-text__lk-agreement">
                    <h3>{{ $contract->name }}</h3>
                    <p>
                        {{ $contract->description ?? '' }}
                    </p>
                </div>
                <a type="button" class="openModal">Выбрать</a>
            </div>
        @endforeach
    </div>
@endsection
