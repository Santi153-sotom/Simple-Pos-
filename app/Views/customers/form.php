<?= view('templates/header', ['title' => $title]) ?>

<section class="page-heading">
    <p class="eyebrow">Customer Form</p>
    <h1><?= esc($title) ?></h1>
</section>

<?php if ($validation && $validation->getErrors()): ?>
    <div class="notice error">
        <strong>Please correct the following:</strong>
        <ul><?php foreach ($validation->getErrors() as $error): ?><li><?= esc($error) ?></li><?php endforeach ?></ul>
    </div>
<?php endif ?>

<form class="form-card" method="post">
    <?= csrf_field() ?>
    <label>Full Name <span>*</span>
        <input type="text" name="full_name" maxlength="100" required value="<?= esc(old('full_name', $customer['full_name'] ?? '')) ?>">
    </label>
    <label>Email <span>*</span>
        <input type="email" name="email" maxlength="150" required value="<?= esc(old('email', $customer['email'] ?? '')) ?>">
    </label>
    <label>Phone
        <input type="text" name="phone" maxlength="20" value="<?= esc(old('phone', $customer['phone'] ?? '')) ?>">
    </label>
    <div class="actions">
        <button class="button primary" type="submit">Save Customer</button>
        <a class="button secondary" href="<?= site_url('customers') ?>">Cancel</a>
    </div>
</form>

<?= view('templates/footer') ?>
