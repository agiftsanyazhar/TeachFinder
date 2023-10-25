@extends('layouts.dashboard.app')

@section('container')
    <div class="pagetitle">
        <h1>{{ $title }}</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
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
                                    <th scope="col">Student</th>
                                    <th scope="col">Name Schedule</th>
                                    <th scope="col">is Payed?</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($number=1)
                                @foreach ($pesanans as $pesanan)
                                    <tr>
                                        <th scope="row">{{ $number }}</th>
                                        <td>{{ $pesanan->murid->name }}</td>
                                        <td>{{ $pesanan->jadwal->name }}</td>
                                        <td>{{ $pesanan->status == 1 ? 'Yes' : 'No' }}</td>
                                        <td>{{ $pesanan->description }}</td>
                                        <td>
                                            <a href="{{ route('admin.pesanan.detail.index', $pesanan->id) }}" class="btn btn-primary text-white ms-1 me-1"><i class="bi bi-eye"></i></a>
                                        </td>
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