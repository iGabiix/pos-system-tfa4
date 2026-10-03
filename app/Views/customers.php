<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Customer Accounts | POS System</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>
<header class="topbar"><nav class="nav-wrap">
    <a class="brand" href="<?= base_url('/') ?>"><span class="brand-mark">P</span><span>POS System</span></a>
    <div class="nav-links"><a href="<?= base_url('/') ?>">Home</a><a href="<?= base_url('about') ?>">About</a><a class="active" href="<?= base_url('customers') ?>">Customers</a><a href="<?= base_url('users') ?>">Users</a><a href="<?= base_url('logout') ?>">Log out</a></div>
</nav></header>
<main class="container">
    <div class="page-heading">
        <div><p class="eyebrow">Account directory</p><h1>Customer Accounts</h1><p class="subtitle">Customer contact records retrieved from the MySQL database.</p></div>
        <a class="button" href="<?= base_url('customers/new') ?>">+ New Customer</a>
    </div>
    <?php if (session()->getFlashdata('success')): ?><div class="alert success"><?= esc(session()->getFlashdata('success')) ?></div><?php endif; ?>
    <section class="table-card"><div class="table-scroll"><table>
        <thead><tr><th>Customer</th><th>Email Address</th><th>Phone</th><th>Created At</th><th>Action</th></tr></thead>
        <tbody>
        <?php if ($customers): ?>
            <?php foreach ($customers as $customer): ?>
                <tr>
                    <td><div class="person"><span class="avatar"><?= esc(strtoupper(substr($customer['full_name'], 0, 1))) ?></span><?= esc($customer['full_name']) ?></div></td>
                    <td><?= esc($customer['email']) ?></td>
                    <td><?= esc($customer['phone'] ?: '—') ?></td>
                    <td><?= esc($customer['created_at']) ?></td>
                    <td><a class="table-link" href="<?= base_url('customers/' . $customer['id'] . '/edit') ?>">Edit</a></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?><tr><td class="empty" colspan="5">No customer records found.</td></tr><?php endif; ?>
        </tbody>
    </table></div></section>
</main>
<footer>POS System · Built with CodeIgniter 4 and MySQL</footer>
</body>
</html>
