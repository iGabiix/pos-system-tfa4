<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Accounts | POS System</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>
<header class="topbar"><nav class="nav-wrap">
    <a class="brand" href="<?= base_url('/') ?>"><span class="brand-mark">P</span><span>POS System</span></a>
    <div class="nav-links"><a href="<?= base_url('/') ?>">Home</a><a href="<?= base_url('about') ?>">About</a><a href="<?= base_url('customers') ?>">Customers</a><a class="active" href="<?= base_url('users') ?>">Users</a><a href="<?= base_url('logout') ?>">Log out</a></div>
</nav></header>
<main class="container">
    <div class="page-heading">
        <div><p class="eyebrow">System access</p><h1>User Accounts</h1><p class="subtitle">Registered POS users retrieved from the MySQL database.</p></div>
        <a class="button" href="<?= base_url('users/new') ?>">+ New User</a>
    </div>
    <?php if (session()->getFlashdata('success')): ?><div class="alert success"><?= esc(session()->getFlashdata('success')) ?></div><?php endif; ?>
    <section class="table-card"><div class="table-scroll"><table>
        <thead><tr><th>Avatar</th><th>Username</th><th>Full Name</th><th>Created At</th><th>Action</th></tr></thead>
        <tbody>
        <?php if ($users): ?>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?php if (! empty($user['avatar']) && is_file(FCPATH . 'uploads/' . basename($user['avatar']))): ?><img class="avatar avatar-image" src="<?= base_url('uploads/' . rawurlencode($user['avatar'])) ?>" alt="<?= esc($user['full_name']) ?> avatar"><?php else: ?><span class="avatar"><?= esc(strtoupper(substr($user['full_name'], 0, 1))) ?></span><?php endif; ?></td>
                    <td><span class="username">@<?= esc($user['username']) ?></span></td>
                    <td><?= esc($user['full_name']) ?></td>
                    <td><?= esc($user['created_at']) ?></td>
                    <td><a class="table-link" href="<?= base_url('users/' . $user['id'] . '/edit') ?>">Edit</a></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?><tr><td class="empty" colspan="5">No user records found.</td></tr><?php endif; ?>
        </tbody>
    </table></div></section>
</main>
<footer>POS System · Built with CodeIgniter 4 and MySQL</footer>
</body>
</html>
