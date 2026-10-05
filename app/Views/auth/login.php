<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg: #FFF1E6;
            --card: #FFF8F2;
            --nav: #FFD6BC;
            --accent: #F4A275;
            --accent-dark: #E08A5A;
            --heading: #D9703E;
            --text: #A64B2A;
            --muted: #8A6A5C;
            --border: #F2D9C8;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--bg);
            font-family: 'Poppins', sans-serif;
            color: var(--text);
        }

        .login-wrap {
            width: 100%;
            max-width: 420px;
            padding: 24px;
        }

        .login-title {
            margin: 0 0 6px;
            font-size: 2.2rem;
            font-weight: 700;
            color: var(--heading);
        }

        .login-sub {
            margin: 0 0 24px;
            color: var(--muted);
            font-size: 0.95rem;
        }

        .login-card {
            background: var(--card);
            border-radius: 20px;
            padding: 32px;
            box-shadow: 0 8px 24px rgba(217, 112, 62, 0.12);
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: 500;
            font-size: 0.9rem;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 12px 14px;
            margin-bottom: 18px;
            border: 1px solid var(--border);
            border-radius: 12px;
            background: #fff;
            font-family: inherit;
            font-size: 0.95rem;
            color: #4a3a33;
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        input:focus {
            border-color: var(--accent);
            box-shadow: 0 0 0 3px rgba(244, 162, 117, 0.25);
        }

        button {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 12px;
            background: var(--accent);
            color: #fff;
            font-family: inherit;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.2s;
        }

        button:hover { background: var(--accent-dark); }

        .alert {
            padding: 10px 14px;
            margin-bottom: 18px;
            border-radius: 12px;
            font-size: 0.9rem;
        }

        .alert-error   { background: #FDE2DC; color: #B3361F; }
        .alert-success { background: #E3F4E1; color: #2F7A3A; }
    </style>
</head>
<body>
    <div class="login-wrap">
        <h1 class="login-title">Login</h1>
        <p class="login-sub">Sign in to manage customer and user accounts.</p>

        <div class="login-card">
            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-error"><?= esc(session()->getFlashdata('error')) ?></div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success"><?= esc(session()->getFlashdata('success')) ?></div>
            <?php endif; ?>

            <form action="<?= site_url('login') ?>" method="post">
                <?= csrf_field() ?>

                <label for="username">Username</label>
                <input type="text" id="username" name="username"
                       value="<?= esc(old('username')) ?>" required autofocus>

                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>

                <button type="submit">Log in</button>
            </form>
        </div>
    </div>
</body>
</html>