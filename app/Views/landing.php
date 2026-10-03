<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard | POS System</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>
<header class="topbar"><nav class="nav-wrap">
    <a class="brand" href="<?= base_url('/') ?>"><span class="brand-mark">P</span><span>POS System</span></a>
    <div class="nav-links"><a class="active" href="<?= base_url('/') ?>">Home</a><a href="<?= base_url('about') ?>">About</a><a href="<?= base_url('customers') ?>">Customers</a><a href="<?= base_url('users') ?>">Users</a><?php if (session()->has('user_id')): ?><a href="<?= base_url('logout') ?>">Log out</a><?php else: ?><a href="<?= base_url('login') ?>">Sign in</a><?php endif; ?></div>
</nav></header>
<main class="container">
    <section class="hero">
        <p class="eyebrow">Simple. Organized. Reliable.</p>
        <h1>Manage your POS accounts with confidence.</h1>
        <p>A clean account management dashboard powered by CodeIgniter 4 and MySQL.</p>
        <a class="button light" href="<?= base_url('customers') ?>">View customer accounts →</a>
    </section>
    <section class="grid">
        <article class="card"><div class="card-icon">◎</div><h2>Customer Accounts</h2><p>View customer contact information stored securely in the database.</p><a class="card-link" href="<?= base_url('customers') ?>">Open customers →</a></article>
        <article class="card"><div class="card-icon">♙</div><h2>User Accounts</h2><p>Review registered system users and their account creation dates.</p><a class="card-link" href="<?= base_url('users') ?>">Open users →</a></article>
    </section>
</main>
<footer>POS System · Built with CodeIgniter 4 and MySQL</footer>
</body>
</html>
