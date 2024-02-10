<?php
/** @var \App\View\Objects\DropdownItem[] $fieldTypes */
?>

@extends('layouts.admin-layout')

@section('content')
    <section class="section1__lk-agreement">
        <div class="container container-lk">
            <form method="POST" action="{{ route('admin.field.store') }}">
                @csrf
                <div class="row">
                    <div class="col-md-8 offset-2">
                        <div class="card">
                            <div class="card-header">{{ __('Create field') }}</div>

                            <div class="card-body">
                                <x-input-text field="name" />
                                <x-input-text field="label" />
                                <x-input-dropdown field="type" :items="$fieldTypes" />

                                <x-submit-button name="submit" />
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
