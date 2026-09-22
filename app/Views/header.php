<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= esc($title ?? 'POS System') ?></title>
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            margin: 0;
            background-color: #fff3e9;
            color: #5c4033;
        }
        .container {
            max-width: 850px;
            margin: 40px auto;
            padding: 0 20px;
        }
        h1 {
            color: #d9795c;
            font-weight: 600;
        }
        p {
            line-height: 1.6;
        }
        nav {
            background-color: #ffd8bd;
            padding: 14px 24px;
            border-radius: 12px;
            margin-bottom: 25px;
            display: inline-block;
        }
        nav a {
            margin-right: 18px;
            text-decoration: none;
            color: #a34e34;
            font-weight: 600;
        }
        nav a:hover {
            color: #d9795c;
            text-decoration: underline;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 15px;
            background-color: #fffaf5;
            border-radius: 10px;
            overflow: hidden;
        }
        th, td {
            padding: 12px 16px;
            text-align: left;
            border-bottom: 1px solid #ffe1cc;
        }
        th {
            background-color: #f4a988;
            color: #fff;
        }
        tr:hover {
            background-color: #ffeee1;
        }
    </style>
</head>
<body>
    <div class="container">