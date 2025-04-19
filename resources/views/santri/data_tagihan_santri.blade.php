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
<td>{{ $bulanList[$tagihan->bulan] ?? $tagihan->bulan }}</td>



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
