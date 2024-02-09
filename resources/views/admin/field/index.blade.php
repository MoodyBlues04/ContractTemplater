<?php
/**
 * @var \App\Models\Field[] $fields
 */
?>

@extends('layouts.admin-layout')

@section('content')
    <section class="section1__lk-agreement">
        <div class="container container-lk">
            <div class="col md-10">
                <h3>Fields</h3>

{{--                <a href="{{ route('admin.field.create') }}" class="btn btn-primary">--}}
                <a href="" class="btn btn-primary">
                    Create
                </a>

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Type</th>
                        <th scope="col">Label</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($fields as $idx => $field)
                        <tr>
                            <th scope="row">{{ $idx + 1 }}</th>
                            <td>{{ $field->name }}</td>
                            <td>{{ $field->type }}</td>
                            <td>{{ $field->label }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
