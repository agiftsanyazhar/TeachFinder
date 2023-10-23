@extends('layouts.dashboard.app')

@section('container')
    <div class="pagetitle">
        <h1>{{ $title }}</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">Users</li>
                <li class="breadcrumb-item active">{{ $title }}</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            {{ $title }}
                        </h5>

                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">is Email Verified?</th>
                                    <th scope="col">Last Login</th>
                                    <th scope="col">Created At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($number=1)
                                @foreach ($users as $user)
                                    <tr>
                                        <th scope="row">{{ $number }}</th>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->role->name }}</td>
                                        <td>{{ $user->email_verified == 1 ? 'Yes (' . date('Y-m-d H:i', strtotime($user->email_verified_at)) .')' : '-' }}</td>
                                        <td>{{ date('Y-m-d H:i', strtotime($user->last_login)) ?: '-' }}</td>
                                        <td>{{ date('Y-m-d H:i', strtotime($user->created_at)) }}</td>
                                    </tr>
                                    @php($number++)
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>

            </div>
        </div>

    </section>
@endsection