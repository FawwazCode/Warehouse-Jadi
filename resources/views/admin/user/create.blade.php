<!DOCTYPE html>
<html>
<head>
    <title>Tambah User</title>

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

    </style>
</head>
<body>

<!-- HEADER -->
<div class="header">
    <h2>Tambah User</h2>

    <div class="nav">
        <!-- <a href="/admin">Dashboard</a> -->
        <a href="/user">User</a>
    </div>
</div>

<!-- FORM -->
<div class="container">
    <div class="card">

        <h3>Form Tambah User</h3>

        <form action="/user" method="POST">
            @csrf

            <label>Nama</label>
            <input type="text" name="name">

            <label>Email</label>
            <input type="email" name="email">

            <label>Password</label>
            <input type="password" name="password">

            <label>Role</label>
            <select name="role">
                <option value="admin">Admin</option>
                <option value="petugas">Petugas</option>
                <option value="manajer">Manajer</option>
            </select>

            <button type="submit" class="btn">Simpan</button>
        </form>

    </div>
</div>

</body>
</html>