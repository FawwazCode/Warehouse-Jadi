<!DOCTYPE html>
<html>
<head>
    <title>Data Supplier</title>

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
    }

    /* TOP ACTION */
    .top-action {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
    }

    .btn {
        background: var(--primary);
        color: white;
        padding: 8px 14px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        font-size: 13px;
        text-decoration: none;
        transition: 0.3s;
    }

    .btn:hover {
        background: #4338ca;
        transform: scale(1.05);
    }

    .btn-danger {
        background: #ef4444;
    }

    .btn-danger:hover {
        background: #dc2626;
    }

    /* TABLE */
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }

    table th, table td {
        padding: 10px;
        border-bottom: 1px solid #eee;
        text-align: left;
        font-size: 14px;
    }

    table th {
        background: #f9fafb;
    }

    /* ACTION */
    .action {
        display: flex;
        gap: 8px;
    }

    </style>
</head>
<body>

<!-- HEADER -->
<div class="header">
    <h2>Data Supplier</h2>

    <div class="nav">
        <a href="/admin">Kembali ke Dashboard</a>
        <!-- <a href="/supplier">Supplier</a> -->
    </div>
</div>

<div class="container">

    <div class="card">

        <!-- TOP -->
        <div class="top-action">
            <a href="/supplier/create" class="btn">+ Tambah Supplier</a>
        </div>

        <!-- TABLE -->
        <table>
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach($supplier as $s)
                <tr>
                    <td>{{ $s->nama_supplier }}</td>
                    <td>{{ $s->alamat }}</td>
                    <td>{{ $s->telepon }}</td>
                    <td>
                        <div class="action">
                            <a href="/supplier/{{ $s->id }}/edit" class="btn">Edit</a>

                            <form action="/supplier/{{ $s->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>

</div>

</body>
</html>