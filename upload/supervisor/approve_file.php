<?php

require_once '../../includes/config.php';

if (isset($_GET['id'])) {
    $stmt = $dbh->prepare('UPDATE files SET approved = true WHERE id=?');

    if ($stmt->execute([$_GET['id']])) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        // Error handling in here
    }
}
