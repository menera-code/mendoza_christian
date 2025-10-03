<?php if (!empty($_SESSION['flash_error'])): ?>
  <div><?= $_SESSION['flash_error']; unset($_SESSION['flash_error']); ?></div>
<?php endif; ?>

<form method="post" action="<?= base_url('auth/register') ?>">
  <input name="username" type="text" placeholder="Username" required><br>
  <input name="email"    type="email" placeholder="Email" required><br>
  <input name="password" type="password" placeholder="Password" required><br>
  <button type="submit">Register</button>
</form>
<p>Already have an account? <a href="<?= base_url('auth/login') ?>">Login</a></p>
