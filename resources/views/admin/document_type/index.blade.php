<?php
/**
 * @var \App\Models\DocumentType[] $documentTypes
 */
?>

@extends('layouts.admin-layout')

@section('content')
    <section class="section1__lk-agreement">
        <div class="container container-lk">
            <div class="col md-10">
                <h3>Document types</h3>

                {{--                <a href="{{ route('admin.field.create') }}" class="btn btn-primary">--}}
                <a href="" class="btn btn-primary">
                    Create
                </a>

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Fields</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($documentTypes as $idx => $documentType)
                        <tr>
                            <th scope="row">{{ $idx + 1 }}</th>
                            <td>{{ $documentType->name }}</td>
                            <td>{{ $documentType->fields->map(fn($field) => $field->name)->toJson() }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
