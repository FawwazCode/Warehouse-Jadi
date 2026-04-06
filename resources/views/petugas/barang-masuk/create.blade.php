<!DOCTYPE html>
<html>
<head>
    <title>Tambah Barang Masuk</title>

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

    .alert {
        background: #fee2e2;
        color: #b91c1c;
        padding: 10px;
        border-radius: 8px;
        margin-bottom: 15px;
        font-size: 13px;
    }

    </style>
</head>
<body>

<!-- HEADER -->
<div class="header">
    <h2>Tambah Barang Masuk</h2>

    <div class="nav">
        <!-- <a href="/petugas">Dashboard</a> -->
        <a href="/barang-masuk">Kembali</a>
    </div>
</div>

<div class="container">
    <div class="card">

        <h3>Form Barang Masuk</h3>

        {{-- ERROR --}}
        @if ($errors->any())
            <div class="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- PILIH BARANG --}}
        <form method="GET" action="/barang-masuk/create">
            <label>Pilih Barang</label>
            <select name="barang_id" onchange="this.form.submit()">
                <option value="">-- Pilih Barang --</option>
                @foreach($barang as $b)
                    <option value="{{ $b->id }}" 
                        {{ request('barang_id') == $b->id ? 'selected' : '' }}>
                        {{ $b->nama_barang }}
                    </option>
                @endforeach
            </select>
        </form>

        {{-- FORM INPUT --}}
        @if(request('barang_id'))
        <form action="/barang-masuk" method="POST">
            @csrf

            <input type="hidden" name="barang_id" value="{{ request('barang_id') }}">

            <label>Supplier</label>
            <select name="supplier_id" required>
                <option value="">-- Pilih Supplier --</option>
                @foreach($supplier ?? [] as $s)
                    <option value="{{ $s->id }}">
                        {{ $s->nama_supplier }}
                    </option>
                @endforeach
            </select>

            <label>Jumlah</label>
            <input type="number" name="jumlah" min="1" required>

            <label>Tanggal</label>
            <input type="date" name="tanggal" required>

            <button type="submit" class="btn">Simpan</button>
        </form>
        @else
            <div class="alert">
                ⚠️ Pilih barang dulu sebelum input data!
            </div>
        @endif

    </div>
</div>

</body>
</html>