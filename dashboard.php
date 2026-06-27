<?php
include("db/connection.php");

// Total Students
$total_students = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM students"));

// Present Today
$present_query = mysqli_query($conn,"
SELECT COUNT(*) AS total
FROM attendance a
INNER JOIN students s
ON a.student_id = s.id
WHERE a.status='Present'
AND a.date = CURDATE()
");

$present = mysqli_fetch_assoc($present_query);
$total_present = $present['total'];

// Absent Today
$absent_query = mysqli_query($conn,"
SELECT COUNT(*) AS total
FROM attendance a
INNER JOIN students s
ON a.student_id = s.id
WHERE a.status='Absent'
AND a.date = CURDATE()
");

$absent = mysqli_fetch_assoc($absent_query);
$total_absent = $absent['total'];
?>

<!DOCTYPE html>
<html>
<head><head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="css/dashboard.css">
</head>
</head>

<body>

<div class="sidebar">

<h2>🎓 Attendance</h2>

<a href="dashboard.php"><i class="fa-solid fa-house"></i> Dashboard</a>

<a href="add_student.php"><i class="fa-solid fa-user-plus"></i> Add Student</a>

<a href="view_students.php"><i class="fa-solid fa-users"></i> View Students</a>

<a href="mark_attendance.php"><i class="fa-solid fa-clipboard-check"></i> Attendance</a>

<a href="attendance_report.php"><i class="fa-solid fa-chart-column"></i> Reports</a>

<a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>

</div>

<div class="content">

<h1>Welcome, Admin 👋</h1>
<div class="cards">

<div class="card-box blue">
<i class="fa-solid fa-users"></i>
<h1><?php echo $total_students; ?></h1>
<p>Total Students</p>
</div>

<div class="card-box green">
<i class="fa-solid fa-user-check"></i>
<h1><?php echo $total_present; ?></h1>
<p>Present Today</p>
</div>

<div class="card-box red">
<i class="fa-solid fa-user-xmark"></i>
<h1><?php echo $total_absent; ?></h1>
<p>Absent Today</p>
</div>

<div class="card-box purple">
<i class="fa-solid fa-chart-line"></i>
<h1>
<?php
if($total_students>0)
echo round(($total_present/$total_students)*100)."%";
else
echo "0%";
?>
</h1>
<p>Attendance</p>
</div>

</div>

</body>
</html>