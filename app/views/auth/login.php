<?php if (!empty($_SESSION['flash_error'])): ?>
  <div><?= $_SESSION['flash_error']; unset($_SESSION['flash_error']); ?></div>
<?php endif; ?>

<form method="post" action="<?= base_url('auth/login') ?>">
  <input name="email"    type="email" placeholder="Email" required><br>
  <input name="password" type="password" placeholder="Password" required><br>
  <button type="submit">Login</button>
</form>
<p>No account? <a href="<?= base_url('auth/register') ?>">Register here</a></p>
