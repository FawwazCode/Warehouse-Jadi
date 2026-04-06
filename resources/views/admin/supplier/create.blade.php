<!DOCTYPE html>
<html>
<head>
    <title>Tambah Supplier</title>

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
        align-items: center;
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
        max-width: 600px;
        margin: auto;
    }

    /* FORM */
    label {
        font-size: 13px;
        color: var(--subtext);
        display: block;
        margin-bottom: 5px;
    }

    input[type="text"],
    textarea {
        width: 100%;
        padding: 10px;
        border-radius: 8px;
        border: 1px solid var(--border);
        margin-bottom: 15px;
        font-size: 14px;
    }

    textarea {
        resize: none;
        height: 80px;
    }

    input:focus,
    textarea:focus {
        outline: none;
        border-color: var(--primary);
    }

    /* BUTTON */
    .btn {
        background: var(--primary);
        color: white;
        border: none;
        padding: 10px 15px;
        border-radius: 8px;
        cursor: pointer;
        font-size: 14px;
        transition: 0.3s;
    }

    .btn:hover {
        background: #4338ca;
        transform: scale(1.05);
    }

    </style>
</head>
<body>

<!-- HEADER -->
<div class="header">
    <h2>Tambah Supplier</h2>

    <div class="nav">
        <!-- <a href="/admin">Dashboard</a> -->
        <a href="/supplier">Kembali</a>
    </div>
</div>

<div class="container">

    <div class="card">
        <h3 style="margin-bottom:20px;">Form Tambah Supplier</h3>

        <form action="/supplier" method="POST">
        @csrf

        <label>Nama Supplier</label>
        <input type="text" name="nama_supplier">

        <label>Alamat</label>
        <textarea name="alamat"></textarea>

        <label>Telepon</label>
        <input type="text" name="telepon">

        <button type="submit" class="btn">Simpan</button>

        </form>
    </div>

</div>

</body>
</html>