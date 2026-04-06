<!DOCTYPE html>
<html>
<head>
    <title>Data Stock Opname</title>

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

    .nav {
        display: flex;
        gap: 15px;
    }

    .nav a {
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

    /* ACTION BUTTON */
    .actions {
        margin-bottom: 15px;
    }

    .btn {
        background: var(--primary);
        color: white;
        padding: 8px 12px;
        text-decoration: none;
        border-radius: 8px;
        font-size: 13px;
        margin-right: 10px;
        transition: 0.3s;
    }

    .btn:hover {
        background: #4338ca;
    }

    .btn-secondary {
        background: #64748b;
    }

    .btn-secondary:hover {
        background: #475569;
    }

    /* TABLE */
    .table-card {
        background: white;
        padding: 20px;
        border-radius: 16px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.05);
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }

    th, td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid var(--border);
        font-size: 14px;
    }

    th {
        background: #f8fafc;
    }

    tr:hover {
        background: #f1f5f9;
    }

    .selisih-minus {
        color: red;
        font-weight: bold;
    }

    .selisih-plus {
        color: green;
        font-weight: bold;
    }

    </style>
</head>
<body>

<!-- HEADER -->
<div class="header">
    <h2>Stock Opname</h2>

    <div class="nav">
        <a href="/petugas"> Kembali ke Dashboard</a>
        <!-- <a href="/stock-opname">Stock Opname</a> -->
    </div>
</div>

<div class="container">

    <div class="actions">
        <a href="/stock-opname/create" class="btn">+ Tambah Data</a>
        <!-- <a href="/petugas" class="btn btn-secondary">Kembali</a> -->
    </div>

    <div class="table-card">
        <h3>Data Stock Opname</h3>

        <table>
            <tr>
                <th>Barang</th>
                <th>Stok Sistem</th>
                <th>Stok Fisik</th>
                <th>Selisih</th>
                <th>Keterangan</th>
                <th>Tanggal</th>
            </tr>

            @foreach($data as $d)
            <tr>
                <td>{{ $d->barang->nama_barang }}</td>
                <td>{{ $d->stok_sistem }}</td>
                <td>{{ $d->stok_fisik }}</td>

                <td class="
                    @if($d->selisih < 0) selisih-minus 
                    @elseif($d->selisih > 0) selisih-plus 
                    @endif
                ">
                    {{ $d->selisih }}
                </td>
                <td>{{ $d->keterangan ?? '-' }}</td>

                <td>{{ $d->tanggal }}</td>
            </tr>
            @endforeach

        </table>
    </div>

</div>

</body>
</html>