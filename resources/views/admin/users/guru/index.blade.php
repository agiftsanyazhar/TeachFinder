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
                                    <th scope="col">Description</th>
                                    <th scope="col">is Active?</th>
                                    <th scope="col">Location</th>
                                    <th scope="col">Photo</th>
                                    <th scope="col">SKL/Ijazah</th>
                                    <th scope="col">is Verified?</th>
                                    <th scope="col">is Email Verified?</th>
                                    <th scope="col">Last Login</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($number=1)
                                @foreach ($gurus as $guru)
                                    <tr>
                                        <th scope="row">{{ $number }}</th>
                                        <td>{{ $guru->name }}</td>
                                        <td>{{ $guru->email }}</td>
                                        <td><a href="{{ url('https://wa.me/+' . $guru->phone) }}" target="_blank" rel="noopener noreferrer">{{ $guru->phone }}</a></td>
                                        <td>{{ Str::limit($guru->description, 50) ?: '-' }}</td>
                                        <td>{{ $guru->is_active == 1 ? 'Online' : 'Offline' }}</td>
                                        <td>{{ $guru->lokasi->name }}</td>
                                        <td>
                                            @if ($guru->user->image)
                                                <a href="{{ url('Uploads/user/' . $guru->image) }}" target="_blank" rel="noopener noreferrer">Download</a> 
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td><a href="{{ url('uploads/guru/skl_ijazah/' . $guru->skl_ijazah) }}" target="_blank" rel="noopener noreferrer">Download</a></td>
                                        <td>{{ $guru->is_verified == 1 ? 'Yes' : 'No' }}</td>
                                        <td>{{ $guru->user->email_verified == 1 ? 'Yes (' . $guru->user->email_verified_at .')' : 'No' }}</td>
                                        <td>{{ date('Y-m-d H:i', strtotime($guru->user->last_login)) ?: '-' }}</td>
                                        <td>{{ date('Y-m-d H:i', strtotime($guru->created_at)) }}</td>
                                        <td>
                                            @if ($guru->is_verified == 0)
                                                <div class="d-flex">
                                                    <a href="{{ route('admin.users.guru.detail.index', $guru->id) }}" class="btn btn-primary text-white ms-1 me-1"><i class="bi bi-eye"></i></a>
                                                    <form id="formAccept" action="{{ route('admin.users.guru.update', $guru->id) }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $guru->id }}">
                                                        <a href="{{ route('admin.users.guru.update', $guru->id) }}" class="btn btn-success text-white ms-1 me-1" onclick="event.preventDefault(); getElementById('formAccept').submit();"><i class="bi bi-check-lg"></i></a>
                                                    </form>
                                                </div>
                                            @else
                                                -
                                            @endif
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