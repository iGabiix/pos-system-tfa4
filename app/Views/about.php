<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1">
    <title>About | POS System</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>
<header class="topbar"><nav class="nav-wrap">
    <a class="brand" href="<?= base_url('/') ?>"><span class="brand-mark">P</span><span>POS System</span></a>
    <div class="nav-links"><a href="<?= base_url('/') ?>">Home</a><a class="active" href="<?= base_url('about') ?>">About</a><a href="<?= base_url('customers') ?>">Customers</a><a href="<?= base_url('users') ?>">Users</a><?php if (session()->has('user_id')): ?><a href="<?= base_url('logout') ?>">Log out</a><?php else: ?><a href="<?= base_url('login') ?>">Sign in</a><?php endif; ?></div>
</nav></header>
<main class="container">
    <div class="page-heading"><div><p class="eyebrow">About the project</p><h1>Built for straightforward account management.</h1></div></div>
    <section class="card about-card">
        <p>This Point-of-Sale account management application demonstrates a clean MVC implementation using CodeIgniter 4 and a real MySQL database.</p>
        <ul class="feature-list">
            <li><span class="check">✓</span><span>Customer and user records are retrieved through dedicated Models.</span></li>
            <li><span class="check">✓</span><span>Database migrations provide a consistent, repeatable schema.</span></li>
            <li><span class="check">✓</span><span>Seeders supply sample records for testing and demonstration.</span></li>
        </ul>
    </section>
</main>
<footer>POS System · Built with CodeIgniter 4 and MySQL</footer>
</body>
</html>
