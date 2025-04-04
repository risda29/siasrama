@extends('layout.layout_admin')
@section('title', 'Data Santri/i')
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



<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body overflow-auto">
                    <h5 class="card-title"></h5>
                    <!-- Tombol Tambah Data -->
                    <div class="d-flex justify-content-end align-items-center mb-3" style="margin-right: 50px;">
                        <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#tambahSantriModal">Tambah Data</a>
                    </div>

                    <!-- Tabel Data Santri -->
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
                                        <th>Nama Santri</th>
                                        <th>Tempat Lahir</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Alamat</th>
                                        <th>Nama Ibu</th>
                                        <th>No HP Ibu</th>
                                        <th>Nama Ayah</th>
                                        <th>No HP Ayah</th>
                                        <th>Nama Wali</th>
                                        <th>No HP Wali</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data_santri as $no => $item)
                                    <tr>
                                        <td>{{ $no + 1 }}</td>
                                        <td>{{ $item->nm_santri }}</td>
                                        <td>{{ $item->tempat_lahir }}</td>
                                        <td>{{ \Carbon\Carbon::parse($item->tanggal_lahir)->format('d-m-Y') }}</td>
                                        <td>{{ $item->jenis_kelamin }}</td>
                                        <td>{{ $item->alamat }}</td>
                                        <td>{{ $item->nama_ibu }}</td>
                                        <td>{{ $item->nhp_ibu }}</td>
                                        <td>{{ $item->nama_ayah }}</td>
                                        <td>{{ $item->nhp_ayah }}</td>
                                        <td>{{ $item->nama_wali }}</td>
                                        <td>{{ $item->nhp_wali }}</td>
                                        <td>
                                            <a href="#" class="btn btn-warning btn-sm d-inline-block me-2" data-bs-toggle="modal" data-bs-target="#editSantriModal{{ $item->id_santri }}">Edit</a>
                                            <form action="{{ url('santri_destroy/'.$item->id_santri) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Kamu Yakin Menghapus Data Santri/i Ini?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal Tambah Data -->
<div class="modal fade" id="tambahSantriModal" tabindex="-1" aria-labelledby="tambahSantriModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahSantriModalLabel">Tambah Data Santri</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ url('data-santri') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="nisn" class="form-label">NISN</label>
                        <input type="number" class="form-control" id="nisn" name="nisn" required>
                    </div>
                    <div class="mb-3">
                        <label for="nm_santri" class="form-label">Nama Santri</label>
                        <input type="text" class="form-control" id="nm_santri" name="nm_santri" required>
                    </div>
                    <div class="mb-3">
                        <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" >
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" >
                    </div>
                    <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                            <option value="" disabled selected>Pilih Jenis Kelamin</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="3" ></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="nama_ibu" class="form-label">Nama Ibu</label>
                        <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" >
                    </div>
                    <div class="mb-3">
                        <label for="nhp_ibu" class="form-label">No HP Ibu</label>
                        <input type="text" class="form-control" id="nhp_ibu" name="nhp_ibu" >
                    </div>
                    <div class="mb-3">
                        <label for="nama_ayah" class="form-label">Nama Ayah</label>
                        <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" >
                    </div>
                    <div class="mb-3">
                        <label for="nhp_ayah" class="form-label">No HP Ayah</label>
                        <input type="text" class="form-control" id="nhp_ayah" name="nhp_ayah" >
                    </div>
                    <div class="mb-3">
                        <label for="nama_wali" class="form-label">Nama Wali</label>
                        <input type="text" class="form-control" id="nama_wali" name="nama_wali" >
                    </div>
                    <div class="mb-3">
                        <label for="nhp_wali" class="form-label">No HP Wali</label>
                        <input type="text" class="form-control" id="nhp_wali" name="nhp_wali" >
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit -->
@foreach ($data_santri as $item)
<div class="modal fade" id="editSantriModal{{ $item->id_santri }}" tabindex="-1" aria-labelledby="editSantriModalLabel{{ $item->id_santri }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editSantriModalLabel{{ $item->id_santri }}">Edit Data Santri</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ url('data-santri/'.$item->id_santri) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="nm_santri" class="form-label">Nama Santri</label>
                        <input type="text" class="form-control" id="nm_santri" name="nm_santri" value="{{ $item->nm_santri }}" >
                    </div>
                    <div class="mb-3">
                        <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="{{ $item->tempat_lahir }}" >
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ $item->tanggal_lahir }}" >
                    </div>
                    <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" >
                            <option value="Laki-laki" {{ $item->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="Perempuan" {{ $item->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="3" >{{ $item->alamat }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="nama_ibu" class="form-label">Nama Ibu</label>
                        <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" value="{{ $item->nama_ibu }}" >
                    </div>
                    <div class="mb-3">
                        <label for="nhp_ibu" class="form-label">No HP Ibu</label>
                        <input type="text" class="form-control" id="nhp_ibu" name="nhp_ibu" value="{{ $item->nhp_ibu }}" >
                    </div>
                    <div class="mb-3">
                        <label for="nama_ayah" class="form-label">Nama Ayah</label>
                        <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" value="{{ $item->nama_ayah }}" >
                    </div>
                    <div class="mb-3">
                        <label for="nhp_ayah" class="form-label">No HP Ayah</label>
                        <input type="text" class="form-control" id="nhp_ayah" name="nhp_ayah" value="{{ $item->nhp_ayah }}" >
                    </div>
                    <div class="mb-3">
                        <label for="nama_wali" class="form-label">Nama Wali</label>
                        <input type="text" class="form-control" id="nama_wali" name="nama_wali" value="{{ $item->nama_wali }}" >
                    </div>
                    <div class="mb-3">
                        <label for="nhp_wali" class="form-label">No HP Wali</label>
                        <input type="text" class="form-control" id="nhp_wali" name="nhp_wali" value="{{ $item->nhp_wali }}" >
                    </div>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
<!-- Template Main JS File -->
<script src="{{ asset('/') }}niceadmin/assets/js/main.js"></script>

<script>
    document.querySelector('.btn-primary').addEventListener('click', function(e) {
        e.preventDefault(); // Cegah redirect default
        new bootstrap.Modal(document.getElementById('tambahSantriModal')).show();
    });

    setTimeout(function() {
        var flashMessage = document.getElementById('flash-message');
        if (flashMessage) {
            flashMessage.style.display = 'none';
        }
    }, 3000);
</script>
@endsection
