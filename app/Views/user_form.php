<?= view('header') ?>
<?= view('menu') ?>

<style>
    .page-title {
        color: #d97745;
        font-size: 32px;
        font-weight: bold;
        margin-top: 25px;
        margin-bottom: 20px;
    }

    .form-card {
        background-color: #ffffff;
        border-radius: 12px;
        padding: 30px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        max-width: 600px;
        margin-bottom: 40px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        font-weight: 600;
        margin-bottom: 8px;
        color: #4a5568;
        font-size: 14px;
    }

    .form-control {
        width: 100%;
        padding: 10px 12px;
        border: 1px solid #e2e8f0;
        border-radius: 6px;
        font-size: 14px;
        box-sizing: border-box;
    }

    .form-control:focus {
        outline: none;
        border-color: #f4a276;
    }

    .btn-submit {
        background-color: #f4a276;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 6px;
        font-weight: bold;
        cursor: pointer;
        font-size: 14px;
    }

    .btn-submit:hover {
        background-color: #e07a5f;
    }

    .btn-cancel {
        color: #718096;
        text-decoration: none;
        margin-left: 15px;
        font-size: 14px;
    }

    .alert-danger {
        background-color: #fed7d7;
        color: #9b2c2c;
        padding: 12px 16px;
        border-radius: 6px;
        margin-bottom: 20px;
        font-size: 14px;
    }

    .avatar-preview {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        object-fit: cover;
        margin-bottom: 10px;
        display: block;
    }
</style>

<h1 class="page-title"><?= esc($title ?? 'User Form') ?></h1>

<div class="form-card">
    <?php if (! empty($errors) && is_array($errors)): ?>
        <div class="alert-danger">
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?= $action ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>

        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" class="form-control" value="<?= esc($user['username'] ?? '') ?>" required>
        </div>

        <div class="form-group">
            <label for="full_name">Full Name</label>
            <input type="text" name="full_name" id="full_name" class="form-control" value="<?= esc($user['full_name'] ?? '') ?>" required>
        </div>

        <div class="form-group">
            <label for="avatar">Avatar Image</label>
            <?php if (! empty($user['avatar']) && is_file(FCPATH . 'uploads/avatars/' . $user['avatar'])): ?>
                <img src="<?= base_url('uploads/avatars/' . $user['avatar']) ?>" alt="Current Avatar" class="avatar-preview">
            <?php endif; ?>
            <input type="file" name="avatar" id="avatar" class="form-control" accept="image/*">
        </div>

        <div style="margin-top: 25px;">
            <button type="submit" class="btn-submit">Save User</button>
            <a href="<?= site_url('users') ?>" class="btn-cancel">Cancel</a>
        </div>
    </form>
</div>

<?= view('footer') ?>