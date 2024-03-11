<?php
/**
 * @var \App\Models\User[] $users
 */
?>

@extends('layouts.admin-layout')

@section('content')
    <section class="section1__lk-agreement">
        <div class="container container-lk">
            <div class="col md-10">
                <h3>Users</h3>

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Tariff</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $idx => $user)
                        <tr>
                            <th scope="row">{{ $idx + 1 }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone }}</td>
                            <td> {{$user->subscription->tariff->name ?? 'No tariff paid' }} </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
