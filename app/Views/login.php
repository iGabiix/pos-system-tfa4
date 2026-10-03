<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign In | POS System</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>
<main class="container login-container">
    <section class="login-card">
        <a class="brand login-brand" href="<?= base_url('/') ?>"><span class="brand-mark">P</span><span>POS System</span></a>
        <p class="eyebrow">Staff access</p>
        <h1>Sign in to continue</h1>
        <p class="subtitle">Use your POS account to manage customer and user records.</p>
        <?php if ($error = session()->getFlashdata('error')): ?><div class="alert error"><?= esc($error) ?></div><?php endif; ?>
        <?php if ($success = session()->getFlashdata('success')): ?><div class="alert success"><?= esc($success) ?></div><?php endif; ?>
        <form class="form-card" action="<?= base_url('login') ?>" method="post">
            <?= csrf_field() ?>
            <label for="username">Username <span>*</span></label>
            <input id="username" name="username" value="<?= esc(old('username')) ?>" required maxlength="50" autocomplete="username">
            <label for="password">Password <span>*</span></label>
            <input id="password" type="password" name="password" required autocomplete="current-password">
            <button class="button" type="submit">Sign In</button>
        </form>
    </section>
</main>
</body>
</html>
