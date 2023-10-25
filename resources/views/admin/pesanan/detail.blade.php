@extends('layouts.dashboard.app')

@section('container')
    <div class="pagetitle">
        <h1>{{ $pesanans->murid->name }}</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.pesanan.index') }}">Pesanan</a></li>
                <li class="breadcrumb-item">{{ $title }}</li>
                <li class="breadcrumb-item active">{{ $pesanans->murid->name }}</li>
            </ol>
        </nav>
    </div>
    
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            Schedule
                        </h5>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Teacher</th>
                                    <th scope="col">Day</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Subject</th>
                                    <th scope="col">Level</th>
                                    <th scope="col">Time</th>
                                    <th scope="col">Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($number=1)
                                @foreach ($jadwals as $jadwal)
                                    <tr>
                                        <th scope="row">{{ $number }}</th>
                                        <td>{{ $jadwal->guru->name }}</td>
                                        <td>{{ $jadwal->hari->name }}</td>
                                        <td>{{ $jadwal->name }}</td>
                                        <td>{{ $jadwal->mataPelajaran->name }}</td>
                                        <td>{{ $jadwal->jenjang->name }}</td>
                                        <td>{{ $jadwal->waktu_mulai }} - {{ $jadwal->waktu_akhir }}</td>
                                        <td>Rp {{ number_format($jadwal->harga, 2, ',', '.') }}</td>
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