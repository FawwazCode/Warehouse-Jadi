<!DOCTYPE html>
<html>
<head>
    <title>Barang Keluar</title>

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
        gap: 20px;
        font-size: 13px;
    }

    .nav a {
        text-decoration: none;
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
        background: #fff;
        padding: 20px;
        border-radius: 16px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.05);
    }

    /* TOP */
    .top-action {
        display: flex;
        justify-content: space-between;
        margin-bottom: 15px;
    }

    .btn {
        background: var(--primary);
        color: white;
        padding: 8px 14px;
        border-radius: 8px;
        text-decoration: none;
        font-size: 13px;
        transition: 0.3s;
    }

    .btn:hover {
        background: #4338ca;
        transform: scale(1.05);
    }

    /* TABLE */
    table {
        width: 100%;
        border-collapse: collapse;
    }

    table th, table td {
        padding: 10px;
        border-bottom: 1px solid #eee;
        font-size: 14px;
        text-align: left;
    }

    table th {
        background: #f9fafb;
    }

    </style>
</head>
<body>

<!-- HEADER -->
<div class="header">
    <h2>Barang Keluar</h2>

    <div class="nav">
        <a href="/petugas">Kembali ke Dashboard</a>
        <!-- <a href="/barang-keluar">Barang Keluar</a> -->
    </div>
</div>

<div class="container">

    <div class="card">

        <!-- TOP -->
        <div class="top-action">
            <a href="/barang-keluar/create" class="btn">+ Tambah Barang Keluar</a>
        </div>

        <!-- TABLE -->
        <table>
            <thead>
                <tr>
                    <th>Barang</th>
                    <th>Jumlah</th>
                    <th>Stok Akhir</th>
                    <th>Tanggal</th>
                </tr>
            </thead>

            <tbody>
                @foreach($barang_keluar as $bk)
                <tr>
                    <td>{{ $bk->barang->nama_barang }}</td>
                    <td>{{ $bk->jumlah }}</td>
                    <td>{{ $bk->stok_sesudah }}</td>
                    <td>{{ $bk->tanggal }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>

</div>

</body>
</html>