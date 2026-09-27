<?= view('header') ?>
<?= view('menu') ?>

<style>
    .form-card-container {
        max-width: 480px;
        margin-top: 15px;
    }

    .form-group {
        display: flex;
        flex-direction: column;
        margin-bottom: 16px;
    }

    .form-group label {
        font-size: 15px;
        margin-bottom: 6px;
    }

    .form-control {
        padding: 8px 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 14px;
        outline: none;
        background-color: #fff;
    }

    .form-control:focus {
        border-color: #d97745;
    }

    .btn-save {
        background-color: #f09261;
        color: white;
        border: none;
        padding: 9px 20px;
        border-radius: 6px;
        font-size: 14px;
        font-weight: bold;
        cursor: pointer;
        margin-top: 10px;
    }

    .btn-save:hover {
        background-color: #d97745;
    }

    .error-box {
        background-color: #fce8e8;
        color: #c0392b;
        padding: 12px;
        border-radius: 6px;
        margin-bottom: 20px;
        font-size: 14px;
    }
    .error-box ul {
        margin: 0;
        padding-left: 20px;
    }
</style>

<h1><?= esc($title) ?></h1>

<div class="form-card-container">

    <?php if (! empty($errors)): ?>
        <div class="error-box">
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form method="post" action="<?= esc($action, 'attr') ?>">

        <?php if (! empty($customer['id'])): ?>
            <input type="hidden" name="id" value="<?= esc($customer['id']) ?>">
        <?php endif; ?>

        <div class="form-group">
            <label for="full_name">Full Name</label>
            <input type="text" id="full_name" name="full_name" class="form-control" value="<?= esc($customer['full_name'] ?? '') ?>" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control" value="<?= esc($customer['email'] ?? '') ?>" required>
        </div>

        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" id="phone" name="phone" class="form-control" value="<?= esc($customer['phone'] ?? '') ?>">
        </div>

        <button type="submit" class="btn-save">Save Customer</button>

    </form>

</div>

<?= view('footer') ?>