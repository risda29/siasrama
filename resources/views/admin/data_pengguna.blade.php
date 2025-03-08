@extends('layout.layout_admin')
@section('title', 'Data pengguna')
@section('content')

<!-- Notifikasi pesan flash -->
@if(session('success'))
    <div class="alert alert-success" id="flash-message">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger" id="flash-message">
        {{ session('error') }}
    </div>
@endif


<!-- End Page Title -->

<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body overflow-auto">
                    <h5 class="card-title">Datatables</h5>

                    {{-- tambahhh dataaaa uyy --}}
                    <div class="d-flex justify-content-end align-items-center mb-3" style="margin-right: 50px;">
                        <a href="{{ url('data-pengguna') }}" class="btn btn-primary btn-sm">Tambah Data</a>
                    </div>

                    <!-- Table with stripped rows -->
                    <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">
                        <div class="datatable-top">
                            <div class="datatable-dropdown">
                                <label>
                                    <select class="datatable-selector" name="per-page">
                                        <option value="5">5</option>
                                        <option value="10" selected>10</option>
                                        <option value="15">15</option>
                                        <option value="-1">All</option>
                                    </select>
                                    entries per page
                                </label>
                            </div>
                            <div class="datatable-search">
                                <input class="datatable-input" placeholder="Search..." type="search" name="search" title="Search within table">
                            </div>
                        </div>
                        <div class="datatable-container">
                            <table class="table datatable datatable-table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Level</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach( $data_pengguna as $no=> $item)
                                    <tr>
                                        <td>{{ $no + 1 }}</td>
                                        <td>{{ $item->username }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->level }}</td>
                                        <td>
                                           {{-- Editttttttttt --}}
                                           <a href="#" class="btn btn-warning btn-sm d-inline-block me-2" data-bs-toggle="modal" data-bs-target="#editPenggunaModal{{ $item->id_pengguna }}">Edit</a>
                                         
                                           
                                           {{-- hapusssssssssss --}}
                                           <form action="{{ url('pengguna_destroy'.$item->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Kamu Yakin Menghapus Data Pengguna Ini?')">Hapus</button>
                                        </form>
                                      
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Modal Tambah Data -->
                    <div class="modal fade" id="tambahPenggunaModal" tabindex="-1" aria-labelledby="tambahPenggunaModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="tambahPenggunaModalLabel">Tambah Data Pengguna</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ url('data-pengguna') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="username" class="form-label">Username</label>
                                            <input type="text" class="form-control" id="username" name="username" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="nik" class="form-label">NIK</label>
                                            <input type="number" class="form-control" id="nik" name="nik" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label"> Email</label>
                                            <input type="text" class="form-control" id="email" name="email" required>
                                        </div>
                                        <div class="form-group row">
                                            <label for="level" class="col-sm-3 required">Level</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" name="level" id="level">
                                                    <option value="">-Pilih-</option>
                                                    <option value="Admin">Admin</option>
                                                    <option value="Kepala Yayasan">Kepala Yayasan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Tambah</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Edit -->
                    @foreach ($data_pengguna as $item)
                    <div class="modal fade" id="editPenggunaModal{{ $item->id_pengguna}}" tabindex="-1" aria-labelledby="editPenggunaModalLabel{{ $item->id_pengguna}}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editPenggunaModalLabel{{ $item->id_pengguna}}">Edit Data Pengguna</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ url('data-pengguna'.$item->id_pengguna) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                            <label for="username" class="form-label">Username</label>
                                            <input type="text" class="form-control" id="username" name="username" value="{{ $item->username }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="text" class="form-control" id="email" name="email" value="{{ $item->email}}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="text" class="form-control" id="password" name="password" value="{{ $item->password}}" required>
                                        </div>
                                        <div class="form-group row">
                                            <label for="level" class="col-sm-3 required">Level</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" name="level" id="level">
                                                    <option value="">-Pilih-</option>
                                                    <option value="Admin" {{ $item->level == 'Admin' ? 'selected' : '' }}>Admin</option>
                                                    <option value="Kepala Yayasan" {{ $item->level == 'Kepala Yayasan' ? 'selected' : '' }}>Kepala Yayasan</option>
                                                    <option value="Santri" {{ $item->level == 'Santri' ? 'selected' : '' }}>Santri</option>
                                                </select>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.querySelector('.btn-primary').addEventListener('click', function(e) {
        e.preventDefault(); // Cegah redirect default
        new bootstrap.Modal(document.getElementById('tambahPenggunaModal')).show();
    });

    setTimeout(function() {
        var flashMessage = document.getElementById('flash-message');
        if (flashMessage) {
            flashMessage.style.display = 'none';
        }
    }, 3000);
</script>

@endsection
