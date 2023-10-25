@extends('layouts.dashboard.app')

@section('container')
    <div class="pagetitle">
        <h1>{{ $guru->name }}</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">Users</li>
                <li class="breadcrumb-item"><a href="{{ route('admin.users.guru.index') }}">Guru</a></li>
                <li class="breadcrumb-item">{{ $title }}</li>
                <li class="breadcrumb-item active">{{ $guru->name }}</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            Address
                        </h5>

                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Address</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($number=1)
                                @foreach ($alamatGuru as $item)
                                    <tr>
                                        <th scope="row">{{ $number }}</th>
                                        <td>{{ $item->alamat }}</td>
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
                                @php($groupedJadwals = collect($jadwals)->groupBy('hari.name'))
                                @foreach ($groupedJadwals as $day => $dayJadwals)
                                    @php($rowspan = count($dayJadwals))
                                    @php($innerNumber = 1)
                                    @foreach ($dayJadwals as $index => $jadwal)
                                        <tr>
                                            @if ($index === 0)
                                                <th scope="row" rowspan="{{ $rowspan }}">{{ $number }}</th>
                                                <td rowspan="{{ $rowspan }}">{{ $day }}</td>
                                            @endif
                                            <td>{{ $jadwal->name }}</td>
                                            <td>{{ $jadwal->mataPelajaran->name }}</td>
                                            <td>{{ $jadwal->jenjang->name }}</td>
                                            <td>{{ $jadwal->waktu_mulai }} - {{ $jadwal->waktu_akhir }}</td>
                                            <td>Rp {{ number_format($jadwal->harga, 2, ',', '.') }}</td>
                                            @if ($index === 0)
                                                @php($number++)
                                            @endif
                                        </tr>
                                        @php($innerNumber++)
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>

            </div>
        </div>

    </section>
@endsection