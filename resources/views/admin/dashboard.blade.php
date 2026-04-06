<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin</title>

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

    /* LOGOUT */
    .logout-btn {
        background: #ef4444;
        color: white;
        border: none;
        padding: 6px 12px;
        border-radius: 8px;
        cursor: pointer;
        font-size: 12px;
        margin-left: 10px;
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

    /* CARD VARIANT */
    .highlight {
        border-left: 6px solid #6366f1;
    }

    .danger {
        border-left: 6px solid #ef4444;
    }

    /* GRID TOP */
    .grid-top {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }

    /* SUMMARY */
    .summary {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 15px;
        margin-bottom: 20px;
    }

    .summary h4 {
        font-size: 12px;
        color: var(--subtext);
    }

    .summary p {
        font-size: 20px;
        font-weight: bold;
    }

    /* TEXT */
    .card h4 {
        margin-bottom: 10px;
        color: #555;
    }

    .card h2 {
        margin: 0;
        font-size: 22px;
    }

    .card p {
        margin-top: 5px;
        color: #777;
    }

    /* ALERT */
    .alert {
        background: #fef3c7;
        padding: 15px;
        border-radius: 10px;
        margin-bottom: 20px;
    }

    /* BAR CHART */
    .bar-chart {
        margin-top: 20px;
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .bar-item {
        display: grid;
        grid-template-columns: 150px 1fr 60px;
        align-items: center;
        gap: 10px;
    }

    .label {
        font-size: 14px;
    }

    .bar {
        width: 100%;
        height: 10px;
        background: #e5e7eb;
        border-radius: 10px;
        overflow: hidden;
    }

    .fill {
        height: 100%;
        background: linear-gradient(90deg, #6366f1, #818cf8);
        border-radius: 10px;
        transition: 0.5s;
    }

    .value {
        text-align: right;
        font-size: 14px;
        font-weight: bold;
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
    }

    table th {
        background: #f9fafb;
    }
</style>
</head>
<body>

<!-- HEADER -->
<div class="header">
        <h2>Dashboard Admin</h2>

        <div class="nav">
        <a href="/barang">Barang</a>
        <a href="/supplier">Supplier</a>
        <a href="/user">User</a>

        <!-- LOGOUT -->
        <form method="POST" action="/logout" style="display:inline;">
            @csrf
            <button class="logout-btn">Logout</button>
        </form>
    </div>
</div>

<div class="container">

    <!-- ALERT -->
    @php
        $stok_min = \App\Models\Barang::whereColumn('stok','<=','stok_minimum')->get();
    @endphp

    @if($stok_min->count() > 0)
    <div class="alert">
        ⚠ Stok Minimum:
        <ul>
            @foreach($stok_min as $b)
                <li>{{ $b->nama_barang }} ({{ $b->stok }})</li>
            @endforeach
        </ul>
    </div>
    @endif

    <!-- TOP & LOW CARD -->
<div class="grid-top">

    <!-- STOK TERBANYAK -->
    <div class="card highlight">
        <h4>📦 Stok Terbanyak</h4>

        @php
            $top = $terbanyak->first();
        @endphp

        <h2>{{ $top->nama_barang ?? '-' }}</h2>
        <p>{{ $top->stok ?? 0 }} pcs</p>
    </div>

    <!-- STOK TERSEDIKIT -->
    <div class="card danger">
        <h4>⚠️ Stok Tersedikit</h4>

        @php
            $low = $tersedikit->first();
        @endphp

        <h2>{{ $low->nama_barang ?? '-' }}</h2>
        <p>{{ $low->stok ?? 0 }} pcs</p>
    </div>

</div>


<!-- BAR CHART -->
<div class="card" style="margin-top:20px;">
    <h4>Visualisasi Stok Barang</h4>

    @php
        $max = $terbanyak->max('stok') ?: 1;
    @endphp

    <div class="bar-chart">
        @foreach($terbanyak as $item)
            @php
                $percent = ($item->stok / $max) * 100;
            @endphp

            <div class="bar-item">
                <div class="label">{{ $item->nama_barang }}</div>

                <div class="bar">
                    <div class="fill" style="width: {{ $percent }}%"></div>
                </div>

                <div class="value">{{ $item->stok }}</div>
            </div>
        @endforeach
    </div>
</div>


    <!-- TABLE -->
    <div class="card" style="margin-top:20px;">
        <h4>Data Barang</h4>

        <table>
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Stok</th>
                    <th>Minimum</th>
                </tr>
            </thead>
            <tbody>
                @foreach($terbanyak as $b)
                <tr>
                    <td>{{ $b->nama_barang }}</td>
                    <td>{{ $b->stok }}</td>
                    <td>{{ $b->stok_minimum }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

</body>
</html>