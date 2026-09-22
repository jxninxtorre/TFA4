<?= view('header') ?>
<?= view('menu') ?>

<h1>Customer Accounts</h1>
<table>
    <tr>
        <th>Full Name</th>
        <th>Email</th>
        <th>Phone</th>
    </tr>
    <?php foreach ($customers as $customer): ?>
    <tr>
        <td><?= esc($customer['full_name']) ?></td>
        <td><?= esc($customer['email']) ?></td>
        <td><?= esc($customer['phone']) ?></td>
    </tr>
    <?php endforeach; ?>
</table>

<?= view('footer') ?>