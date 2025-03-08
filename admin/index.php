<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit();
}

require '../include/db.php';

$admin_name = $_SESSION['admin_name'] ?? 'Admin';
$selected_month = isset($_GET['month']) ? $_GET['month'] : date('Y-m');

// Total Visitors
$stmt_visitors = $pdo->query("SELECT COUNT(*) as total_visitors FROM visitors");
$total_visitors = $stmt_visitors->fetch(PDO::FETCH_ASSOC)['total_visitors'];

// Unique Visitors
$stmt_unique_visitors = $pdo->query("SELECT COUNT(DISTINCT ip_address) as unique_visitors FROM visitors");
$unique_visitors = $stmt_unique_visitors->fetch(PDO::FETCH_ASSOC)['unique_visitors'];

// Visitors by Date
$stmt_visitors_date = $pdo->prepare("SELECT DATE(visit_date) as date, COUNT(*) as count FROM visitors WHERE DATE_FORMAT(visit_date, '%Y-%m') = :month GROUP BY DATE(visit_date) ORDER BY date ASC");
$stmt_visitors_date->execute(['month' => $selected_month]);
$visitors_by_date = $stmt_visitors_date->fetchAll(PDO::FETCH_ASSOC);

// Country-wise Visitors
$stmt_country_visitors = $pdo->query("SELECT country, COUNT(*) as count FROM visitors GROUP BY country ORDER BY count DESC");
$country_visitors = $stmt_country_visitors->fetchAll(PDO::FETCH_ASSOC);

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

// Form Submissions by Date
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

// Recent Visitors
$stmt_recent_visitors = $pdo->prepare("SELECT DISTINCT ip_address, MAX(visit_date) as last_visit FROM visitors WHERE visit_date >= DATE_SUB(NOW(), INTERVAL 24 HOUR) GROUP BY ip_address ORDER BY last_visit DESC LIMIT 5");
$stmt_recent_visitors->execute();
$recent_visitors = $stmt_recent_visitors->fetchAll(PDO::FETCH_ASSOC);

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
    <title>Admin Dashboard - Creative Overview</title>
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
        body.dark-mode .visitor-list {
            max-height: 200px;
            overflow-y: auto;
            color: #d1d4d7;
        }
        body.dark-mode canvas {
            background: #3a3f44;
        }
        body.dark-mode .country-card {
            border-radius: 15px;
            margin: 10px;
            padding: 20px;
            text-align: center;
            transition: transform 0.3s ease, opacity 0.3s ease;
            position: relative;
            overflow: hidden;
            background: linear-gradient(135deg, rgba(232, 76, 61, 0.2), rgba(232, 76, 61, 0.8));
            color: #ffffff;
        }
        body.dark-mode .country-card:hover {
            transform: scale(1.05);
            opacity: 0.9;
        }
        body.dark-mode .country-card .details {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.7);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        body.dark-mode .country-card:hover .details {
            opacity: 1;
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
        body.light-mode .visitor-list {
            max-height: 200px;
            overflow-y: auto;
            color: #495057;
        }
        body.light-mode canvas {
            background: #f8f9fa;
        }
        body.light-mode .country-card {
            border-radius: 15px;
            margin: 10px;
            padding: 20px;
            text-align: center;
            transition: transform 0.3s ease, opacity 0.3s ease;
            position: relative;
            overflow: hidden;
            background: linear-gradient(135deg, rgba(232, 76, 61, 0.2), rgba(232, 76, 61, 0.8));
            color: #ffffff;
        }
        body.light-mode .country-card:hover {
            transform: scale(1.05);
            opacity: 0.9;
        }
        body.light-mode .country-card .details {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.7);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        body.light-mode .country-card:hover .details {
            opacity: 1;
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
        .country-grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            max-height: 500px;
            overflow-y: auto;
        }
    </style>
</head>
<body class="dark-mode">
    <div class="container-fluid p-0">
        <div class="row g-0">
            <!-- Sidebar -->
            <div class="col-md-2 sidebar p-4">
                <img src="https://hosptal.hospitalplacement.com/wp-content/uploads/2021/05/logo-220.jpg" style="width: 105px; margin-bottom: 10px;" alt="">
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
                            <div class="card-header">
                                <h5><i class="fas fa-clock icon"></i> Recent Visitors</h5>
                            </div>
                            <div class="card-body visitor-list">
                                <?php if (empty($recent_visitors)): ?>
                                    <p>No recent visitors</p>
                                <?php else: ?>
                                    <ul class="list-unstyled">
                                        <?php foreach ($recent_visitors as $visitor): ?>
                                            <li><strong><?php echo $visitor['ip_address']; ?></strong> - <?php echo $visitor['last_visit']; ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Graphs and Country Grid -->
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
                    <div class="col-md-12 graph-container mb-4">
                        <div class="card">
                            <div class="card-header">
                                <h5><i class="fas fa-globe icon"></i> Visitor Locations</h5>
                            </div>
                            <div class="card-body">
                                <div class="country-grid">
                                    <?php if (empty($country_visitors)): ?>
                                        <div class="country-card" style="width: 150px; height: 150px;">
                                            <h5>No Data</h5>
                                        </div>
                                    <?php else: ?>
                                        <?php foreach ($country_visitors as $country): ?>
                                            <?php
                                            $size = min(100 + $country['count'] * 5, 250); // Size based on count, max 250px
                                            $opacity = min($country['count'] / $total_visitors * 10, 1); // Opacity based on proportion
                                            $percentage = round(($country['count'] / $total_visitors) * 100, 2);
                                            ?>
                                            <div class="country-card" style="width: <?php echo $size; ?>px; height: <?php echo $size; ?>px; background: linear-gradient(135deg, rgba(232, 76, 61, <?php echo $opacity * 0.2; ?>), rgba(232, 76, 61, <?php echo $opacity * 0.8; ?>));">
                                                <h5><?php echo htmlspecialchars($country['country']); ?></h5>
                                                <div class="detail">
                                                    <p><strong>Visitors:</strong> <?php echo $country['count']; ?></p>
                                                    <p><strong>Percentage:</strong> <?php echo $percentage; ?>%</p>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </div>
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
        // Theme Toggle
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
        const visitorDates = <?php echo json_encode($visitor_dates); ?>;
        const visitorCounts = <?php echo json_encode($visitor_counts); ?>;
        const visitorsCtx = document.getElementById('visitorsChart').getContext('2d');
        new Chart(visitorsCtx, {
            type: 'line',
            data: {
                labels: visitorDates.length ? visitorDates : ['No Data'],
                datasets: [{
                    label: 'Visitors',
                    data: visitorCounts.length ? visitorCounts : [0],
                    borderColor: '#5bc0de',
                    backgroundColor: 'rgba(91, 192, 222, 0.1)',
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                scales: { 
                    x: { title: { display: true, text: 'Date' } }, 
                    y: { title: { display: true, text: 'Count' }, beginAtZero: true } 
                },
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