@php
    /** @var \App\Models\Tariff[] $tariffs */
@endphp

@extends('layouts.user-layout')

@section('content')
    <section class="section1__lk-agreement">
        <div class="container container-lk">
            <div class="section1-top__lk-tarifs">
                <h1 class="section1-title__lk-documents">Тарифы</h1>
                <div class="section1-top-right__lk-tarifs">
                    <p>Помесячно</p>
                    <label class="switch">
                        <input type="checkbox" checked>
                        <span class="slider round"></span>
                    </label>
                    <p>Годовая</p>
                </div>
            </div>
            <div class="section1-container__lk-tarifs">
                @foreach($tariffs as $tariff)
                    <div class="section1-container-block__lk-tarifs">
                        <span>{{$tariff->name}}</span>
                        <h3>{{$tariff->price}} руб.</h3>
                        <ul>
                            @foreach($tariff->options as $option => $value)
                                <li>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                        <path d="M14.1924 0.102905C17.5475 0.102905 19.7942 2.45841 19.7942 5.96199V14.0489C19.7942 17.5416 17.5475 19.8971 14.1924 19.8971H5.61165C2.25654 19.8971 0 17.5416 0 14.0489V5.96199C0 2.45841 2.25654 0.102905 5.61165 0.102905H14.1924ZM14.0341 7.03087C13.6976 6.69437 13.1433 6.69437 12.8068 7.03087L8.71934 11.1184L6.98735 9.38638C6.65085 9.04988 6.09661 9.04988 5.76011 9.38638C5.42361 9.72288 5.42361 10.2672 5.76011 10.6136L8.11562 12.9592C8.28387 13.1275 8.5016 13.2067 8.71934 13.2067C8.94697 13.2067 9.16471 13.1275 9.33296 12.9592L14.0341 8.25811C14.3706 7.92161 14.3706 7.37727 14.0341 7.03087Z" fill="#4D4D4D"/>
                                    </svg>
                                    {{$value}} {{$option}}
                                </li>
                            @endforeach
                        </ul>
                        <form action="{{route('user.payment.pay', $tariff)}}" method="POST">
                            @csrf
                            <button type="submit">
                                Выбрать и оплатить
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
