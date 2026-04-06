<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <style>
        :root {
            --primary: #2563eb;
            --bg: #f8fafc;
            --card: #ffffff;
            --text: #0f172a;
            --subtext: #64748b;
            --border: #e2e8f0;
            --danger: #dc2626;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background: var(--bg);
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .card {
            width: 100%;
            max-width: 380px;
            background: var(--card);
            padding: 30px;
            border-radius: 14px;
            border: 1px solid var(--border);
            box-shadow: 0 8px 20px rgba(0,0,0,0.05);
        }

        h1 {
            font-size: 20px;
            margin-bottom: 5px;
        }

        .subtitle {
            font-size: 13px;
            color: var(--subtext);
            margin-bottom: 20px;
        }

        label {
            font-size: 13px;
            display: block;
            margin-bottom: 5px;
        }

        input {
            width: 100%;
            padding: 10px;
            border-radius: 8px;
            border: 1px solid var(--border);
            margin-bottom: 15px;
            font-size: 14px;
        }

        input:focus {
            outline: none;
            border-color: var(--primary);
        }

        .btn {
            width: 100%;
            padding: 10px;
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 14px;
            cursor: pointer;
            transition: 0.2s;
        }

        .btn:hover {
            opacity: 0.9;
        }

        .error {
            background: #fee2e2;
            color: var(--danger);
            padding: 10px;
            border-radius: 8px;
            font-size: 13px;
            margin-bottom: 15px;
        }

    </style>
</head>
<body>

<div class="card">

    <h1>Login</h1>
    <div class="subtitle">Silakan masuk ke sistem warehouse</div>

    @if(session('error'))
        <div class="error">
            {{ session('error') }}
        </div>
    @endif

    <form method="POST" action="/login">
        @csrf

        <label>Email</label>
        <input type="email" name="email" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <button class="btn" type="submit">Login</button>
    </form>

</div>

</body>
</html>