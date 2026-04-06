<!DOCTYPE html>
<html>
<head>
    <title>Edit Supplier</title>

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
        width: 400px;
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

    input, textarea {
        width: 100%;
        padding: 8px;
        margin-bottom: 15px;
        border: 1px solid #ddd;
        border-radius: 8px;
    }

    textarea {
        resize: none;
        height: 80px;
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
    <h2>Edit Supplier</h2>

    <div class="nav">
        <!-- <a href="/admin">Dashboard</a> -->
        <a href="/supplier">Kembali</a>
    </div>
</div>

<!-- FORM -->
<div class="container">
    <div class="card">

        <h3>Form Edit Supplier</h3>

        <form action="/supplier/{{ $supplier->id }}" method="POST">
            @csrf
            @method('PUT')

            <label>Nama Supplier</label>
            <input type="text" name="nama_supplier" value="{{ $supplier->nama_supplier }}">

            <label>Alamat</label>
            <textarea name="alamat">{{ $supplier->alamat }}</textarea>

            <label>Telepon</label>
            <input type="text" name="telepon" value="{{ $supplier->telepon }}">

            <button type="submit" class="btn">Update</button>
        </form>

    </div>
</div>

</body>
</html>