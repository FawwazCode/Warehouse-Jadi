<!DOCTYPE html>
<html>
<head>
    <title>Laporan Transaksi</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            color: #333;
        }

        .header {
            text-align: center;
            margin-bottom: 10px;
        }

        .header h1 {
            margin: 0;
            font-size: 18px;
        }

        .header p {
            margin: 2px;
            font-size: 12px;
        }

        .info {
            margin-bottom: 10px;
        }

        .info span {
            display: inline-block;
            margin-right: 20px;
        }

        hr {
            border: 1px solid #000;
            margin: 10px 0;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            font-size: 11px;
        }

        th {
            background-color: #f2f2f2;
            border: 1px solid #000;
            padding: 6px;
        }

        td {
            border: 1px solid #000;
            padding: 5px;
            text-align: center;
        }

        .jenis-masuk {
            color: green;
            font-weight: bold;
        }

        .jenis-keluar {
            color: red;
            font-weight: bold;
        }

        .footer {
            margin-top: 20px;
            width: 100%;
        }

        .ttd {
            float: right;
            text-align: center;
            margin-top: 40px;
        }

        .ttd p {
            margin: 0;
        }

    </style>
</head>
<body>

<!-- HEADER -->
<div class="header">
    <h1>LAPORAN RIWAYAT TRANSAKSI</h1>
    <p>Sistem Manajemen Gudang</p>
</div>

<hr>

<!-- INFO -->
<div class="info">
    <span>Tanggal Cetak: {{ date('d-m-Y') }}</span>
    <span>Periode: {{ $start }} s/d {{ $end }}</span>
</div>

<!-- TABLE -->
<table>
    <tr>
        <th>No</th>
        <th>Tanggal</th>
        <th>Supplier</th>
        <th>Barang</th>
        <th>Jenis</th>
        <th>Jumlah</th>
        <th>Stok Sebelum</th>
        <th>Stok Sesudah</th>
    </tr>

    @foreach($data as $index => $d)
    <tr>
        <td>{{ $index + 1 }}</td>
        <td>{{ $d['tanggal'] }}</td>
        <td>{{ $d['supplier'] }}</td>
        <td>{{ $d['nama_barang'] }}</td>

        <td class="{{ $d['jenis'] == 'masuk' ? 'jenis-masuk' : 'jenis-keluar' }}">
            {{ ucfirst($d['jenis']) }}
        </td>

        <td>{{ $d['jumlah'] }}</td>
        <td>{{ $d['stok_sebelum'] }}</td>
        <td>{{ $d['stok_sesudah'] }}</td>
    </tr>
    @endforeach
</table>

<!-- FOOTER -->
<div class="footer">
    <div class="ttd">
        <p>Mengetahui,</p>
        <br><br><br>
        <p><b>Manager Gudang</b></p>
    </div>
</div>

</body>
</html>