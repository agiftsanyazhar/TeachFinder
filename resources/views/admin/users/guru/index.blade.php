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
                            <span>
                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalForm"
                                    onclick="openFormDialog('modalForm', 'add')"><i class="bi bi-plus"></i></button>
                            </span> 
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
                                            <div class="d-flex">
                                                <a href="{{ route('admin.users.guru.detail.index', $guru->id) }}" class="btn btn-primary text-white ms-1 me-1"><i class="bi bi-eye"></i></a>
                                                <button type="button" class="btn btn-warning text-white" data-bs-toggle="modal"
                                                    data-bs-target="#modalForm"
                                                    onclick="openFormDialog('modalForm', 'edit', '{{ $guru->id }}', '{{ $guru->name }}', '{{ $guru->email }}', '{{ $guru->phone }}', '{{ $guru->lokasi_id }}', '{{ $guru->description }}')">
                                                    <i class="bi bi-pencil-square"></i>
                                                </button>
                                                @if ($guru->is_verified == 0)
                                                    <form action="{{ route('admin.users.guru.update-status', $guru->id) }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $guru->id }}">
                                                        <button type="submit" class="btn btn-success text-white ms-1 me-1"><i class="bi bi-check-lg"></i></button>
                                                    </form>
                                                @endif
                                            </div>
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

    <!-- Modal -->
    <div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><b>{{ $title }}</b></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3" id="formModal" action="{{ route('admin.users.guru.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-6 mb-3">
                            <input class="form-control clear-after mb-3" type="hidden" placeholder="ID" name="id"
                                aria-label="default input example">
                            <label class="form-label"><b>Name</b><span class="text-danger text-bold"><b>*</b></span></label>
                            <input class="form-control" type="text" placeholder="Teacher Name" name="name" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label"><b>Location</b><span class="text-danger text-bold"><b>*</b></span></label>
                            <select class="form-select mb-3" aria-label="Default select example" name="lokasi_id" required>
                                <option value="" disabled selected hidden>Teacher Location</option>
                                @foreach($listLokasi as $lokasi)
                                    <option value="{{ $lokasi->id }}">{{ $lokasi->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label"><b>Phone</b><span class="text-danger text-bold"><b>*</b></span></label>
                            <input class="form-control" type="number" placeholder="Teacher Phone" name="phone" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label"><b>Email</b><span class="text-danger text-bold"><b>*</b></span></label>
                            <input class="form-control" type="email" placeholder="Teacher Email" name="email" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label"><b>Password</b></label>
                            <input class="form-control" type="text" placeholder="Teacher Password" name="password">
                        </div>
                        
                        <div class="col-md-12 mb-3">
                            <label for="formFile" class="form-label"><b>Teacher Description</b></label>
                            <textarea class="form-control clear-after" rows="5" placeholder="Teacher Description" name="description" required></textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="formFile" class="form-label"><b>Choose Image</b></label>
                            <input class="form-control" type="file" id="formFile" name="image">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="formFile" class="form-label"><b>Choose SKL/Ijazah</b></label>
                            <input class="form-control" type="file" id="formFile" name="skl_ijazah">
                        </div>
                        <span class="text-danger text-bold"><b>* Required</b></span>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-success" onclick="saveForm()">Save</button>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">

        function saveForm() {
            document.getElementById('formModal').submit();
        }

        function openFormDialog(target, type, id, name, email, phone, lokasi_id, description ) {
            if (type === 'add') {
                $('#' + target + ' form').attr('action', '{{ route('admin.users.guru.store') }}');
                $('#' + target + ' .form-control').val('');
                $('#' + target + ' input[name="name"]').attr('required', 'required');
                $('#' + target + ' input[name="email"]').attr('required', 'required');
                $('#' + target + ' input[name="phone"]').attr('required', 'required');
                $('#' + target + ' select[name="lokasi_id"]').attr('required', 'required');
                $('#' + target + ' textarea[name="description"]').attr('required', 'required');
            } else if (type === 'edit') {
                $('#' + target + ' .clear-after').val('');
                $('#' + target + ' form').attr('action', '{{ route('admin.users.guru.update') }}');
                $('#' + target + ' .clear-after[name="id"]').val(id);
                $('#' + target + ' input[name="name"]').val(name);
                $('#' + target + ' input[name="email"]').val(email);
                $('#' + target + ' input[name="phone"]').val(phone);
                $('#' + target + ' textarea[name="description"]').val(description);
            }
            $('#' + target).modal('toggle');
            $('#' + target).attr('data-operation-type', type);
        }

    </script>

@endsection