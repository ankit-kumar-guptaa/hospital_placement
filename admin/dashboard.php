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
$stmt_employer = $pdo->query("SELECT * FROM employer_submissions ORDER BY submission_date DESC");
$employer_submissions = $stmt_employer->fetchAll(PDO::FETCH_ASSOC);

// Fetch Contact Form data
$stmt_contact = $pdo->query("SELECT * FROM contact_forms ORDER BY created_at DESC");
$contact_form_submissions = $stmt_contact->fetchAll(PDO::FETCH_ASSOC);

// Fetch Hospital Application data
$stmt_hospital = $pdo->query("SELECT * FROM hospital_applications ORDER BY created_at DESC");
$hospital_applications = $stmt_hospital->fetchAll(PDO::FETCH_ASSOC);
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
            background-color: #396391;
            border-radius: 4px;
        }
        .content {
            padding: 30px;
        }
        .card-header {
            background-color: #396391;
            color: white;
        }
        .card-body{
            max-height: 500px;
            overflow-y: auto;
        }
        .table th {
            background-color: #396391;
            color: white;
            cursor: pointer;
        }
        .logout-btn {
            margin-top: 20px;
        }
        .search-box {
            margin-bottom: 10px;
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
                    <li class="nav-item">
                        <a class="nav-link" href="#hospital" data-bs-toggle="tab">Hospital Applications</a>
                    </li>
                </ul>
                <a href="logout.php" class="btn btn-danger btn-block logout-btn">Logout</a>
            </div>

            <!-- Main Content -->
            <div class="col-md-10 content">
                <div class="tab-content">
                    <!-- Job Seeker Tab -->
                    <!-- <div class="tab-pane fade show active" id="jobseeker">
                        <div class="card">
                            <div class="card-header">
                                <h4>Job Seeker Submissions</h4>
                                <input type="text" id="jobSeekerSearch" class="form-control search-box" placeholder="Search...">
                            </div>
                            <div class="card-body">
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
                    </div> -->
                                            <!-- Job Seeker Tab -->
<div class="tab-pane fade show active" id="jobseeker">
    <div class="card">
        <div class="card-header">
            <h4>Job Seeker Submissions</h4>
            <!-- Search Box -->
            <input type="text" id="jobSeekerSearch" class="form-control search-box" placeholder="Search...">
            <!-- Date Filter -->
            <div class="row mt-2">
                <div class="col-md-6">
                    <label for="fromDateJobSeeker">From Date:</label>
                    <input type="date" id="fromDateJobSeeker" class="form-control">
                </div>
                <div class="col-md-6">
                    <label for="toDateJobSeeker">To Date:</label>
                    <input type="date" id="toDateJobSeeker" class="form-control">
                </div>
            </div>
        </div>
        <div class="card-body">
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
                    <!-- Employer Tab -->
                    <div class="tab-pane fade" id="employer">
                        <div class="card">
                            <div class="card-header">
                                <h4>Employer Form Submissions</h4>
                                <input type="text" id="employerSearch" class="form-control search-box" placeholder="Search...">
                            </div>
                            <div class="card-body">
                                <table class="table table-striped table-bordered" id="employerTable">
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
                                                <td><?php echo $submission['submission_date']; ?></td>
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
                                <input type="text" id="contactSearch" class="form-control search-box" placeholder="Search...">
                            </div>
                            <div class="card-body">
                                <table class="table table-striped table-bordered" id="contactTable">
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

                    <!-- Hospital Applications Tab -->
                    <div class="tab-pane fade" id="hospital">
                        <div class="card">
                            <div class="card-header">
                                <h4>Hospital Applications</h4>
                                <input type="text" id="hospitalSearch" class="form-control search-box" placeholder="Search...">
                            </div>
                            <div class="card-body">
                                <table class="table table-striped table-bordered" id="hospitalTable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Gender</th>
                                            <th>Date of Birth</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Address</th>
                                            <th>City</th>
                                            <th>Role</th>
                                            <th>Qualification</th>
                                            <th>Experience</th>
                                            <th>Skills</th>
                                            <th>Certifications</th>
                                            <th>CV File</th>
                                            <th>Created At</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($hospital_applications as $application): ?>
                                            <tr>
                                                <td><?php echo $application['id']; ?></td>
                                                <td><?php echo $application['first_name']; ?></td>
                                                <td><?php echo $application['last_name']; ?></td>
                                                <td><?php echo $application['gender']; ?></td>
                                                <td><?php echo $application['date_of_birth']; ?></td>
                                                <td><?php echo $application['email']; ?></td>
                                                <td><?php echo $application['phone']; ?></td>
                                                <td><?php echo $application['address']; ?></td>
                                                <td><?php echo $application['city']; ?></td>
                                                <td><?php echo $application['role']; ?></td>
                                                <td><?php echo $application['qualification']; ?></td>
                                                <td><?php echo $application['experience']; ?></td>
                                                <td><?php echo $application['skills']; ?></td>
                                                <td><?php echo $application['certifications']; ?></td>
                                                <td>
                                                    <a href="<?php echo $application['cv_path']; ?>" target="_blank">Download CV</a>
                                                </td>
                                                <td><?php echo $application['created_at']; ?></td>
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
    <script>
        // Search Functionality
        $(document).ready(function(){
            // Job Seeker Search
            $("#jobSeekerSearch").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#jobSeekerTable tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });

            // Employer Search
            $("#employerSearch").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#employerTable tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });

            // Contact Form Search
            $("#contactSearch").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#contactTable tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });

            // Hospital Applications Search
            $("#hospitalSearch").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#hospitalTable tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });

            // Sorting Functionality
            $('th').click(function(){
                var table = $(this).parents('table').eq(0)
                var rows = table.find('tr:gt(0)').toArray().sort(comparer($(this).index()))
                this.asc = !this.asc
                if (!this.asc){rows = rows.reverse()}
                for (var i = 0; i < rows.length; i++){table.append(rows[i])}
            });

            function comparer(index) {
                return function(a, b) {
                    var valA = getCellValue(a, index), valB = getCellValue(b, index)
                    return $.isNumeric(valA) && $.isNumeric(valB) ? valA - valB : valA.toString().localeCompare(valB)
                }
            }

            function getCellValue(row, index){ return $(row).children('td').eq(index).text() }
        });
    </script>

    <script>
        // Date Filter for Job Seeker Table
$("#fromDateJobSeeker, #toDateJobSeeker").on("change", function() {
    var fromDate = $("#fromDateJobSeeker").val();
    var toDate = $("#toDateJobSeeker").val();

    $("#jobSeekerTable tbody tr").each(function() {
        var rowDate = $(this).find("td:last").text().split(' ')[0]; // Get only the date part
        if ((fromDate === "" || rowDate >= fromDate) && (toDate === "" || rowDate <= toDate)) {
            $(this).show();
        } else {
            $(this).hide();
        }
    });
});
    </script>
</body>
</html>