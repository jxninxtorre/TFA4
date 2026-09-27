<?= view('header') ?>
<?= view('menu') ?>

<style>
    .page-title {
        color: #d97745;
        font-size: 32px;
        font-weight: bold;
        margin-top: 25px;
        margin-bottom: 10px;
    }

    .add-link {
        display: inline-block;
        color: #d97745;
        text-decoration: none;
        font-size: 15px;
        margin-bottom: 20px;
    }

    .add-link:hover {
        text-decoration: underline;
    }

    .custom-table-card {
        background-color: #ffffff;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        margin-bottom: 40px;
    }

    .custom-table {
        width: 100%;
        border-collapse: collapse;
        text-align: left;
    }

    .custom-table th {
        background-color: #f4a276;
        color: #ffffff;
        font-weight: bold;
        padding: 14px 18px;
        font-size: 15px;
    }

    .custom-table td {
        padding: 14px 18px;
        border-bottom: 1px solid #f2f2f2;
        color: #333;
        font-size: 14px;
        vertical-align: middle;
    }

    .custom-table tr:last-child td {
        border-bottom: none;
    }

    .avatar-img {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        object-fit: cover;
    }

    .avatar-placeholder {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background-color: #d3dbdf;
        color: #4a5568;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        font-size: 14px;
    }

    .action-link {
        color: #d97745;
        text-decoration: none;
        font-weight: 600;
    }

    .action-link:hover {
        text-decoration: underline;
    }
</style>

<h1 class="page-title">User Accounts</h1>

<a href="<?= site_url('users/new') ?>" class="add-link">+ Add New User</a>

<div class="custom-table-card">
    <table class="custom-table">
        <thead>
            <tr>
                <th>Avatar</th>
                <th>Username</th>
                <th>Full Name</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (! empty($users) && is_array($users)): ?>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td>
                            <?php if (! empty($user['avatar']) && is_file(FCPATH . 'uploads/avatars/' . $user['avatar'])): ?>
                                <img src="<?= base_url('uploads/avatars/' . $user['avatar']) ?>" alt="Avatar" class="avatar-img">
                            <?php else: ?>
                                <div class="avatar-placeholder">
                                    <?= esc(strtoupper(substr($user['username'] ?? 'U', 0, 1))) ?>
                                </div>
                            <?php endif; ?>
                        </td>
                        <td><?= esc($user['username']) ?></td>
                        <td><?= esc($user['full_name']) ?></td>
                        <td><?= esc($user['created_at'] ?? '') ?></td>
                        <td>
                            <a href="<?= site_url('users/edit/' . $user['id']) ?>" class="action-link">Edit</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" style="text-align: center; color: #888; padding: 20px;">No users found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?= view('footer') ?>