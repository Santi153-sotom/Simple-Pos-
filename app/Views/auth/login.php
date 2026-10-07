<?= view('templates/header', ['title' => $title]) ?>

<section class="page-heading login-heading">
    <p class="eyebrow">Secure Access</p>
    <h1>POS Login</h1>
    <p class="lead">Sign in to manage customer and user accounts.</p>
</section>

<?php if (session()->getFlashdata('success')): ?>
    <div class="notice success"><?= esc(session()->getFlashdata('success')) ?></div>
<?php endif ?>
<?php if (session()->getFlashdata('error')): ?>
    <div class="notice error"><?= esc(session()->getFlashdata('error')) ?></div>
<?php endif ?>
<?php if ($validation && $validation->getErrors()): ?>
    <div class="notice error">
        <ul><?php foreach ($validation->getErrors() as $error): ?><li><?= esc($error) ?></li><?php endforeach ?></ul>
    </div>
<?php endif ?>

<form class="form-card login-card" method="post" action="<?= site_url('login') ?>">
    <?= csrf_field() ?>
    <label>Username <span>*</span>
        <input type="text" name="username" maxlength="50" required autofocus autocomplete="username" value="<?= esc(old('username')) ?>">
    </label>
    <label>Password <span>*</span>
        <input type="password" name="password" maxlength="255" required autocomplete="current-password">
    </label>
    <div class="actions">
        <button class="button primary" type="submit">Log In</button>
    </div>
</form>

<?= view('templates/footer') ?>
