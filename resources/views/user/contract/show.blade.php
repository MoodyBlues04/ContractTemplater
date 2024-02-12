<?php
    /**
     * @var \App\Models\Contract $contract
     */

    /** @var \App\Models\User $user */
    $user = \Illuminate\Support\Facades\Auth::user();
?>

@extends('layouts.user-layout')

@section('content')
    <section class="section1__lk-agreement">
        <div class="container container-lk">
            <h1 class="section1-title__lk-documents">Договоры</h1>
            <div class="section1-top__lk-agreement">
                <a href="{{ route('user.contract.index') }}"
                    class="section1-top-block__lk-agreement">
                    Создание договора
                </a>
                <div data-tab-agreement="#agreement1"
                     class="section1-top-block__lk-agreement section1-top-block-active__lk-agreement">
                    Просмотр и редактирование договора
                </div>
            </div>

            <div id="agreement1" class="section1-container__lk-agreement section1-container-active__lk-agreement">
{{--                @if(is_null($user->subscription) || $user->subscription->status === \App\Models\Enums\SubscriptionStatus::STATUS_INACTIVE)--}}
{{--                    <div class="section1-container-blur__lk-agreement">--}}
{{--                        <p>--}}
{{--                            Доступ откроется после оплаты подписки на нашем сервисе--}}
{{--                        </p>--}}
{{--                        <a href="{{ route('user.tariff.index') }}">--}}
{{--                            Выбрать тариф для оплаты--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                @endif--}}

                <embed src="{{ $contract->pdfFile->getPublicUrl() }}" type="application/pdf" width="100%" height="100%">
                <div class="section1-container-btns__lk-agreement">
                    <a href="{{ route('user.contract.edit', $contract) }}" class="redact-data-btn">Редактировать данные</a>
                    <a href="{{ route('user.contract.upload', $contract) }}" class="download-pdf-btn">Скачать pdf договор</a>
                </div>
            </div>
        </div>
    </section>
@endsection
