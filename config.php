<?php
session_start();

if (!isset($_SESSION['contacts'])) {
    $_SESSION['contacts'] = [];
}

if (!isset($_SESSION['next_id'])) {
    $_SESSION['next_id'] = 1;
}

$errors  = [];
$success = "";

/**
 * Escape HTML
 */
function h($str) {
    return htmlspecialchars($str ?? '', ENT_QUOTES, 'UTF-8');
}
