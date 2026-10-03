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
    <p class="eyebrow">User Accounts</p><h1><?= esc($title) ?></h1>
    <?php $errors = session()->getFlashdata('errors') ?? []; ?>
    <?php if ($errors): ?><div class="alert error"><ul><?php foreach ($errors as $error): ?><li><?= esc($error) ?></li><?php endforeach; ?></ul></div><?php endif; ?>
    <?php $isEdit = $user !== null; $action = $isEdit ? 'users/' . $user['id'] : 'users'; ?>
    <form class="form-card" action="<?= base_url($action) ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>
        <label for="username">Username <span>*</span></label>
        <input id="username" name="username" value="<?= esc(old('username', $user['username'] ?? '')) ?>" required minlength="4" maxlength="50">
        <label for="full_name">Full Name <span>*</span></label>
        <input id="full_name" name="full_name" value="<?= esc(old('full_name', $user['full_name'] ?? '')) ?>" required maxlength="100">
        <label for="password">Password <span><?= $isEdit ? '' : '*' ?></span></label>
        <input id="password" type="password" name="password" <?= $isEdit ? '' : 'required' ?> minlength="8" maxlength="255" autocomplete="new-password">
        <small><?= $isEdit ? 'Leave blank to keep the current password.' : 'Use at least 8 characters.' ?></small>
        <?php if ($isEdit): ?>
            <label for="avatar">Profile Picture</label>
            <input id="avatar" type="file" name="avatar" accept="image/jpeg,image/png">
            <small>Optional. JPG or PNG only, maximum 2 MB.</small>
        <?php endif; ?>
        <div class="form-actions"><a class="button secondary" href="<?= base_url('users') ?>">Cancel</a><button class="button" type="submit">Save User</button></div>
    </form>
</main>
</body>
</html>
