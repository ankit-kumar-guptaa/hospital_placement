<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit();
}

require '../include/db.php';

$type = $_GET['type'] ?? '';
$month = $_GET['month'] ?? date('Y-m');

header('Content-Type: text/csv');
header('Content-Disposition: attachment;filename="' . $type . '_data_' . $month . '.csv"');

$output = fopen('php://output', 'w');

if ($type === 'visitors') {
    fputcsv($output, ['Date', 'Visitor Count']);
    $stmt = $pdo->prepare("SELECT DATE(visit_date) as date, COUNT(*) as count FROM visitors WHERE DATE_FORMAT(visit_date, '%Y-%m') = :month GROUP BY DATE(visit_date) ORDER BY date ASC");
    $stmt->execute(['month' => $month]);
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        fputcsv($output, [$row['date'], $row['count']]);
    }
} elseif ($type === 'forms') {
    fputcsv($output, ['Date', 'Form Submission Count']);
    $stmt = $pdo->prepare("SELECT DATE(created_at) as date, COUNT(*) as count FROM form_submissions WHERE DATE_FORMAT(created_at, '%Y-%m') = :month GROUP BY DATE(created_at) ORDER BY date ASC");
    $stmt->execute(['month' => $month]);
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        fputcsv($output, [$row['date'], $row['count']]);
    }
}

fclose($output);
exit();