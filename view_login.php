<?php
// view_login.php
?>
<div class="login-box">
  <h2>Masuk</h2>
  <p class="muted">Gunakan kredensial ini untuk masuk: <strong>admin / admin123</strong></p>

  <?php foreach ($errors as $e): ?>
    <div class="message error"><?= h($e) ?></div>
  <?php endforeach; ?>

  <?php if ($success): ?>
    <div class="message success"><?= h($success) ?></div>
  <?php endif; ?>

  <form action="" method="post" style="margin-top:0.75rem;">
    <input type="hidden" name="action" value="login">

    <div>
      <label for="username">Username</label>
      <input type="text" name="username" id="username" required>
    </div>

    <div style="margin-top:0.75rem;">
      <label for="password">Password</label>
      <input type="password" name="password" id="password" required>
    </div>

    <div style="margin-top:1rem;">
      <button type="submit" class="btn btn-primary btn-block">Masuk</button>
    </div>
  </form>
</div>

</body>
</html>
