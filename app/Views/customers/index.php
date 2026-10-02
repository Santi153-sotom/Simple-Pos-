<?= view('templates/header', ['title' => $title]) ?>

<section class="page-heading heading-actions">
    <div>
        <p class="eyebrow">Directory</p>
        <h1>Customer Accounts</h1>
        <p class="lead">Customer records stored in the POS database.</p>
    </div>
    <a class="button primary" href="<?= site_url('customers/new') ?>">Add Customer</a>
</section>

<?php if (session('success')): ?>
    <div class="notice success"><?= esc(session('success')) ?></div>
<?php endif ?>

<div class="table-card">
    <div class="table-scroll">
        <table>
            <thead><tr><th>Full Name</th><th>Email</th><th>Phone</th><th>Action</th></tr></thead>
            <tbody>
            <?php foreach ($customers as $customer): ?>
                <tr>
                    <td><?= esc($customer['full_name']) ?></td>
                    <td><?= esc($customer['email']) ?></td>
                    <td><?= esc($customer['phone'] ?: '—') ?></td>
                    <td><a class="text-link" href="<?= site_url('customers/edit/' . $customer['customer_id']) ?>">Edit</a></td>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>

<?= view('templates/footer') ?>
