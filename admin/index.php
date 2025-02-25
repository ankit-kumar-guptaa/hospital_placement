<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit();
}

require '../include/db.php';
require 'visitor_tracking.php'; // Visitor tracking script include

$admin_name = $_SESSION['admin_name'] ?? 'Admin';
$selected_month = isset($_GET['month']) ? $_GET['month'] : date('Y-m');

// Clear recent submissions if requested
if (isset($_POST['clear_recent'])) {
    $stmt_clear = $pdo->prepare("DELETE FROM visitors WHERE visit_date >= DATE_SUB(NOW(), INTERVAL 24 HOUR)");
    $stmt_clear->execute();
    header("Location: index.php"); // Refresh page after clearing
    exit();
}

// Total Visitors (all visits)
$stmt_visitors = $pdo->query("SELECT COUNT(*) as total_visitors FROM visitors");
$total_visitors = $stmt_visitors->fetch(PDO::FETCH_ASSOC)['total_visitors'];

// Unique Visitors (distinct IPs)
$stmt_unique_visitors = $pdo->query("SELECT COUNT(DISTINCT ip_address) as unique_visitors FROM visitors");
$unique_visitors = $stmt_unique_visitors->fetch(PDO::FETCH_ASSOC)['unique_visitors'];

// Visitors by Date (filtered by month)
$stmt_visitors_date = $pdo->prepare("SELECT DATE(visit_date) as date, COUNT(*) as count FROM visitors WHERE DATE_FORMAT(visit_date, '%Y-%m') = :month GROUP BY DATE(visit_date) ORDER BY date ASC");
$stmt_visitors_date->execute(['month' => $selected_month]);
$visitors_by_date = $stmt_visitors_date->fetchAll(PDO::FETCH_ASSOC);

// Form Submissions Counts
$stmt_job_seeker = $pdo->query("SELECT COUNT(*) as count FROM form_submissions");
$total_job_seeker = $stmt_job_seeker->fetch(PDO::FETCH_ASSOC)['count'];

$stmt_employer = $pdo->query("SELECT COUNT(*) as count FROM employer_submissions");
$total_employer = $stmt_employer->fetch(PDO::FETCH_ASSOC)['count'];

$stmt_contact = $pdo->query("SELECT COUNT(*) as count FROM contact_forms");
$total_contact = $stmt_contact->fetch(PDO::FETCH_ASSOC)['count'];

$stmt_hospital = $pdo->query("SELECT COUNT(*) as count FROM hospital_applications");
$total_hospital = $stmt_hospital->fetch(PDO::FETCH_ASSOC)['count'];

$total_forms = $total_job_seeker + $total_employer + $total_contact + $total_hospital;

// Form Submissions by Date (filtered by month)
$forms_by_date = [];
$tables = [
    'form_submissions' => ['label' => 'Job Seeker', 'date_column' => 'created_at'],
    'employer_submissions' => ['label' => 'Employer', 'date_column' => 'submission_date'],
    'contact_forms' => ['label' => 'Contact', 'date_column' => 'created_at'],
    'hospital_applications' => ['label' => 'Hospital', 'date_column' => 'created_at']
];
foreach ($tables as $table => $config) {
    $stmt = $pdo->prepare("SELECT DATE({$config['date_column']}) as date, COUNT(*) as count FROM $table WHERE DATE_FORMAT({$config['date_column']}, '%Y-%m') = :month GROUP BY DATE({$config['date_column']}) ORDER BY date ASC");
    $stmt->execute(['month' => $selected_month]);
    $forms_by_date[$config['label']] = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Last 7 Days Stats
$stmt_last7_visitors = $pdo->query("SELECT COUNT(*) as count FROM visitors WHERE visit_date >= DATE_SUB(CURDATE(), INTERVAL 7 DAY)");
$last7_visitors = $stmt_last7_visitors->fetch(PDO::FETCH_ASSOC)['count'];

$last7_forms = array_sum(array_map(function($table) use ($pdo, $tables) {
    $date_column = $tables[$table]['date_column'];
    $stmt = $pdo->query("SELECT COUNT(*) as count FROM $table WHERE $date_column >= DATE_SUB(CURDATE(), INTERVAL 7 DAY)");
    return $stmt->fetch(PDO::FETCH_ASSOC)['count'];
}, array_keys($tables)));

// Recent Submissions (last 24 hours)
$recent_submissions = [];
foreach ($tables as $table => $config) {
    $stmt = $pdo->prepare("SELECT * FROM $table WHERE {$config['date_column']} >= DATE_SUB(NOW(), INTERVAL 24 HOUR) ORDER BY {$config['date_column']} DESC LIMIT 5");
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($results as $row) {
        $recent_submissions[] = ['type' => $config['label'], 'time' => $row[$config['date_column']]];
    }
}

// Prepare Chart Data
$visitor_dates = array_column($visitors_by_date, 'date');
$visitor_counts = array_column($visitors_by_date, 'count');

$all_dates = array_unique(call_user_func_array('array_merge', array_map(function($data) {
    return array_column($data, 'date');
}, array_values($forms_by_date))));
sort($all_dates);

$form_datasets = [];
foreach ($forms_by_date as $label => $data) {
    $counts = array_fill(0, count($all_dates), 0);
    foreach ($data as $entry) {
        $index = array_search($entry['date'], $all_dates);
        if ($index !== false) $counts[$index] = $entry['count'];
    }
    $form_datasets[] = ['label' => $label, 'data' => $counts];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Enhanced Overview</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            transition: all 0.3s ease;
        }
        /* Dark Mode (Default) */
        body.dark-mode {
            background-color: #2c2f33;
            color: #ffffff;
        }
        body.dark-mode .sidebar {
            background-color: #1e2a38;
        }
        body.dark-mode .sidebar .nav-link {
            color: #d1d4d7;
        }
        body.dark-mode .sidebar .nav-link:hover, body.dark-mode .sidebar .nav-link.active {
            background-color: #2c3e50;
            color: white;
        }
        body.dark-mode .content {
            margin-left: 250px;
            padding: 30px;
        }
        body.dark-mode .card {
            background-color: #3a3f44;
            box-shadow: 0 4px 12px rgba(0,0,0,0.3);
        }
        body.dark-mode .card-header {
            background-color: #2c3e50;
            color: #ffffff;
        }
        body.dark-mode .card-body {
            color: #d1d4d7;
        }
        body.dark-mode .graph-container {
            max-width: 100%;
        }
        body.dark-mode .icon {
            font-size: 2rem;
            margin-right: 10px;
            color: #6c757d;
        }
        body.dark-mode .welcome-text {
            font-size: 1.5rem;
            color: #ffffff;
        }
        body.dark-mode .notification-list {
            max-height: 200px;
            overflow-y: auto;
            color: #d1d4d7;
        }
        body.dark-mode .btn-primary {
            background-color: #2c3e50;
            border-color: #2c3e50;
        }
        body.dark-mode .btn-primary:hover {
            background-color: #3a506b;
            border-color: #3a506b;
        }
        body.dark-mode .form-control {
            background-color: #3a3f44;
            color: #d1d4d7;
            border: 1px solid #495057;
        }
        body.dark-mode .form-control:focus {
            background-color: #3a3f44;
            color: #d1d4d7;
            border-color: #5bc0de;
        }
        body.dark-mode .btn-clear {
            background-color: #dc3545;
            border-color: #dc3545;
            color: #ffffff;
        }
        body.dark-mode .btn-clear:hover {
            background-color: #c82333;
            border-color: #c82333;
        }

        /* Light Mode */
        body.light-mode {
            background-color: #e9ecef;
            color: #343a40;
        }
        body.light-mode .sidebar {
            background-color: #dee2e6;
        }
        body.light-mode .sidebar .nav-link {
            color: #495057;
        }
        body.light-mode .sidebar .nav-link:hover, body.light-mode .sidebar .nav-link.active {
            background-color: #ced4da;
            color: #343a40;
        }
        body.light-mode .content {
            margin-left: 250px;
            padding: 30px;
        }
        body.light-mode .card {
            background-color: #f8f9fa;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        body.light-mode .card-header {
            background-color: #ced4da;
            color: #343a40;
        }
        body.light-mode .card-body {
            color: #495057;
        }
        body.light-mode .graph-container {
            max-width: 100%;
        }
        body.light-mode .icon {
            font-size: 2rem;
            margin-right: 10px;
            color: #6c757d;
        }
        body.light-mode .welcome-text {
            font-size: 1.5rem;
            color: #343a40;
        }
        body.light-mode .notification-list {
            max-height: 200px;
            overflow-y: auto;
            color: #495057;
        }
        body.light-mode .btn-primary {
            background-color: #ced4da;
            border-color: #ced4da;
            color: #343a40;
        }
        body.light-mode .btn-primary:hover {
            background-color: #adb5bd;
            border-color: #adb5bd;
        }
        body.light-mode .form-control {
            background-color: #ffffff;
            color: #495057;
            border: 1px solid #ced4da;
        }
        body.light-mode .form-control:focus {
            background-color: #ffffff;
            color: #495057;
            border-color: #80bdff;
        }
        body.light-mode .btn-clear {
            background-color: #dc3545;
            border-color: #dc3545;
            color: #ffffff;
        }
        body.light-mode .btn-clear:hover {
            background-color: #c82333;
            border-color: #c82333;
        }

        /* Common Styles */
        .sidebar {
            min-height: 100vh;
            position: fixed;
            width: 250px;
        }
        .sidebar .nav-link {
            padding: 10px 20px;
            border-radius: 5px;
        }
        .card {
            border: none;
            border-radius: 10px;
            transition: transform 0.2s;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .card-header {
            border-radius: 10px 10px 0 0;
        }
        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
        }
        .mode-toggle {
            cursor: pointer;
            font-size: 1.2rem;
        }
    </style>
</head>
<body class="dark-mode">
    <div class="container-fluid p-0">
        <div class="row g-0">
            <!-- Sidebar -->
            <div class="col-md-2 sidebar p-4">
                <h3 class="text-center mb-4">Admin Panel</h3>
                <ul class="nav flex-column">
                    <li class="nav-item"><a class="nav-link active" href="index.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="jobseeker.php"><i class="fas fa-users"></i> Job Seeker Submissions</a></li>
                    <li class="nav-item"><a class="nav-link" href="employer.php"><i class="fas fa-building"></i> Employer Submissions</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.php"><i class="fas fa-envelope"></i> Contact Submissions</a></li>
                    <li class="nav-item"><a class="nav-link" href="hospital.php"><i class="fas fa-hospital"></i> Hospital Applications</a></li>
                </ul>
                <div class="text-center mt-4">
                    <i class="fas fa-moon mode-toggle" id="modeToggle" title="Toggle Light/Dark Mode"></i>
                </div>
                <a href="logout.php" class="btn btn-danger w-100 mt-4"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </div>

            <!-- Main Content -->
            <div class="col-md-10 content">
                <div class="welcome-text mb-4">Welcome, <?php echo htmlspecialchars($admin_name); ?>!</div>

                <!-- Month Filter -->
                <div class="mb-4">
                    <form method="GET" class="d-flex align-items-center">
                        <label for="month" class="me-2">Filter by Month:</label>
                        <input type="month" id="month" name="month" class="form-control w-25 me-2" value="<?php echo $selected_month; ?>">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-filter"></i> Apply</button>
                    </form>
                </div>

                <!-- Stats Cards -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header">
                                <h5><i class="fas fa-users icon"></i> Total Visitors</h5>
                            </div>
                            <div class="card-body">
                                <h3><?php echo $total_visitors; ?></h3>
                                <p>Last 7 Days: <?php echo $last7_visitors; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header">
                                <h5><i class="fas fa-user-check icon"></i> Unique Visitors</h5>
                            </div>
                            <div class="card-body">
                                <h3><?php echo $unique_visitors; ?></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header">
                                <h5><i class="fas fa-file-alt icon"></i> Total Forms</h5>
                            </div>
                            <div class="card-body">
                                <h3><?php echo $total_forms; ?></h3>
                                <p>Last 7 Days: <?php echo $last7_forms; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5><i class="fas fa-bell icon"></i> Recent Submissions</h5>
                                <form method="POST" style="margin: 0;">
                                    <button type="submit" name="clear_recent" class="btn btn-clear btn-sm"><i class="fas fa-trash"></i> Clear</button>
                                </form>
                            </div>
                            <div class="card-body notification-list">
                                <?php if (empty($recent_submissions)): ?>
                                    <p>No recent submissions</p>
                                <?php else: ?>
                                    <ul class="list-unstyled">
                                        <?php foreach ($recent_submissions as $submission): ?>
                                            <li><strong><?php echo $submission['type']; ?></strong> - <?php echo $submission['time']; ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Graphs -->
                <div class="row">
                    <div class="col-md-6 graph-container mb-4">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5>Visitors Over Time</h5>
                                <a href="export.php?type=visitors&month=<?php echo $selected_month; ?>" class="btn btn-sm btn-success"><i class="fas fa-download"></i> Export CSV</a>
                            </div>
                            <div class="card-body">
                                <canvas id="visitorsChart"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 graph-container mb-4">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5>Form Submissions Over Time</h5>
                                <a href="export.php?type=forms&month=<?php echo $selected_month; ?>" class="btn btn-sm btn-success"><i class="fas fa-download"></i> Export CSV</a>
                            </div>
                            <div class="card-body">
                                <canvas id="formsChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Theme Toggle Functionality
        const modeToggle = document.getElementById('modeToggle');
        const body = document.body;

        if (localStorage.getItem('theme') === 'light') {
            body.classList.remove('dark-mode');
            body.classList.add('light-mode');
            modeToggle.classList.remove('fa-moon');
            modeToggle.classList.add('fa-sun');
        }

        modeToggle.addEventListener('click', () => {
            if (body.classList.contains('dark-mode')) {
                body.classList.remove('dark-mode');
                body.classList.add('light-mode');
                modeToggle.classList.remove('fa-moon');
                modeToggle.classList.add('fa-sun');
                localStorage.setItem('theme', 'light');
            } else {
                body.classList.remove('light-mode');
                body.classList.add('dark-mode');
                modeToggle.classList.remove('fa-sun');
                modeToggle.classList.add('fa-moon');
                localStorage.setItem('theme', 'dark');
            }
        });

        // Visitors Chart
        const visitorsCtx = document.getElementById('visitorsChart').getContext('2d');
        new Chart(visitorsCtx, {
            type: 'line',
            data: {
                labels: <?php echo json_encode($visitor_dates); ?>,
                datasets: [{
                    label: 'Visitors',
                    data: <?php echo json_encode($visitor_counts); ?>,
                    borderColor: '#5bc0de',
                    backgroundColor: 'rgba(91, 192, 222, 0.1)',
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                scales: { x: { title: { display: true, text: 'Date' } }, y: { title: { display: true, text: 'Count' }, beginAtZero: true } },
                plugins: { legend: { position: 'top' } }
            }
        });

        // Form Submissions Chart
        const formsCtx = document.getElementById('formsChart').getContext('2d');
        new Chart(formsCtx, {
            type: 'line',
            data: {
                labels: <?php echo json_encode($all_dates); ?>,
                datasets: [
                    <?php foreach ($form_datasets as $index => $dataset): ?>
                    {
                        label: '<?php echo $dataset['label']; ?>',
                        data: <?php echo json_encode($dataset['data']); ?>,
                        borderColor: ['#28a745', '#dc3545', '#ffc107', '#17a2b8'][<?php echo $index; ?>],
                        backgroundColor: ['rgba(40, 167, 69, 0.1)', 'rgba(220, 53, 69, 0.1)', 'rgba(255, 193, 7, 0.1)', 'rgba(23, 162, 184, 0.1)'][<?php echo $index; ?>],
                        fill: true,
                        tension: 0.4
                    },
                    <?php endforeach; ?>
                ]
            },
            options: {
                responsive: true,
                scales: { x: { title: { display: true, text: 'Date' } }, y: { title: { display: true, text: 'Count' }, beginAtZero: true } },
                plugins: { legend: { position: 'top' } }
            }
        });
    </script>
</body>
</html>