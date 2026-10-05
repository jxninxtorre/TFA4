<?= view('header') ?>
<?= view('menu') ?>

<section class="hero">
    <h1>Welcome to the POS System</h1>
    <p>A simple point-of-sale system for managing customer and user accounts, built with CodeIgniter 4.</p>

    <div class="hero-actions">
        <?php if (session()->get('isLoggedIn')): ?>
            <a href="<?= site_url('customers') ?>" class="btn">Customer Accounts</a>
            <a href="<?= site_url('users') ?>" class="btn btn-light">User Accounts</a>
        <?php else: ?>
            <a href="<?= site_url('login') ?>" class="btn">Log in</a>
        <?php endif; ?>
    </div>
</section>

<div class="feature-grid">
    <div class="feature">
        <div class="icon">🧑‍🤝‍🧑</div>
        <h3>Customer Accounts</h3>
        <p>Add, view, and update customer records.</p>
    </div>
    <div class="feature">
        <div class="icon">🪪</div>
        <h3>User Accounts</h3>
        <p>Manage staff accounts, including avatars.</p>
    </div>
    <div class="feature">
        <div class="icon">🔒</div>
        <h3>Secure Access</h3>
        <p>Login required, with hashed passwords and sessions.</p>
    </div>
</div>

<?= view('footer') ?>