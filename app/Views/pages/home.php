<?= view('templates/header', ['title' => $title]) ?>

<section class="hero">
    <p class="eyebrow">Point-of-Sale System</p>
    <h1>Manage your shop in one simple place.</h1>
    <p class="lead">This first version provides quick access to customer and staff account records.</p>
    <div class="actions">
        <a class="button primary" href="<?= site_url('customers') ?>">View Customers</a>
        <a class="button secondary" href="<?= site_url('users') ?>">View Users</a>
    </div>
</section>

<section class="feature-grid">
    <article class="card">
        <h2>Customer Accounts</h2>
        <p>See customer names, email addresses, and contact numbers.</p>
    </article>
    <article class="card">
        <h2>User Accounts</h2>
        <p>See staff usernames, complete names, and assigned roles.</p>
    </article>
</section>

<?= view('templates/footer') ?>
