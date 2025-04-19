@extends('layout.layout_admin')
@section('title', 'Data Tagihan')
@section('content')

    <!-- Notifikasi pesan flash -->
    @if (session('success'))
        <div class="alert alert-success" id="flash-message">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
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
                            <a href="{{ url('data-tagihan') }}" class="btn btn-primary btn-sm">Tambah Data</a>
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
                                    <input class="datatable-input" placeholder="Search..." type="search" name="search"
                                        title="Search within table">
                                </div>
                            </div>
                            <div class="datatable-container">
                                <table class="table datatable datatable-table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Santri</th>
                                            <th>Bulan</th>
                                            <th>Tahun</th>
                                            <th>Jumlah</th>
                                            <th>Status</th>
                                            <th>Tanggal Jatuh Tempo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data_tagihan as $no => $item)
                                            <tr>
                                                <td>{{ $no + 1 }}</td>
                                                <td>
                                                    @php
                                                        // Cari nama santri berdasarkan santri_id di data_tagihan
                                                        $santri = $data_santri
                                                            ->where('id_santri', $item->santri_id)
                                                            ->first();
                                                    @endphp
                                                    {{ $santri ? $santri->nm_santri : 'Tidak Diketahui' }}
                                                </td>
                                                @php
                                                    $bulanList = [
                                                        '01' => 'Januari',
                                                        '02' => 'Februari',
                                                        '03' => 'Maret',
                                                        '04' => 'April',
                                                        '05' => 'Mei',
                                                        '06' => 'Juni',
                                                        '07' => 'Juli',
                                                        '08' => 'Agustus',
                                                        '09' => 'September',
                                                        '10' => 'Oktober',
                                                        '11' => 'November',
                                                        '12' => 'Desember',
                                                    ];
                                                @endphp

                                                <td>{{ $bulanList[$item->bulan] ?? $item->bulan }}</td>

                                                <td>{{ $item->tahun }}</td>
                                                <td>{{ $item->jumlah }}</td>
                                                <td>
                                                    @if ($item->status == 'belum_bayar')
                                                        <button class="btn btn-warning">BELUM BAYAR</button>
                                                    @elseif ($item->status == 'lunas')
                                                        <button class="btn btn-success">LUNAS</button>
                                                    @else
                                                        <button class="btn btn-secondary">Tidak Diketahui</button>
                                                    @endif
                                                </td>

                                                <td>{{ $item->tgl_jatuh_tempo }}</td>
                                                <td>
                                                    {{-- Editttttttttt --}}
                                                    {{-- <a href="#" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                                        data-bs-target="#editTagihanModal{{ $item->id_tagihan }}">Edit</a> --}}

                                                    {{-- hapusssssssssss --}}
                                                    <form action="{{ url('tagihan_destroy' . $item->id_tagihan) }}"
                                                        method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Apakah Kamu Yakin Menghapus Data Tagihan Ini?')">Hapus</button>
                                                    </form>

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Modal Tambah Data -->
                        <div class="modal fade" id="tambahTagihanModal" tabindex="-1"
                            aria-labelledby="tambahTagihanModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="tambahTagihanModalLabel">Tambah Data Tagihan</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ url('data-tagihan') }}" method="POST">
                                            @csrf

                                            <!-- Pilihan Bulan -->
                                            <div class="mb-3">
                                                <label for="bulan" class="form-label">Bulan</label>
                                                <select class="form-select" name="bulan" id="bulan" required>
                                                    <option value="">- Pilih Bulan -</option>
                                                    @php
                                                        $bulanList = [
                                                            '01' => 'Januari',
                                                            '02' => 'Februari',
                                                            '03' => 'Maret',
                                                            '04' => 'April',
                                                            '05' => 'Mei',
                                                            '06' => 'Juni',
                                                            '07' => 'Juli',
                                                            '08' => 'Agustus',
                                                            '09' => 'September',
                                                            '10' => 'Oktober',
                                                            '11' => 'November',
                                                            '12' => 'Desember',
                                                        ];
                                                    @endphp
                                                    @foreach ($bulanList as $key => $value)
                                                        <option value="{{ $key }}">{{ $value }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="tahun" class="form-label">Tahun</label>
                                                <input type="number" class="form-control" id="tahun" name="tahun"
                                                    value="{{ date('Y') }}" required>
                                            </div>
                                            {{-- <div class="mb-3">
                                                <label for="santri_id" class="form-label">Santri</label>
                                                <select class="form-select" name="santri_id" id="santri_id" required>
                                                    <option value="">- Pilih Santri -</option>
                                                    @foreach ($data_santri as $santri)
                                                        <option value="{{ $santri->id_santri }}">{{ $santri->nm_santri }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div> --}}
                                            <div class="mb-3">
                                                <label for="jumlah" class="form-label">Jumlah</label>
                                                <input type="number" class="form-control" id="jumlah" name="jumlah"
                                                    value="600000" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="tgl_jatuh_tempo" class="form-label">Tanggal Jatuh Tempo</label>
                                                <input type="date" class="form-control" id="tgl_jatuh_tempo"
                                                    name="tgl_jatuh_tempo" readonly>
                                            </div>
                                            <div class="text-end">
                                                <button type="submit" class="btn btn-primary">Buat Tagihan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Edit Data -->
                        @foreach ($data_tagihan as $item)
                            <div class="modal fade" id="editTagihanModal{{ $item->id_tagihan }}" tabindex="-1"
                                aria-labelledby="editTagihanModalLabel{{ $item->id_tagihan }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editTagihanModalLabel{{ $item->id_tagihan }}">
                                                Edit Data Ruangan</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>


                                        <div class="modal-body">
                                            <form action="{{ url('data-tagihan') }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" id="edit_id" name="id">

                                                <div class="mb-3">
                                                    <label for="edit_bulan" class="form-label">Bulan</label>
                                                    <select class="form-select" name="bulan" id="edit_bulan" required>
                                                        <option value="">- Pilih Bulan -</option>
                                                        @php
                                                            $bulanList = [
                                                                '01' => 'Januari',
                                                                '02' => 'Februari',
                                                                '03' => 'Maret',
                                                                '04' => 'April',
                                                                '05' => 'Mei',
                                                                '06' => 'Juni',
                                                                '07' => 'Juli',
                                                                '08' => 'Agustus',
                                                                '09' => 'September',
                                                                '10' => 'Oktober',
                                                                '11' => 'November',
                                                                '12' => 'Desember',
                                                            ];
                                                        @endphp
                                                        @foreach ($bulanList as $key => $value)
                                                            <option value="{{ $key }}">{{ $value }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="edit_tahun" class="form-label">Tahun</label>
                                                    <input type="number" class="form-control" id="edit_tahun"
                                                        name="tahun" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="edit_santri_id" class="form-label">Santri</label>
                                                    <select class="form-select" name="santri_id" id="edit_santri_id"
                                                        required>
                                                        <option value="">- Pilih Santri -</option>
                                                        @foreach ($data_santri as $santri)
                                                            <option value="{{ $santri->id_santri }}">
                                                                {{ $santri->nm_santri }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="edit_jumlah" class="form-label">Jumlah</label>
                                                    <input type="number" class="form-control" id="edit_jumlah"
                                                        name="jumlah" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="edit_tgl_jatuh_tempo" class="form-label">Tanggal Jatuh
                                                        Tempo</label>
                                                    <input type="date" class="form-control" id="edit_tgl_jatuh_tempo"
                                                        name="tgl_jatuh_tempo">
                                                </div>
                                                <div class="text-end">
                                                    <button type="submit" class="btn btn-primary">Simpan
                                                        Perubahan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                        @endforeach
    </section>

    <script>
        document.querySelector('.btn-primary').addEventListener('click', function(e) {
            e.preventDefault(); // Cegah redirect default
            new bootstrap.Modal(document.getElementById('tambahTagihanModal')).show();
        });

        setTimeout(function() {
            var flashMessage = document.getElementById('flash-message');
            if (flashMessage) {
                flashMessage.style.display = 'none';
            }
        }, 3000);
        document.addEventListener("DOMContentLoaded", function() {
            let inputTanggal = document.getElementById("tgl_jatuh_tempo");
            let selectBulan = document.getElementById("bulan");
            let inputTahun = document.getElementById("tahun");

            function setTanggal10() {
                let tahun = inputTahun.value;
                let bulan = selectBulan.value || new Date().getMonth() + 1;
                bulan = bulan.toString().padStart(2, '0');
                let tanggal = "10";

                inputTanggal.value = `${tahun}-${bulan}-${tanggal}`;
            }

            setTanggal10();
            selectBulan.addEventListener("change", setTanggal10);
            inputTahun.addEventListener("input", setTanggal10);
        });
    </script>


@endsection
