<?php

require_once '../includes/config.php';

$year = $_GET['year'] ?? null;
$monthId = $_GET['month_id'] ?? null;
$stmt = null;

if ($monthId && $year && $categoryId) {
    $stmt = $dbh->prepare('SELECT count(id) AS count, id, name AS filename FROM files WHERE month_id = ? AND year = ? AND category_id = ? AND unit_kerja = ?');
    $stmt->execute([$monthId, $year, $categoryId, $workUnit]);
} else if ($year && $categoryId) {
    $stmt = $dbh->prepare('SELECT count(id) AS count, id, name AS filename FROM files WHERE year = ? AND category_id = ? AND month_id IS NULL AND unit_kerja = ?');
    $stmt->execute([$year, $categoryId, $workUnit]);
} else if ($year) {
    $stmt = $dbh->prepare('SELECT count(id) AS count FROM files WHERE year = ? AND unit_kerja = 3');
    $stmt->execute([$year]);
}

header('Content-Type: application/json; charset=utf-8');
echo json_encode($stmt->fetch(PDO::FETCH_ASSOC));
