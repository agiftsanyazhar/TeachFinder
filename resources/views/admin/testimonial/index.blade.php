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
                                    <th scope="col">Teacher</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Rating</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($number=1)
                                @foreach ($testimonials as $testimonial)
                                    <tr>
                                        <th scope="row">{{ $number }}</th>
                                        <td>{{ $testimonial->pengirim->name }}</td>
                                        <td>{{ $testimonial->penerima->name }}</td>
                                        <td>{{ $testimonial->description }}</td>
                                        <td>
                                            @switch($testimonial->nilai)
                                                @case(1)
                                                    @for ($i = 0; $i < 1; $i++)
                                                        <i class="bi bi-star-fill text-danger"></i>
                                                    @endfor
                                                    @break
                                                @case(2)
                                                    @for ($i = 0; $i < 2; $i++)
                                                        <i class="bi bi-star-fill text-warning"></i>
                                                    @endfor
                                                    @break
                                                @case(3)
                                                    @for ($i = 0; $i < 3; $i++)
                                                        <i class="bi bi-star-fill text-secondary"></i>
                                                    @endfor
                                                    @break
                                                @case(4)
                                                    @for ($i = 0; $i < 4; $i++)
                                                        <i class="bi bi-star-fill text-primary"></i>
                                                    @endfor
                                                    @break
                                                @case(5)
                                                    @for ($i = 0; $i < 5; $i++)
                                                        <i class="bi bi-star-fill text-success"></i>
                                                    @endfor
                                                    @break
                                            @endswitch
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