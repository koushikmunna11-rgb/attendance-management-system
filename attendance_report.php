<?php
include("db/connection.php");

$query = "SELECT
            attendance.id,
            students.name,
            students.roll_no,
            attendance.date,
            attendance.status
          FROM attendance
          INNER JOIN students
          ON attendance.student_id = students.id";

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>

<head>

<title>Attendance Report</title>

<style>

body{
    font-family:Arial;
    background:#f2f2f2;
}

table{
    width:90%;
    margin:40px auto;
    border-collapse:collapse;
    background:white;
}

th,td{
    border:1px solid black;
    padding:10px;
    text-align:center;
}

th{
    background:#007BFF;
    color:white;
}

h2{
    text-align:center;
}

</style>

</head>

<body>

<h2>Attendance Report</h2>

<table>

<tr>

<th>ID</th>
<th>Name</th>
<th>Roll Number</th>
<th>Date</th>
<th>Status</th>

</tr>

<?php

while($row=mysqli_fetch_assoc($result))
{
?>

<tr>

<td><?php echo $row['id']; ?></td>
<td><?php echo $row['name']; ?></td>
<td><?php echo $row['roll_no']; ?></td>
<td><?php echo $row['date']; ?></td>
<td><?php echo $row['status']; ?></td>

</tr>

<?php
}
?>

</table>

</body>

</html>