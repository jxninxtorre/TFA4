<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= esc($title ?? 'POS System') ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg: #fff3e9;
            --card: #fffaf5;
            --peach: #ffd8bd;
            --peach-soft: #ffe9d9;
            --accent: #f4a275;
            --accent-dark: #e08a5a;
            --heading: #d9795c;
            --text: #5c4033;
            --link: #a34e34;
            --muted: #7a5c4d;
            --border: #ffe1cc;
            --shadow: 0 10px 30px rgba(217, 121, 92, 0.15);
        }

        * { box-sizing: border-box; }

        body {
            font-family: 'Poppins', 'Segoe UI', Arial, sans-serif;
            margin: 0;
            color: var(--text);
            background-color: var(--bg);
            background-image:
                radial-gradient(circle at 8% 12%, rgba(244, 162, 117, 0.28) 0, transparent 38%),
                radial-gradient(circle at 92% 8%, rgba(255, 200, 160, 0.40) 0, transparent 34%),
                radial-gradient(circle at 85% 95%, rgba(217, 121, 92, 0.18) 0, transparent 40%);
            background-attachment: fixed;
            min-height: 100vh;
        }

        .container {
            max-width: 960px;
            margin: 28px auto 40px;
            padding: 0 20px;
            animation: fadeUp 0.5s ease both;
        }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(12px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        h1 { color: var(--heading); font-weight: 700; letter-spacing: -0.5px; }
        p  { line-height: 1.7; }
        a  { color: var(--heading); }

        /* ================= TOPBAR ================= */
        .topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            flex-wrap: wrap;
            margin-bottom: 32px;
        }

        .nav {
            display: flex;
            align-items: center;
            gap: 4px;
            padding: 8px;
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(8px);
            border: 1px solid var(--border);
            border-radius: 999px;
            box-shadow: var(--shadow);
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 0 14px 0 6px;
            font-weight: 700;
            color: var(--heading);
            text-decoration: none;
        }

        .brand-mark {
            width: 34px;
            height: 34px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            background: linear-gradient(135deg, #ffb88c, #f4a275);
            font-size: 1rem;
            box-shadow: 0 4px 10px rgba(244, 162, 117, 0.45);
        }

        .nav a.nav-link {
            padding: 9px 18px;
            border-radius: 999px;
            text-decoration: none;
            color: var(--link);
            font-weight: 500;
            font-size: 0.92rem;
            transition: background 0.2s, color 0.2s, transform 0.2s;
        }

        .nav a.nav-link:hover {
            background: var(--peach-soft);
            transform: translateY(-1px);
        }

        .nav a.nav-link.active {
            background: linear-gradient(135deg, #f7b58c, #f4a275);
            color: #fff;
            box-shadow: 0 4px 12px rgba(244, 162, 117, 0.45);
        }

        /* ---------- Upper-right: user + logout ---------- */
        .user-area {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .user-chip {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 6px 16px 6px 6px;
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(8px);
            border: 1px solid var(--border);
            border-radius: 999px;
            box-shadow: var(--shadow);
            font-size: 0.88rem;
            font-weight: 500;
        }

        .user-avatar {
            width: 34px;
            height: 34px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            background: var(--peach);
            color: var(--link);
            font-weight: 700;
        }

        .logout-btn,
        .login-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 11px 20px;
            border-radius: 999px;
            background: linear-gradient(135deg, #f7b58c, #e8895a);
            color: #fff;
            font-weight: 600;
            font-size: 0.9rem;
            text-decoration: none;
            box-shadow: 0 6px 16px rgba(232, 137, 90, 0.4);
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .logout-btn:hover,
        .login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 22px rgba(232, 137, 90, 0.5);
        }

        .logout-btn svg { width: 16px; height: 16px; }

        @media (max-width: 720px) {
            .user-name { display: none; }
            .user-chip { padding: 6px; }
        }

        /* ================= TABLES ================= */
        table {
            border-collapse: separate;
            border-spacing: 0;
            width: 100%;
            margin-top: 15px;
            background-color: var(--card);
            border-radius: 16px;
            overflow: hidden;
            box-shadow: var(--shadow);
        }

        th, td {
            padding: 14px 18px;
            text-align: left;
            border-bottom: 1px solid var(--border);
        }

        th {
            background: #f4a988;
            color: #fff;
            font-weight: 600;
        }

        tr:last-child td { border-bottom: none; }
        tr:hover td { background-color: #ffeee1; }

        /* ================= FORMS ================= */
        form label {
            display: block;
            margin: 14px 0 6px;
            font-weight: 500;
            font-size: 0.9rem;
            color: var(--link);
        }

        form input[type="text"],
        form input[type="email"],
        form input[type="password"],
        form input[type="number"],
        form input[type="file"],
        form select,
        form textarea {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid var(--border);
            border-radius: 12px;
            background: #fff;
            font-family: inherit;
            font-size: 0.95rem;
            color: var(--text);
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        form input:focus,
        form select:focus,
        form textarea:focus {
            border-color: var(--accent);
            box-shadow: 0 0 0 3px rgba(244, 162, 117, 0.25);
        }

        form button,
        form input[type="submit"] {
            margin-top: 18px;
            padding: 12px 26px;
            border: none;
            border-radius: 999px;
            background: linear-gradient(135deg, #f7b58c, #e8895a);
            color: #fff;
            font-family: inherit;
            font-weight: 600;
            font-size: 0.95rem;
            cursor: pointer;
            box-shadow: 0 6px 16px rgba(232, 137, 90, 0.35);
            transition: transform 0.2s;
        }

        form button:hover,
        form input[type="submit"]:hover { transform: translateY(-2px); }

        /* ================= HOME ================= */
        .hero {
            position: relative;
            overflow: hidden;
            background: linear-gradient(135deg, #fffaf5 0%, #ffe9d9 100%);
            border: 1px solid var(--border);
            border-radius: 28px;
            padding: 52px 44px;
            box-shadow: var(--shadow);
        }

        .hero::after {
            content: "";
            position: absolute;
            right: -60px;
            top: -60px;
            width: 220px;
            height: 220px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(244, 162, 117, 0.45), transparent 70%);
        }

        .hero h1 { margin: 0 0 12px; font-size: 2.5rem; }
        .hero p  { margin: 0 0 26px; color: var(--muted); max-width: 560px; }

        .hero-actions { display: flex; gap: 12px; flex-wrap: wrap; position: relative; z-index: 1; }

        .btn {
            display: inline-block;
            padding: 12px 26px;
            border-radius: 999px;
            background: linear-gradient(135deg, #f7b58c, #e8895a);
            color: #fff;
            font-weight: 600;
            text-decoration: none;
            box-shadow: 0 6px 16px rgba(232, 137, 90, 0.35);
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .btn:hover { transform: translateY(-2px); box-shadow: 0 10px 22px rgba(232, 137, 90, 0.45); }

        .btn-light {
            background: var(--peach);
            color: var(--link);
            box-shadow: none;
        }

        .feature-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 18px;
            margin-top: 22px;
        }

        .feature {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 20px;
            padding: 26px;
            transition: transform 0.25s, box-shadow 0.25s;
        }

        .feature:hover { transform: translateY(-6px); box-shadow: var(--shadow); }
        .feature .icon { font-size: 1.8rem; margin-bottom: 10px; }
        .feature h3 { margin: 0 0 8px; color: var(--heading); }
        .feature p  { margin: 0; font-size: 0.93rem; color: var(--muted); }

        /* ================= ABOUT ================= */
        .card {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 28px;
            padding: 44px;
            box-shadow: var(--shadow);
        }

        .card h1 { margin-top: 0; }
        .card h3 { color: var(--link); margin: 26px 0 12px; }

        .tags { display: flex; gap: 10px; flex-wrap: wrap; }

        .tag {
            background: var(--peach);
            color: var(--link);
            padding: 8px 18px;
            border-radius: 999px;
            font-size: 0.9rem;
            font-weight: 600;
            transition: transform 0.2s;
        }

        .tag:hover { transform: translateY(-3px) rotate(-2deg); }
    </style>
</head>
<body>
    <div class="container">