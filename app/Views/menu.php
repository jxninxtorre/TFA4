<?php
$seg      = service('request')->getUri()->getSegment(1);
$isIn     = session()->get('isLoggedIn');
$name     = session()->get('full_name') ?: session()->get('username');
$initial  = strtoupper(substr((string) $name, 0, 1));
$active   = static fn (string $s) => $seg === $s ? 'active' : '';
?>
<header class="topbar">

    <nav class="nav">
        <a href="<?= site_url('/') ?>" class="brand">
            <span class="brand-mark">🛒</span> POS
        </a>
        <a href="<?= site_url('/') ?>" class="nav-link <?= $active('') ?>">Home</a>
        <a href="<?= site_url('about') ?>" class="nav-link <?= $active('about') ?>">About</a>
        <a href="<?= site_url('customers') ?>" class="nav-link <?= $active('customers') ?>">Customer Accounts</a>
        <a href="<?= site_url('users') ?>" class="nav-link <?= $active('users') ?>">User Accounts</a>
    </nav>

    <div class="user-area">
        <?php if ($isIn): ?>
            <div class="user-chip">
                <span class="user-avatar"><?= esc($initial) ?></span>
                <span class="user-name"><?= esc($name) ?></span>
            </div>
            <a href="<?= site_url('logout') ?>" class="logout-btn">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
                    <polyline points="16 17 21 12 16 7"/>
                    <line x1="21" y1="12" x2="9" y2="12"/>
                </svg>
                Logout
            </a>
        <?php else: ?>
            <a href="<?= site_url('login') ?>" class="login-btn">Log in</a>
        <?php endif; ?>
    </div>

</header>