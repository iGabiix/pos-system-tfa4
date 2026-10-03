<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= esc($title) ?> | POS System</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>
<header class="topbar"><nav class="nav-wrap">
    <a class="brand" href="<?= base_url('/') ?>"><span class="brand-mark">P</span><span>POS System</span></a>
    <div class="nav-links"><a href="<?= base_url('/') ?>">Home</a><a href="<?= base_url('customers') ?>">Customers</a><a href="<?= base_url('users') ?>">Users</a><a href="<?= base_url('logout') ?>">Log out</a></div>
</nav></header>
<main class="container form-container">
    <p class="eyebrow">Customer Accounts</p><h1><?= esc($title) ?></h1>
    <?php $errors = session()->getFlashdata('errors') ?? []; ?>
    <?php if ($errors): ?><div class="alert error"><ul><?php foreach ($errors as $error): ?><li><?= esc($error) ?></li><?php endforeach; ?></ul></div><?php endif; ?>
    <?php $isEdit = $customer !== null; $action = $isEdit ? 'customers/' . $customer['id'] : 'customers'; ?>
    <form class="form-card" action="<?= base_url($action) ?>" method="post">
        <?= csrf_field() ?>
        <label for="full_name">Full Name <span>*</span></label>
        <input id="full_name" name="full_name" value="<?= esc(old('full_name', $customer['full_name'] ?? '')) ?>" required maxlength="100">
        <label for="email">Email Address <span>*</span></label>
        <input id="email" type="email" name="email" value="<?= esc(old('email', $customer['email'] ?? '')) ?>" required maxlength="100">
        <label for="phone">Phone Number</label>
        <input id="phone" name="phone" value="<?= esc(old('phone', $customer['phone'] ?? '')) ?>" maxlength="20">
        <div class="form-actions"><a class="button secondary" href="<?= base_url('customers') ?>">Cancel</a><button class="button" type="submit">Save Customer</button></div>
    </form>
</main>
</body>
</html>
