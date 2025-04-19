@extends('layout.layout_admin')

@section('title', 'Tagihan Saya')

@section('content')
    <h4>Daftar Tagihan Saya</h4>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Bulan</th>
                <th>Tahun</th>
                <th>Jumlah</th>
                <th>Status</th>
                <th>Jatuh Tempo</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data_tagihan as $no => $tagihan)
                <tr>
                    <td>{{ $no + 1 }}</td>
                    <td>{{ \Carbon\Carbon::create()->month($tagihan->bulan)->translatedFormat('F') }}</td>
                    <td>{{ $tagihan->tahun }}</td>
                    <td>{{ number_format($tagihan->jumlah, 0, ',', '.') }}</td>
                    <td>
                        @if ($tagihan->status == 'belum_bayar')
                            <span class="badge bg-warning text-dark">Belum Bayar</span>
                        @elseif ($tagihan->status == 'lunas')
                            <span class="badge bg-success">Lunas</span>
                        @endif
                    </td>
                    <td>{{ $tagihan->tgl_jatuh_tempo }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
