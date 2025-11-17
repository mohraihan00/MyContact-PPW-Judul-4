<?php

$action = $_POST['action'] ?? null;

// LOGIN
if ($action === 'login') {
    $user = trim($_POST['username'] ?? '');
    $pass = $_POST['password'] ?? '';

    if ($user === 'admin' && $pass === 'admin123') {
        $_SESSION['user'] = $user;
        $success = "Kamu berhasil masuk sebagai admin.";
    } else {
        $errors[] = "Username atau password salah.";
    }
}

// LOGOUT
if ($action === 'logout') {
    unset($_SESSION['user']);
    $success = "Kamu sudah keluar dari sistem.";
}

// TAMBAH KONTAK
if ($action === 'add' && isset($_SESSION['user'])) {
    $name    = trim($_POST['name'] ?? '');
    $email   = trim($_POST['email'] ?? '');
    $phone   = trim($_POST['phone'] ?? '');
    $notes   = trim($_POST['notes'] ?? '');

    if ($name === '' || strlen($name) < 3) {
        $errors[] = "Nama wajib diisi dan minimal 3 karakter.";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Format email yang kamu masukkan belum benar.";
    }
    if (!preg_match('/^[0-9]{9,15}$/', $phone)) {
        $errors[] = "Nomor HP harus berisi 9–15 digit angka.";
    }

    if (empty($errors)) {
        $id = $_SESSION['next_id']++;
        $_SESSION['contacts'][] = [
            'id'      => $id,
            'name'    => $name,
            'email'   => $email,
            'phone'   => $phone,
            'notes'   => $notes,
        ];
        $success = "Kontak baru berhasil kamu simpan.";
    }
}

// UPDATE KONTAK
if ($action === 'update' && isset($_SESSION['user'])) {
    $id      = (int)($_POST['id'] ?? 0);
    $name    = trim($_POST['name'] ?? '');
    $email   = trim($_POST['email'] ?? '');
    $phone   = trim($_POST['phone'] ?? '');
    $notes   = trim($_POST['notes'] ?? '');

    if ($name === '' || strlen($name) < 3) {
        $errors[] = "Nama wajib diisi dan minimal 3 karakter.";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Format email yang kamu masukkan belum benar.";
    }
    if (!preg_match('/^[0-9]{9,15}$/', $phone)) {
        $errors[] = "Nomor HP harus berisi 9–15 digit angka.";
    }

    if (empty($errors)) {
        foreach ($_SESSION['contacts'] as &$c) {
            if ($c['id'] === $id) {
                $c['name']    = $name;
                $c['email']   = $email;
                $c['phone']   = $phone;
                $c['notes']   = $notes;
                $success      = "Data kontak berhasil kamu perbarui.";
                break;
            }
        }
        unset($c);
    }
}

// HAPUS KONTAK
if ($action === 'delete' && isset($_SESSION['user'])) {
    $id = (int)($_POST['id'] ?? 0);
    $_SESSION['contacts'] = array_filter(
        $_SESSION['contacts'],
        fn($c) => $c['id'] !== $id
    );
    $success = "Kontak berhasil kamu hapus.";
}
