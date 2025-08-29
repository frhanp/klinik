<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pendapatan</title>
    <style>
        body { font-family: sans-serif; margin: 0; padding: 20px; color: #333; }
        h1, h2 { text-align: center; margin-bottom: 5px; }
        h1 { font-size: 24px; }
        h2 { font-size: 18px; font-weight: normal; margin-bottom: 20px;}
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; font-size: 14px; }
        thead { background-color: #f2f2f2; }
        tfoot { font-weight: bold; }
        .total-row th { text-align: right; }
        @media print {
            body { padding: 10px; }
            a { display: none; }
        }
    </style>
</head>
<body onload="window.print()">
    <h1>Laporan Pendapatan Klinik</h1>
    <h2>Periode: {{ request('start_date') }} s/d {{ request('end_date') }}</h2>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pasien</th>
                <th>Dokter</th>
                <th>Tanggal Bayar</th>
                <th>Metode</th>
                <th>Status</th>
                <th>Total Biaya</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($laporan as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->pasien->name }}</td>
                    <td>{{ $item->dokter->user->name }}</td>
                    <td>{{ $item->pembayaran ? \Carbon\Carbon::parse($item->pembayaran->tanggal_bayar)->format('d/m/Y') : 'N/A' }}</td>
                    <td>{{ $item->pembayaran ? ucfirst($item->pembayaran->metode_pembayaran) : 'N/A' }}</td>
                    <td>{{ $item->status }}</td>
                    <td>Rp. {{ $item->pembayaran ? number_format($item->pembayaran->total_biaya, 0, ',', '.') : '0' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" style="text-align: center;">Tidak ada data untuk periode yang dipilih.</td>
                </tr>
            @endforelse
        </tbody>
        <tfoot>
            <tr class="total-row">
                <th colspan="6">Total Pendapatan</th>
                <td>Rp. {{ number_format($totalPendapatan, 0, ',', '.') }}</td>
            </tr>
        </tfoot>
    </table>
</body>
</html>