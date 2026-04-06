<!DOCTYPE html>
<html>
<head>
    <title>Laporan Transaksi</title>

    <style>
    :root {
        --primary: #4f46e5;
        --bg: #f1f5f9;
        --card: #ffffff;
        --text: #0f172a;
        --subtext: #64748b;
        --border: #e2e8f0;
    }

    * {
        box-sizing: border-box;
        font-family: 'Segoe UI', sans-serif;
    }

    body {
        margin: 0;
        background: var(--bg);
    }

    /* HEADER */
    .header {
        background: white;
        padding: 15px 25px;
        border-bottom: 1px solid var(--border);
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .header h2 {
        margin: 0;
        font-size: 18px;
    }

    .nav a {
        margin-left: 15px;
        text-decoration: none;
        font-size: 13px;
        color: var(--subtext);
    }

    .nav a:hover {
        color: var(--primary);
    }

    /* CONTAINER */
    .container {
        padding: 20px;
    }

    /* CARD */
    .card {
        background: white;
        padding: 20px;
        border-radius: 16px;
        margin-bottom: 20px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.05);
    }

    /* FORM */
    .form-group {
        display: flex;
        gap: 10px;
        align-items: end;
        flex-wrap: wrap;
    }

    input {
        padding: 8px;
        border-radius: 8px;
        border: 1px solid #ddd;
    }

    label {
        font-size: 13px;
        display: block;
        margin-bottom: 5px;
    }

    .btn {
        background: var(--primary);
        color: white;
        padding: 8px 14px;
        border-radius: 8px;
        border: none;
        cursor: pointer;
        font-size: 13px;
    }

    .btn-secondary {
        background: #64748b;
    }

    .btn-success {
        background: #16a34a;
    }

    .btn:hover {
        opacity: 0.9;
    }

    /* TABLE */
    table {
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        padding: 10px;
        border-bottom: 1px solid var(--border);
        font-size: 14px;
    }

    th {
        background: #f8fafc;
        text-align: left;
    }

    tr:hover {
        background: #f1f5f9;
    }

    .badge-masuk {
        color: green;
        font-weight: bold;
    }

    .badge-keluar {
        color: red;
        font-weight: bold;
    }

    .empty {
        text-align: center;
        color: #64748b;
    }

    </style>
</head>
<body>

<!-- HEADER -->
<div class="header">
    <h2>Laporan Transaksi</h2>

    <div class="nav">
        <a href="/manajer">Kembali ke Dashboard</a>
    </div>
</div>

<div class="container">

    <!-- FILTER -->
    <div class="card">
        <h3>Filter Tanggal</h3>

        <form method="GET" class="form-group">
            <div>
                <label>Dari</label>
                <input type="date" name="start" value="{{ $start }}">
            </div>

            <div>
                <label>Sampai</label>
                <input type="date" name="end" value="{{ $end }}">
            </div>

            <button type="submit" class="btn">Filter</button>

            <a href="/laporan/pdf?start={{ $start }}&end={{ $end }}" class="btn btn-success">
                Export PDF
            </a>

            <a href="/manajer" class="btn btn-secondary">
                Kembali
            </a>
        </form>
    </div>

    <!-- TABLE -->
    <div class="card">
        <h3>Riwayat Transaksi</h3>

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

            @forelse($data as $index => $d)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $d['tanggal'] }}</td>
                <td>{{ $d['supplier'] }}</td>
                <td>{{ $d['nama_barang'] }}</td>

                <td class="
                    @if($d['jenis'] == 'masuk') badge-masuk
                    @else badge-keluar
                    @endif
                ">
                    {{ ucfirst($d['jenis']) }}
                </td>

                <td>{{ $d['jumlah'] }}</td>
                <td>{{ $d['stok_sebelum'] }}</td>
                <td>{{ $d['stok_sesudah'] }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="8" class="empty">Data tidak ada</td>
            </tr>
            @endforelse

        </table>
    </div>

</div>

</body>
</html>