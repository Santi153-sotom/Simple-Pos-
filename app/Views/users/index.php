<?= view('templates/header', ['title' => $title]) ?>

<section class="page-heading">
    <p class="eyebrow">Staff Directory</p>
    <h1>User Accounts</h1>
    <p class="lead">Temporary user records stored in a static PHP array.</p>
</section>

<div class="table-card">
    <div class="table-scroll">
        <table>
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Full Name</th>
                    <th>Role</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><span class="username"><?= esc($user['username']) ?></span></td>
                        <td><?= esc($user['full_name']) ?></td>
                        <td><span class="role"><?= esc($user['role']) ?></span></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?= view('templates/footer') ?>
