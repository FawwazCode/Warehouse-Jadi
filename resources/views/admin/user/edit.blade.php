<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>

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

    small {
        color: #64748b;
        display: block;
        margin-top: -10px;
        margin-bottom: 10px;
        font-size: 12px;
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
    <h2>Edit User</h2>

    <div class="nav">
        <!-- <a href="/admin">Dashboard</a> -->
        <a href="/user">Kembali</a>
    </div>
</div>

<!-- FORM -->
<div class="container">
    <div class="card">

        <h3>Form Edit User</h3>

        <form action="/user/{{ $user->id }}" method="POST">
            @csrf
            @method('PUT')

            <label>Nama</label>
            <input type="text" name="name" value="{{ $user->name }}">

            <label>Email</label>
            <input type="email" name="email" value="{{ $user->email }}">

            <label>Password</label>
            <input type="password" name="password">
            <small>Kosongkan jika tidak ingin mengubah password</small>

            <label>Role</label>
            <select name="role">
                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="petugas" {{ $user->role == 'petugas' ? 'selected' : '' }}>Petugas</option>
                <option value="manajer" {{ $user->role == 'manajer' ? 'selected' : '' }}>Manajer</option>
            </select>

            <button type="submit" class="btn">Update</button>
        </form>

    </div>
</div>

</body>
</html>