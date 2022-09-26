<?php

require_once '../includes/config.php';

$year = $_GET['year'] ?? null;
$monthId = $_GET['month_id'] ?? null;
$stmt = null;

if ($monthId && $year) {
    $stmt = $dbh->prepare('SELECT count(id) AS count FROM files WHERE month_id = ? AND year = ? AND unit_kerja = 4');
    $stmt->execute([$monthId, $year]);
} else if ($year) {
    $stmt = $dbh->prepare('SELECT count(id) AS count FROM files WHERE year = ? AND unit_kerja = 4');
    $stmt->execute([$year]);
}

header('Content-Type: application/json; charset=utf-8');
echo json_encode($stmt->fetch(PDO::FETCH_ASSOC));
