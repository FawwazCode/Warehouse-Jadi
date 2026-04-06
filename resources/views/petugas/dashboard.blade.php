<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Petugas</title>

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

    /* LOGOUT */
    .logout-btn {
        background: #ef4444;
        color: white;
        border: none;
        padding: 6px 12px;
        border-radius: 8px;
        cursor: pointer;
        font-size: 12px;
        transition: 0.3s;
    }

    .logout-btn:hover {
        background: #dc2626;
        transform: scale(1.05);
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

    /* TEXT */
    .card h4 {
        margin-bottom: 15px;
        color: #555;
    }

    /* MENU */
    .menu {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .menu a {
        padding: 12px;
        border-radius: 10px;
        text-decoration: none;
        color: var(--text);
        border: 1px solid var(--border);
        background: white;
        transition: 0.3s;
        font-size: 14px;
    }

    .menu a:hover {
        background: #f1f5f9;
        transform: translateX(5px);
    }

    </style>
</head>
<body>

<!-- HEADER -->
<div class="header">
    <h2>Dashboard Petugas</h2>

    <div class="nav">
        <!-- <a href="#">Dashboard</a> -->
        <a href="/barang-masuk">Barang Masuk</a>
        <a href="/barang-keluar">Barang Keluar</a>
        <a href="/stock-opname">Stock Opname</a>

        <form method="POST" action="/logout" style="display:inline;">
            @csrf
            <button class="logout-btn">Logout</button>
        </form>
    </div>
</div>

<div class="container">

    <div class="card">
        <h4>Menu Petugas</h4>

        <div class="menu">
            <a href="/barang-masuk">📥 Barang Masuk</a>
            <a href="/barang-keluar">📤 Barang Keluar</a>
            <a href="/stock-opname">📦 Stock Opname</a>
        </div>
    </div>

</div>

</body>
</html>