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
                            <span>
                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalFormAlamatGuru"
                                    onclick="openFormDialogAlamatGuru('modalFormAlamatGuru', 'add', '{{ $guru->id }}')"><i class="bi bi-plus"></i></button>
                            </span> 
                        </h5>

                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($number=1)
                                @foreach ($alamatGuru as $itemAlamat)
                                    <tr>
                                        <th scope="row">{{ $number }}</th>
                                        <td>{{ $itemAlamat->alamat }}</td>
                                        <td>
                                            <button type="button" class="btn btn-warning text-white" data-bs-toggle="modal"
                                                data-bs-target="#modalFormAlamatGuru"
                                                onclick="openFormDialogAlamatGuru('modalFormAlamatGuru', 'edit', '{{ $itemAlamat->id }}', '{{ $itemAlamat->alamat }}', '{{ $itemAlamat->guru_id }}')">
                                                <i class="bi bi-pencil-square"></i>
                                            </button>
                                            <a href="{{ route('admin.users.guru.detail.destroy-alamat-guru', ['guru_id' => $itemAlamat->guru_id, 'id' => $itemAlamat->id]) }}" class="btn btn-danger text-white ms-1 me-1"><i class="bi bi-trash"></i></a>
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
    
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            Schedule
                            <span>
                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalFormJadwal"
                                    onclick="openFormDialogJadwal('modalFormJadwal', 'add', '{{ $guru->id }}')"><i class="bi bi-plus"></i></button>
                            </span> 
                        </h5>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Day</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Level</th>
                                    <th scope="col">Time</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Action</th>
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
                                            <td>{{ $jadwal->jenjang->name }}</td>
                                            <td>{{ $jadwal->waktu_mulai }} - {{ $jadwal->waktu_akhir }}</td>
                                            <td>Rp {{ number_format($jadwal->harga, 2, ',', '.') }}</td>
                                            <td>
                                                <button type="button" class="btn btn-warning text-white" data-bs-toggle="modal"
                                                data-bs-target="#modalFormJadwal"
                                                onclick="openFormDialogJadwal('modalFormJadwal', 'edit', '{{ $jadwal->id }}', '{{ $jadwal->day }}' '{{ $jadwal->name }}', '{{ $jadwal->jenjang }}', '{{ $jadwal->waktu_mulai }}', '{{ $jadwal->waktu_akhir }}', '{{ $jadwal->harga }}', '{{ $jadwal->guru_id }}')">
                                                <i class="bi bi-pencil-square"></i>
                                            </button>
                                            <a href="{{ route('admin.users.guru.detail.destroy-jadwal', ['guru_id' => $jadwal->guru_id, 'id' => $jadwal->id]) }}" class="btn btn-danger text-white ms-1 me-1"><i class="bi bi-trash"></i></a>
                                            </td>
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

    <!-- Modal Alamat Guru -->
    <div class="modal fade" id="modalFormAlamatGuru" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><b>{{ $title }}</b></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3" id="formModalAlamatGuru" action="{{ route('admin.users.guru.detail.store-alamat-guru', ['guru_id' => 'guru_id']) }}" method="POST">
                        @csrf
                        <div class="col-md-12 mb-3">
                            <input class="form-control clear-after mb-3" type="hidden" placeholder="ID" name="id"
                                aria-label="default input example">
                            <input class="form-control clear-after mb-3" type="hidden" placeholder="ID" name="guru_id"
                                aria-label="default input example">
                            <label class="form-label"><b>Address</b><span class="text-danger text-bold"><b>*</b></span></label>
                            <input class="form-control" type="text" placeholder="Address" name="alamat" required>
                        </div>
                        <span class="text-danger text-bold"><b>* Required</b></span>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-success" id="saveButtonAlamatGuru">Save</button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Modal Jadwal -->
    <div class="modal fade" id="modalFormJadwal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><b>{{ $title }}</b></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3" id="formModalJadwal" action="{{ route('admin.users.guru.detail.store-jadwal', ['guru_id' => 'guru_id']) }}" method="POST">
                        @csrf
                        <div class="col-md-4 mb-3">
                            <input class="form-control clear-after mb-3" type="hidden" placeholder="ID" name="id"
                                aria-label="default input example">
                            <input class="form-control clear-after mb-3" type="hidden" placeholder="ID" name="guru_id"
                                aria-label="default input example">
                            <label class="form-label"><b>Name</b><span class="text-danger text-bold"><b>*</b></span></label>
                            <input class="form-control" type="text" placeholder="Name" name="name" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label"><b>Level</b><span class="text-danger text-bold"><b>*</b></span></label>
                            <select class="form-select mb-3" aria-label="Default select example" name="jenjang_id">
                                <option value="" disabled selected hidden>Level</option>
                                @foreach($listJenjang as $jenjang)
                                    <option value="{{ $jenjang->id }}">{{ $jenjang->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label"><b>Day</b><span class="text-danger text-bold"><b>*</b></span></label>
                            <select class="form-select mb-3" aria-label="Default select example" name="hari_id">
                                <option value="" disabled selected hidden>Day</option>
                                @foreach($listHari as $hari)
                                    <option value="{{ $hari->id }}">{{ $hari->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label"><b>Time</b><span class="text-danger text-bold"><b>*</b></span></label>
                            <input class="form-control" type="text" placeholder="Time Start. e.g. 10:00" name="waktu_mulai" required><br>
                            <input class="form-control" type="text" placeholder="Time End. e.g. 12:00" name="waktu_akhir" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label"><b>Price</b><span class="text-danger text-bold"><b>*</b></span></label>
                            <input class="form-control" type="number" placeholder="Price" name="harga" required>
                        </div>
                        <span class="text-danger text-bold"><b>* Required</b></span>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-success" id="saveButtonJadwal">Save</button>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        document.getElementById('saveButtonAlamatGuru').addEventListener('click', function () {
            const form = document.getElementById('formModalAlamatGuru');
            form.submit();
        });

        document.getElementById('saveButtonJadwal').addEventListener('click', function () {
            const form = document.getElementById('formModalJadwal');
            form.submit();
        });

        function openFormDialogAlamatGuru(target, type, id, name, alamat, guru_id) {
            if (type === 'add') {
                $('#' + target + ' form').attr('action', '{{ route('admin.users.guru.detail.store-alamat-guru', ['guru_id' => 'guru_id']) }}');
                $('#' + target + ' .form-control').val('');
                $('#' + target + ' input[name="guru_id"]').val(id);
                $('#' + target + ' input[name="alamat"]');
            } else if (type === 'edit') {
                const editUrl = '{{ url('admin/users/guru/detail') }}' + '/' + guru_id + '/update-alamat-guru';
                $('#' + target + ' .clear-after').val('');
                $('#' + target + ' form').attr('action', editUrl);
                $('#' + target + ' .clear-after[name="id"]').val(id);
                $('#' + target + ' input[name="guru_id"]').val(guru_id);
                $('#' + target + ' input[name="alamat"]').val(alamat);
            }
            $('#' + target).modal('toggle');
            $('#' + target).attr('data-operation-type', type);
        }

        function openFormDialogJadwal(target, type, id, day, name, jenjang, waktu_mulai, waktu_akhir, harga, guru_id) {
            if (type === 'add') {
                $('#' + target + ' form').attr('action', '{{ route('admin.users.guru.detail.store-jadwal', ['guru_id' => 'guru_id']) }}');
                $('#' + target + ' .form-control').val('');
                $('#' + target + ' input[name="guru_id"]').val(id);
                $('#' + target + ' input[name="name"]');
                $('#' + target + ' input[name="waktu_mulai"]');
                $('#' + target + ' input[name="waktu_akhir"]');
                $('#' + target + ' input[name="harga"]');
            } else if (type === 'edit') {
                const editUrl = '{{ url('admin/users/guru/detail') }}' + '/' + guru_id + '/update-jadwal';
                $('#' + target + ' .clear-after').val('');
                $('#' + target + ' form').attr('action', editUrl);
                $('#' + target + ' .clear-after[name="id"]').val(id);
                $('#' + target + ' input[name="guru_id"]').val(guru_id);
                $('#' + target + ' input[name="name"]').val(name);
                $('#' + target + ' input[name="waktu_mulai"]').val(waktu_mulai);
                $('#' + target + ' input[name="waktu_akhir"]').val(waktu_akhir);
                $('#' + target + ' input[name="harga"]').val(harga);
            }
            $('#' + target).modal('toggle');
            $('#' + target).attr('data-operation-type', type);
        }

    </script>
@endsection