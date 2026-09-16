<?= view('templates/header', ['title' => $title]) ?>

<section class="page-heading">
    <p class="eyebrow">About the Project</p>
    <h1>SimplePOS Version 1</h1>
    <p class="lead">SimplePOS is a basic CodeIgniter 4 website created as the starting point for a full Point-of-Sale system.</p>
</section>

<section class="card prose">
    <h2>Current Features</h2>
    <p>The system currently includes a landing page, an about page, a customer directory, and a user directory. Customer and user records are stored in temporary static PHP arrays, so no database connection is required.</p>
    <p>Future versions can add authentication, products, inventory, sales transactions, receipts, and database storage.</p>
</section>

<?= view('templates/footer') ?>
