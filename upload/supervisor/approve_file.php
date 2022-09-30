<?php

require_once '../../includes/config.php';

if (isset($_GET['id'])) {
    $stmt = $dbh->prepare('UPDATE files SET approved = true WHERE id=?');

    $fileStmt = $dbh->prepare('SELECT * FROM files WHERE id = ?');
    $fileStmt->execute([$_GET['id']]);
    $approvedFile = $fileStmt->fetch(PDO::FETCH_ASSOC);

    $replaceStmt;

    if ($approvedFile['month_id']) {
        $replaceStmt = $dbh->prepare('DELETE FROM files WHERE id != ? AND category_id = ? AND month_id = ? AND year = ?');
        $replaceStmt->execute([$_GET['id'], $approvedFile['category_id'], $approvedFile['month_id'], $approvedFile['year']]);
    } else {
        $replaceStmt = $dbh->prepare('DELETE FROM files WHERE id != ? AND category_id = ? AND month_id IS NULL AND year = ?');
        $replaceStmt->execute([$_GET['id'], $approvedFile['category_id'], $approvedFile['year']]);
    }
    
    // TODO Unlink each unapproved files
    // unlink($_SERVER['DOCUMENT_ROOT'] . '/upload/uploads/planning/' . $path);
    
    if ($stmt->execute([$_GET['id']])) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        // Error handling in here
    }
}
