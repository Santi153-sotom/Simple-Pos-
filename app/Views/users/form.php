<?= view('templates/header', ['title' => $title]) ?>

<section class="page-heading">
    <p class="eyebrow">User Form</p>
    <h1><?= esc($title) ?></h1>
</section>

<?php if ($validation && $validation->getErrors()): ?>
    <div class="notice error">
        <strong>Please correct the following:</strong>
        <ul><?php foreach ($validation->getErrors() as $error): ?><li><?= esc($error) ?></li><?php endforeach ?></ul>
    </div>
<?php endif ?>

<form class="form-card" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>
    <?php if ($user !== null): ?>
        <img class="avatar avatar-large" src="<?= base_url(! empty($user['avatar']) ? 'uploads/avatars/' . rawurlencode($user['avatar']) : 'images/avatar-placeholder.svg') ?>" alt="Current avatar">
    <?php endif ?>
    <label>Username <span>*</span>
        <input type="text" name="username" minlength="5" maxlength="50" required value="<?= esc(old('username', $user['username'] ?? '')) ?>">
    </label>
    <label>Full Name <span>*</span>
        <input type="text" name="full_name" maxlength="100" required value="<?= esc(old('full_name', $user['full_name'] ?? '')) ?>">
    </label>
    <label>Role <span>*</span>
        <?php $selectedRole = old('role', $user['role'] ?? 'Cashier'); ?>
        <select name="role" required>
            <?php foreach (['Administrator', 'Manager', 'Cashier', 'Inventory Staff'] as $role): ?>
                <option value="<?= esc($role) ?>" <?= $selectedRole === $role ? 'selected' : '' ?>><?= esc($role) ?></option>
            <?php endforeach ?>
        </select>
    </label>
    <?php if ($user !== null): ?>
        <label>Profile Picture
            <input type="file" name="avatar" accept="image/jpeg,image/png">
            <small>JPG or PNG only, maximum 2 MB. A 300 × 300 display-ready image will be created.</small>
        </label>
    <?php endif ?>
    <div class="actions">
        <button class="button primary" type="submit">Save User</button>
        <a class="button secondary" href="<?= site_url('users') ?>">Cancel</a>
    </div>
</form>

<?= view('templates/footer') ?>
