<?php
// view_contacts.php
?>
<div class="container">
  <div class="card">
    <h1><i>MyContact</i></h1>
    <p class="muted">
      Simpan kontak teman, keluarga, sampai tukang servis langgananmu. Semua tersimpan rapi dan gampang dicari.
    </p>
    <span class="badge"><?= count($_SESSION['contacts']) ?> kontak tersimpan</span>
  </div>

  <?php if (!empty($errors)): ?>
    <div class="message error">
      <?php foreach ($errors as $e): ?>
        • <?= h($e) ?><br>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>

  <?php if ($success): ?>
    <div class="message success"><?= h($success) ?></div>
  <?php endif; ?>

  <div class="card">
    <?php if ($editContact): ?>
      <h2>Edit Kontak</h2>
      <p class="muted">Perbarui data kontak yang kamu pilih, lalu simpan.</p>
      <form action="" method="post" style="margin-top:0.75rem;">
        <input type="hidden" name="action" value="update">
        <input type="hidden" name="id" value="<?= (int)$editContact['id'] ?>">

        <div class="row">
          <div>
            <label for="name">Nama*</label>
            <input type="text" id="name" name="name" required value="<?= h($editContact['name']) ?>">
          </div>
          <div>
            <label for="email">Email*</label>
            <input type="email" id="email" name="email" required value="<?= h($editContact['email']) ?>">
          </div>
          <div>
            <label for="phone">Nomor HP*</label>
            <input type="tel" id="phone" name="phone" required value="<?= h($editContact['phone']) ?>">
          </div>
        </div>

        <div style="margin-top:0.75rem;">
          <label for="notes">Catatan</label>
          <textarea id="notes" name="notes"><?= h($editContact['notes']) ?></textarea>
        </div>

        <div style="margin-top:0.9rem; display:flex; justify-content:space-between; gap:0.5rem;">
          <a href="index.php" class="btn btn-outline">Batal</a>
          <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </div>
      </form>

    <?php else: ?>
      <h2>Tambah Kontak Baru</h2>
      <p class="muted">Isi data kontak yang ingin kamu simpan. Kolom bertanda * wajib diisi.</p>
      <form action="" method="post" style="margin-top:0.75rem;">
        <input type="hidden" name="action" value="add">

        <div class="row">
          <div>
            <label for="name">Nama*</label>
            <input type="text" id="name" name="name" required>
          </div>
          <div>
            <label for="email">Email*</label>
            <input type="email" id="email" name="email" required>
          </div>
          <div>
            <label for="phone">Nomor HP*</label>
            <input type="tel" id="phone" name="phone" required placeholder="08xxxxxxxxxx">
          </div>
        </div>

        <div style="margin-top:0.75rem;">
          <label for="notes">Catatan</label>
          <textarea id="notes" name="notes"></textarea>
        </div>

        <div style="margin-top:0.9rem; text-align:right;">
          <button type="submit" class="btn btn-primary">Simpan Kontak</button>
        </div>
      </form>
    <?php endif; ?>
  </div>

  <div class="card">
    <h2>Daftar Kontak</h2>
    <?php if (empty($_SESSION['contacts'])): ?>
      <p class="muted" style="margin-top:0.5rem;">Belum ada kontak yang kamu simpan. Mulai dari formulir di atas.</p>
    <?php else: ?>
      <div style="margin-top:0.75rem; overflow-x:auto;">
        <table>
          <thead>
            <tr>
              <th>Nama</th>
              <th>Email</th>
              <th>Nomor HP</th>
              <th>Catatan</th>
              <th style="text-align:right;">Aksi</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($_SESSION['contacts'] as $c): ?>
            <tr>
              <td><?= h($c['name']) ?></td>
              <td><?= h($c['email']) ?></td>
              <td><?= h($c['phone']) ?></td>
              <td><?= nl2br(h($c['notes'])) ?></td>
              <td class="actions">
                <a class="btn btn-outline" href="?edit=<?= (int)$c['id'] ?>">Edit</a>
                <form action="" method="post" style="display:inline;">
                  <input type="hidden" name="action" value="delete">
                  <input type="hidden" name="id" value="<?= (int)$c['id'] ?>">
                  <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
              </td>
            </tr>
          <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    <?php endif; ?>
  </div>
</div>

</body>
</html>
