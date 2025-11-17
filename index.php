<?php
require __DIR__ . '/config.php';
require __DIR__ . '/actions.php';

$editId      = isset($_GET['edit']) ? (int)$_GET['edit'] : 0;
$editContact = null;
if ($editId && isset($_SESSION['user'])) {
    foreach ($_SESSION['contacts'] as $c) {
        if ($c['id'] === $editId) {
            $editContact = $c;
            break;
        }
    }
}

require __DIR__ . '/header.php';

if (!isset($_SESSION['user'])) {
    require __DIR__ . '/view_login.php';
} else {
    require __DIR__ . '/view_contacts.php';
}
