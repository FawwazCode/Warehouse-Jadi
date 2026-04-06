<!DOCTYPE html>
<html>
<head>
    <title>Stock Opname</title>

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
        display: flex;
        justify-content: center;
    }

    /* CARD */
    .card {
        background: white;
        padding: 25px;
        border-radius: 16px;
        width: 420px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.05);
    }

    .card h3 {
        margin-bottom: 20px;
    }

    /* FORM */
    label {
        display: block;
        margin-bottom: 5px;
        font-size: 14px;
    }

    input, select {
        width: 100%;
        padding: 8px;
        margin-bottom: 15px;
        border: 1px solid #ddd;
        border-radius: 8px;
    }

    textarea, select {
         width: 100%;
        padding: 8px;
        margin-bottom: 15px;
        border: 1px solid #ddd;
        border-radius: 8px;
    }

    small {
        color: #64748b;
        font-size: 12px;
        margin-top: -10px;
        margin-bottom: 10px;
        display: block;
    }

    .btn {
        background: var(--primary);
        color: white;
        padding: 10px;
        border: none;
        width: 100%;
        border-radius: 8px;
        cursor: pointer;
        transition: 0.3s;
    }

    .btn:hover {
        background: #4338ca;
        transform: scale(1.02);
    }

    </style>
</head>
<body>

<!-- HEADER -->
<div class="header">
    <h2>Stock Opname</h2>

    <div class="nav">
        <!-- <a href="/admin">Dashboard</a> -->
        <a href="/stock-opname">Kembali</a>
    </div>
</div>

<div class="container">
    <div class="card">

        <h3>Form Stock Opname</h3>

        <form action="/stock-opname" method="POST">
            @csrf

            <label>Barang</label>
            <select name="barang_id" required>
                @foreach($barang as $b)
                    <option value="{{ $b->id }}">
                        {{ $b->nama_barang }} (Stok Sistem: {{ $b->stok }})
                    </option>
                @endforeach
            </select>
            <small>Stok sistem adalah stok yang tercatat di database</small>

            <label>Stok Fisik</label>
            <input type="number" name="stok_fisik" min="0" required>
            <small>Masukkan jumlah stok nyata di gudang</small>

            <label>Keterangan</label>
            <textarea name="keterangan" placeholder="Contoh: Barang Rusak / selisih stok" required></textarea>

            <label>Tanggal</label>
            <input type="date" name="tanggal" required>

            <button type="submit" class="btn">Simpan</button>
        </form>

    </div>
</div>

</body>
</html>