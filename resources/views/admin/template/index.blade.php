<?php
/**
 * @var \App\Models\Template[] $templates
 */
?>

@extends('layouts.admin-layout')

@section('content')
    <section class="section1__lk-agreement">
        <div class="container container-lk">
            <div class="col md-10">
                <h3>Templates</h3>

                {{--                <a href="{{ route('admin.field.create') }}" class="btn btn-primary">--}}
                <a href="" class="btn btn-primary">
                    Create
                </a>

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Storage path</th>
                        <th scope="col">Fields</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($templates as $idx => $template)
                        <tr>
                            <th scope="row">{{ $idx + 1 }}</th>
                            <td>{{ $template->name }}</td>
                            <td>{{ $template->storage_path }}</td>
                            <td>{{ $template->fields->map(fn($field) => $field->name)->toJson() }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
