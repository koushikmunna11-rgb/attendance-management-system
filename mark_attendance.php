<?php
include("db/connection.php");

if(isset($_POST['save']))
{
    $date = $_POST['date'];

    foreach($_POST['status'] as $student_id => $status)
    {
        // Check if attendance already exists
        $check = mysqli_query($conn,
        "SELECT * FROM attendance
        WHERE student_id='$student_id'
        AND date='$date'");

        if(mysqli_num_rows($check) == 0)
        {
            mysqli_query($conn,
            "INSERT INTO attendance(student_id,date,status)
            VALUES('$student_id','$date','$status')");
        }
    }

    echo "<script>
    alert('Attendance Saved Successfully');
    window.location='attendance_report.php';
    </script>";
}

$students = mysqli_query($conn,"SELECT * FROM students");
?>
<!DOCTYPE html>
<html>

<head>

<title>Mark Attendance</title>

<link rel="stylesheet" href="css/style.css">

<style>

body{
    background:#f4f6f9;
    font-family:Arial;
}

.container{
    width:90%;
    margin:30px auto;
}

h2{
    text-align:center;
    margin-bottom:20px;
}

table{
    width:100%;
    border-collapse:collapse;
    background:white;
    box-shadow:0 0 10px rgba(0,0,0,.2);
}

th{
    background:#2563eb;
    color:white;
    padding:15px;
}

td{
    text-align:center;
    padding:12px;
    border-bottom:1px solid #ddd;
}

input[type=date]{
    padding:10px;
    width:200px;
}

button{
    background:#2563eb;
    color:white;
    border:none;
    padding:12px 25px;
    cursor:pointer;
    border-radius:6px;
    font-size:16px;
}

button:hover{
    background:#1d4ed8;
}

</style>

</head>

<body>

<div class="container">

<h2>Mark Attendance</h2>

<form method="POST">

<p>

<b>Select Date :</b>

<input
type="date"
name="date"
required>

</p>

<table>

<tr>

<th>Roll No</th>

<th>Name</th>

<th>Department</th>

<th>Present</th>

<th>Absent</th>

</tr>

<?php

while($row=mysqli_fetch_assoc($students))
{

?>

<tr>

<td>

<?php echo $row['roll_no']; ?>

</td>

<td>

<?php echo $row['name']; ?>

</td>

<td>

<?php echo $row['department']; ?>

</td>

<td>

<input
type="radio"
name="status[<?php echo $row['id']; ?>]"
value="Present"
required>

</td>

<td>

<input
type="radio"
name="status[<?php echo $row['id']; ?>]"
value="Absent">

</td>

</tr>

<?php

}

?>

</table>

<br>

<center>

<button
type="submit"
name="save">

Save Attendance

</button>

</center>

</form>

</div>

</body>

</html>