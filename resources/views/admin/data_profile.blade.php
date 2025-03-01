@extends('layout.layout_admin')
@section('title', 'Data Profil')
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
                    <h5 class="card-title"></h5>

                    {{-- tambahhh dataaaa uyy --}}
                    <div class="d-flex justify-content-end align-items-center mb-3" style="margin-right: 50px;">
                        <a href="{{ url('data-profile') }}" class="btn btn-primary btn-sm">Tambah Data</a>
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
                                        <th>Deskripsi</th>
                                        <th>Gambar</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                             
                                    <tbody>
                                        @foreach( $data_profile as $no => $item )
                                        <tr>
                                            <td>{{ $no + 1 }}</td>
                                            <td>{{ $item->deskripsi }}</td>
                                            <td>
                                                <img src="{{ asset('uploads/' . $item->gambar) }}" alt="Gambar" width="100">
                                            </td>
                                            <td>
                                                {{-- Edit --}}
                                                <a href="#" class="btn btn-warning btn-sm d-inline-block me-2" data-bs-toggle="modal" data-bs-target="#editProfileModal{{ $item->id_profile }}">Edit</a>
                                                {{-- Hapus --}}
                                                <form action="{{ url('profile_destroy' . $item->id_profile) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Kamu Yakin Menghapus Data Profile Ini?')">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    
                            </table>
                        </div>
                    </div>

                  <!-- Modal Tambah Data -->
<div class="modal fade" id="tambahProfileModal" tabindex="-1" aria-labelledby="tambahProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahProfileModalLabel">Tambah Data Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ url('data-profile') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <input type="text" class="form-control" id="deskripsi" name="deskripsi" required>
                    </div>
                    <div class="mb-3">
                        <label for="gambar" class="form-label">Gambar</label>
                        <input type="file" class="form-control" id="gambar" name="gambar" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Modal Edit -->
@foreach ($data_profile as $item)
<div class="modal fade" id="editProfileModal{{ $item->id_profile }}" tabindex="-1" aria-labelledby="editProfileModalLabel{{ $item->id_profile }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProfileModalLabel{{ $item->id_profile }}">Edit Data Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ url('data-profile/' . $item->id_profile) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="deskripsi{{ $item->id_profile }}" class="form-label">Deskripsi</label>
                        <input type="text" class="form-control" id="deskripsi{{ $item->id_profile }}" name="deskripsi" value="{{ $item->deskripsi }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="gambar{{ $item->id_profile }}" class="form-label">Gambar</label>
                        <input type="file" class="form-control" id="gambar{{ $item->id_profile }}" name="gambar">
                        @if(isset($item->gambar))
                            <img src="{{ asset('uploads/' . $item->gambar) }}" width="100" alt="Gambar Lama">
                        @else
                            <p>Tidak ada gambar yang diunggah.</p>
                        @endif
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
        new bootstrap.Modal(document.getElementById('tambahProfileModal')).show();
    });

    setTimeout(function() {
        var flashMessage = document.getElementById('flash-message');
        if (flashMessage) {
            flashMessage.style.display = 'none';
        }
    }, 3000);
</script>

@endsection
