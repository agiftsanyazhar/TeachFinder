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
                                    <th scope="col">Phone</th>
                                    <th scope="col">Jenjang</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">is Email Verified?</th>
                                    <th scope="col">Last Login</th>
                                    <th scope="col">Created At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($number=1)
                                @foreach ($murids as $murid)
                                    <tr>
                                        <th scope="row">{{ $number }}</th>
                                        <td>{{ $murid->name }}</td>
                                        <td>{{ $murid->email }}</td>
                                        <td><a href="{{ url('https://wa.me/+' . $murid->phone) }}" target="_blank" rel="noopener noreferrer">{{ $murid->phone }}</a></td>
                                        <td>{{ $murid->jenjang->name }}</td>
                                        <td>{{ Str::limit($murid->alamat, 50) ?: '-' }}</td>
                                        <td>{{ $murid->user->email_verified == 1 ? 'Yes (' . $murid->user->email_verified_at .')' : 'No' }}</td>
                                        <td>{{ date('Y-m-d H:i', strtotime($murid->user->last_login)) ?: '-' }}</td>
                                        <td>{{ date('Y-m-d H:i', strtotime($murid->created_at)) }}</td>
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