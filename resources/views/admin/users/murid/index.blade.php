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
                                    <th scope="col">Level</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">is Email Verified?</th>
                                    <th scope="col">Last Login</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Action</th>
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
                                        <td>
                                            <div class="d-flex">
                                                <button type="button" class="btn btn-warning text-white" data-bs-toggle="modal"
                                                    data-bs-target="#modalForm"
                                                    onclick="openFormDialog('modalForm', 'edit', '{{ $murid->id }}', '{{ $murid->name }}', '{{ $murid->email }}', '{{ $murid->phone }}', '{{ $murid->jenjang }}', '{{ $murid->alamat }}')">
                                                    <i class="bi bi-pencil-square"></i>
                                                </button>
                                                <a href="{{ route('admin.users.murid.destroy', $murid->id) }}" class="btn btn-danger text-white ms-1 me-1"><i class="bi bi-trash"></i></a>
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
                    <form class="row g-3" id="formModal" action="{{ route('admin.users.murid.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-6 mb-3">
                            <input class="form-control clear-after mb-3" type="hidden" placeholder="ID" name="id"
                                aria-label="default input example">
                            <label class="form-label"><b>Name</b><span class="text-danger text-bold"><b>*</b></span></label>
                            <input class="form-control" type="text" placeholder="Student Name" name="name" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label"><b>Level</b><span class="text-danger text-bold"><b>*</b></span></label>
                            <select class="form-select mb-3" aria-label="Default select example" name="jenjang_id" required>
                                <option value="" disabled selected hidden>Student Level</option>
                                @foreach($listJenjang as $jenjang)
                                    <option value="{{ $jenjang->id }}">{{ $jenjang->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label"><b>Phone</b></label>
                            <input class="form-control" type="number" placeholder="Student Phone" name="phone" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label"><b>Email</b><span class="text-danger text-bold"><b>*</b></span></label>
                            <input class="form-control" type="email" placeholder="Student Email" name="email" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label"><b>Password</b></label>
                            <input class="form-control" type="password" placeholder="Student Password" name="password">
                        </div>
                        
                        <div class="col-md-12 mb-3">
                            <label for="formFile" class="form-label"><b>Student Address</b></label>
                            <textarea class="form-control clear-after" rows="5" placeholder="Student Address" name="alamat" required></textarea>
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

        function openFormDialog(target, type, id, name, email, phone, jenjang_id, alamat ) {
            if (type === 'add') {
                $('#' + target + ' form').attr('action', '{{ route('admin.users.murid.store') }}');
                $('#' + target + ' .form-control').val('');
                $('#' + target + ' input[name="name"]');
                $('#' + target + ' input[name="email"]');
                $('#' + target + ' input[name="phone"]');
                $('#' + target + ' select[name="jenjang_id"]');
                $('#' + target + ' textarea[name="alamat"]');
            } else if (type === 'edit') {
                $('#' + target + ' .clear-after').val('');
                $('#' + target + ' form').attr('action', '{{ route('admin.users.murid.update') }}');
                $('#' + target + ' .clear-after[name="id"]').val(id);
                $('#' + target + ' input[name="name"]').val(name);
                $('#' + target + ' input[name="email"]').val(email);
                $('#' + target + ' input[name="phone"]').val(phone);
                $('#' + target + ' textarea[name="alamat"]').val(alamat);
            }
            $('#' + target).modal('toggle');
            $('#' + target).attr('data-operation-type', type);
        }

    </script>
@endsection