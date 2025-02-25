<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit();
}

require '../include/db.php';

$admin_name = $_SESSION['admin_name'] ?? 'Admin';
$stmt_job_seeker = $pdo->query("SELECT * FROM form_submissions ORDER BY created_at DESC");
$job_seeker_submissions = $stmt_job_seeker->fetchAll(PDO::FETCH_ASSOC);

// CSV Export functionality
if (isset($_GET['export']) && $_GET['export'] === 'csv') {
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="job_seeker_submissions_' . date('Y-m-d') . '.csv"');
    header('Cache-Control: no-cache, no-store, must-revalidate');
    header('Pragma: no-cache');
    header('Expires: 0');

    $output = fopen('php://output', 'w');

    fputcsv($output, [
        'ID',
        'Role',
        'Name',
        'Email',
        'Phone',
        'Department',
        'Qualification',
        'College',
        'Created At'
    ]);

    foreach ($job_seeker_submissions as $submission) {
        fputcsv($output, [
            $submission['id'],
            $submission['role'],
            $submission['name'],
            $submission['email'],
            $submission['phone'],
            $submission['department'] ?: 'N/A',
            $submission['qualification'] ?: 'N/A',
            $submission['college'] ?: 'N/A',
            $submission['created_at']
        ]);
    }

    fclose($output);
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Seeker Submissions - Admin Dashboard</title>
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
        body.dark-mode .table th {
            background-color: #2c3e50;
            color: #ffffff;
        }
        body.dark-mode .table-striped tbody tr:nth-of-type(odd) {
            background-color: #343a40;
        }
        body.dark-mode .icon {
            color: #6c757d;
        }
        body.dark-mode .search-box,
        body.dark-mode .form-control {
            background-color: #3a3f44;
            color: #d1d4d7;
            border: 1px solid #495057;
        }
        body.dark-mode .search-box::placeholder,
        body.dark-mode .form-control::placeholder {
            color: #adb5bd;
        }
        body.dark-mode .form-control:focus {
            background-color: #3a3f44;
            color: #d1d4d7;
            border-color: #5bc0de;
            box-shadow: 0 0 0 0.2rem rgba(91, 192, 222, 0.25);
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
        body.light-mode .table th {
            background-color: #ced4da;
            color: #343a40;
        }
        body.light-mode .table-striped tbody tr:nth-of-type(odd) {
            background-color: #e9ecef;
        }
        body.light-mode .icon {
            color: #6c757d;
        }
        body.light-mode .search-box,
        body.light-mode .form-control {
            background-color: #ffffff;
            color: #495057;
            border: 1px solid #ced4da;
        }
        body.light-mode .search-box::placeholder,
        body.light-mode .form-control::placeholder {
            color: #6c757d;
        }
        body.light-mode .form-control:focus {
            background-color: #ffffff;
            color: #495057;
            border-color: #80bdff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
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
        .card-header {
            border-radius: 10px 10px 0 0;
        }
        .table th {
            cursor: pointer;
        }
        .search-box {
            margin-bottom: 15px;
        }
        .icon {
            font-size: 1.5rem;
            margin-right: 10px;
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
                    <li class="nav-item"><a class="nav-link" href="index.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link active" href="jobseeker.php"><i class="fas fa-users"></i> Job Seeker Submissions</a></li>
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
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4><i class="fas fa-users icon"></i> Job Seeker Submissions</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <input type="text" id="jobSeekerSearch" class="form-control search-box w-75" placeholder="Search...">
                            <a href="?export=csv" class="btn btn-success"><i class="fas fa-download"></i> Export to CSV</a>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="fromDateJobSeeker">From Date:</label>
                                <input type="date" id="fromDateJobSeeker" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="toDateJobSeeker">To Date:</label>
                                <input type="date" id="toDateJobSeeker" class="form-control">
                            </div>
                        </div>
                        <div style="max-height: 500px; overflow-y: auto;">
                            <table class="table table-striped table-bordered" id="jobSeekerTable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Role</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Department</th>
                                        <th>Qualification</th>
                                        <th>College</th>
                                        <th>Created At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($job_seeker_submissions as $submission): ?>
                                        <tr>
                                            <td><?php echo $submission['id']; ?></td>
                                            <td><?php echo $submission['role']; ?></td>
                                            <td><?php echo $submission['name']; ?></td>
                                            <td><?php echo $submission['email']; ?></td>
                                            <td><?php echo $submission['phone']; ?></td>
                                            <td><?php echo $submission['department'] ?: 'N/A'; ?></td>
                                            <td><?php echo $submission['qualification'] ?: 'N/A'; ?></td>
                                            <td><?php echo $submission['college'] ?: 'N/A'; ?></td>
                                            <td><?php echo $submission['created_at']; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#jobSeekerSearch").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#jobSeekerTable tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
            });

            $("#fromDateJobSeeker, #toDateJobSeeker").on("change", function() {
                var fromDate = $("#fromDateJobSeeker").val();
                var toDate = $("#toDateJobSeeker").val();
                $("#jobSeekerTable tbody tr").each(function() {
                    var rowDate = $(this).find("td:last").text().split(' ')[0];
                    if ((fromDate === "" || rowDate >= fromDate) && (toDate === "" || rowDate <= toDate)) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });

            $('th').click(function(){
                var table = $(this).parents('table').eq(0);
                var rows = table.find('tr:gt(0)').toArray().sort(comparer($(this).index()));
                this.asc = !this.asc;
                if (!this.asc) rows = rows.reverse();
                for (var i = 0; i < rows.length; i++) table.append(rows[i]);
            });

            function comparer(index) {
                return function(a, b) {
                    var valA = getCellValue(a, index), valB = getCellValue(b, index);
                    return $.isNumeric(valA) && $.isNumeric(valB) ? valA - valB : valA.toString().localeCompare(valB);
                };
            }
            function getCellValue(row, index) { return $(row).children('td').eq(index).text(); }

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
        });
    </script>
</body>
</html>