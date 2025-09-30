<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pendapatan</title>
    <style>
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            margin: 0;
            padding: 20px;
            color: #333;
        }
        .container {
            width: 98%;
            margin: auto;
        }
        h1, h2 {
            text-align: center;
            margin-bottom: 5px;
        }
        h1 {
            font-size: 22px;
            color: #4338CA; /* Ungu gelap */
        }
        h2 {
            font-size: 16px;
            font-weight: normal;
            margin-bottom: 25px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
            font-size: 12px;
            vertical-align: top;
        }
        /* [MODIFIKASI] Warna header diubah menjadi ungu */
        thead {
            background-color: #EDE9FE; /* Ungu sangat muda */
            color: #5B21B6; /* Ungu tua */
        }
        thead th {
            font-weight: 600;
        }
        tfoot {
            font-weight: bold;
            background-color: #f2f2f2;
        }
        .total-row th {
            text-align: right;
        }
        ul {
            margin: 0;
            padding-left: 15px;
        }
        li {
            margin-bottom: 3px;
        }
        @page {
            size: landscape;
            margin: 1cm;
        }
        @media print {
            body {
                padding: 0;
            }
            .no-print {
                display: none;
            }
        }
    </style>
</head>
<body onload="window.print()">

    <div class="container">
        <h1>Laporan Pendapatan Klinik</h1>
        <h2>Periode: {{ \Carbon\Carbon::parse(request('start_date'))->translatedFormat('d F Y') }} s/d {{ \Carbon\Carbon::parse(request('end_date'))->translatedFormat('d F Y') }}</h2>

        <table>
            <thead>
                <tr>
                    <th>NIK</th>
                    <th>Pasien</th>
                    <th>Dokter</th>
                    <th>Tindakan</th>
                    <th>Resep Obat</th>
                    <th>Tgl. Bayar</th>
                    <th>Metode</th>
                    <th>Status</th>
                    <th style="text-align: right;">Total Biaya</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($laporan as $item)
                    <tr>
                        <td>{{ $item->pasien->biodata->nik ?? '-' }}</td>
                        <td>{{ $item->pasien->name }}</td>
                        <td>{{ $item->dokter->user->name }}</td>
                        <td>
                            @if($item->rekamMedis && $item->rekamMedis->tindakan->isNotEmpty())
                                <ul>
                                    @foreach($item->rekamMedis->tindakan as $tindakan)
                                        <li>{{ $tindakan->keterangan }}</li>
                                    @endforeach
                                </ul>
                            @else
                                -
                            @endif
                        </td>
                        <td>
                             @if($item->rekamMedis && $item->rekamMedis->resep->isNotEmpty())
                                <ul>
                                    @foreach($item->rekamMedis->resep as $resep)
                                        <li>{{ $resep->obat->nama_obat }} ({{$resep->jumlah}})</li>
                                    @endforeach
                                </ul>
                            @else
                                -
                            @endif
                        </td>
                        <td>{{ $item->pembayaran ? \Carbon\Carbon::parse($item->pembayaran->tanggal_bayar)->format('d/m/Y') : '-' }}</td>
                        <td>{{ $item->pembayaran ? ucfirst($item->pembayaran->metode_pembayaran) : '-' }}</td>
                        <td>{{ $item->status }}</td>
                        <td style="text-align: right;">{{ $item->pembayaran ? 'Rp. ' . number_format($item->pembayaran->total_biaya, 0, ',', '.') : '-' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" style="text-align: center;">Tidak ada data untuk periode yang dipilih.</td>
                    </tr>
                @endforelse
            </tbody>
            <tfoot>
                <tr class="total-row">
                    <th colspan="8">Total Pendapatan</th>
                    <td style="text-align: right;">Rp. {{ number_format($totalPendapatan, 0, ',', '.') }}</td>
                </tr>
            </tfoot>
        </table>
    </div>

</body>
</html>