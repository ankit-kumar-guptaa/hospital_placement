<?php
session_start();

// Redirect to login if not logged in
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit();
}

require '../include/db.php';

// Fetch Job Seeker data
$stmt_job_seeker = $pdo->query("SELECT * FROM form_submissions ORDER BY created_at DESC");
$job_seeker_submissions = $stmt_job_seeker->fetchAll(PDO::FETCH_ASSOC);

// Fetch Employer data
$stmt_employer = $pdo->query("SELECT * FROM employer_submissions ORDER BY created_at DESC");
$employer_submissions = $stmt_employer->fetchAll(PDO::FETCH_ASSOC);

// Fetch Contact Form data
// $stmt_contact = $pdo->query("SELECT * FROM contact_forms ORDER BY created_at DESC");
// $contact_form_submissions = $stmt_contact->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Hospital Placement</title>
 <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
        }
        .sidebar {
            background-color: #2c3e50;
            min-height: 100vh;
        }
        .sidebar .nav-link {
            color: white;
            font-weight: 500;
        }
        .sidebar .nav-link.active {
            background-color: #007bff;
            border-radius: 4px;
        }
        .content {
            padding: 30px;
        }
        .card-header {
            background-color: #007bff;
            color: white;
        }
        .table th {
            background-color: #007bff;
            color: white;
        }
        .logout-btn {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-2 sidebar p-4">
                <h3 class="text-center text-white">Admin Panel</h3>
                <ul class="nav flex-column mt-4">
                    <li class="nav-item">
                        <a class="nav-link active" href="#jobseeker" data-bs-toggle="tab">Job Seeker Submissions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#employer" data-bs-toggle="tab">Employer Form Submissions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact" data-bs-toggle="tab">Contact Form Submissions</a>
                    </li>
                </ul>
                <a href="logout.php" class="btn btn-danger btn-block logout-btn">Logout</a>
            </div>

            <!-- Main Content -->
            <div class="col-md-10 content">
                <div class="tab-content">
                    <!-- Job Seeker Tab -->
                    <div class="tab-pane fade show active" id="jobseeker">
                        <div class="card">
                            <div class="card-header">
                                <h4>Job Seeker Submissions</h4>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped table-bordered">
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

                    <!-- Employer Tab -->
                    <div class="tab-pane fade" id="employer">
                        <div class="card">
                            <div class="card-header">
                                <h4>Employer Form Submissions</h4>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Organization</th>
                                            <th>City</th>
                                            <th>Contact Person</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Remarks</th>
                                            <th>Created At</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($employer_submissions as $submission): ?>
                                            <tr>
                                                <td><?php echo $submission['id']; ?></td>
                                                <td><?php echo $submission['organization_name']; ?></td>
                                                <td><?php echo $submission['city']; ?></td>
                                                <td><?php echo $submission['contact_name']; ?></td>
                                                <td><?php echo $submission['email']; ?></td>
                                                <td><?php echo $submission['phone']; ?></td>
                                                <td><?php echo $submission['remarks']; ?></td>
                                                <td><?php echo $submission['created_at']; ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Form Tab -->
                    <div class="tab-pane fade" id="contact">
                        <div class="card">
                            <div class="card-header">
                                <h4>Contact Form Submissions</h4>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Message</th>
                                            <th>Created At</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($contact_form_submissions as $submission): ?>
                                            <tr>
                                                <td><?php echo $submission['id']; ?></td>
                                                <td><?php echo $submission['name']; ?></td>
                                                <td><?php echo $submission['email']; ?></td>
                                                <td><?php echo $submission['message']; ?></td>
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
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
