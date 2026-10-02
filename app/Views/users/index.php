<?= view('templates/header', ['title' => $title]) ?>

<section class="page-heading heading-actions">
    <div>
        <p class="eyebrow">Staff Directory</p>
        <h1>User Accounts</h1>
        <p class="lead">User and staff accounts stored in the POS database.</p>
    </div>
    <a class="button primary" href="<?= site_url('users/new') ?>">Add User</a>
</section>

<?php if (session('success')): ?>
    <div class="notice success"><?= esc(session('success')) ?></div>
<?php endif ?>

<div class="table-card">
    <div class="table-scroll">
        <table>
            <thead><tr><th>Avatar</th><th>Username</th><th>Full Name</th><th>Role</th><th>Action</th></tr></thead>
            <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><img class="avatar" src="<?= base_url(! empty($user['avatar']) ? 'uploads/avatars/' . rawurlencode($user['avatar']) : 'images/avatar-placeholder.svg') ?>" alt="<?= esc($user['full_name']) ?> avatar"></td>
                    <td><span class="username"><?= esc($user['username']) ?></span></td>
                    <td><?= esc($user['full_name']) ?></td>
                    <td><span class="role"><?= esc($user['role']) ?></span></td>
                    <td><a class="text-link" href="<?= site_url('users/edit/' . $user['user_id']) ?>">Edit</a></td>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>

<?= view('templates/footer') ?>
