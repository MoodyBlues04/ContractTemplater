<?php
/** @var \App\Models\Field[] $fieldOptions */
?>

@extends('layouts.admin-layout')

@section('content')
    <section class="section1__lk-agreement">
        <div class="container container-lk">
            <form method="POST" action="{{ route('admin.document_type.store') }}">
                @csrf
                <div class="row">
                    <div class="col-md-8 offset-2">
                        <div class="card">
                            <div class="card-header">{{ __('Create document type') }}</div>

                            <div class="card-body">
                                <x-input-text field="name" />

{{--                                TODO checkbox-dropdown --}}
                                <x-input-checkbox-list field="fields" :items="$fieldOptions" />

                                <x-submit-button name="submit" />
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
