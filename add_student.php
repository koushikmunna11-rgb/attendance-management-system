<?php
include("db/connection.php");

if(isset($_POST['save']))
{
    $name=$_POST['name'];
    $roll=$_POST['roll'];
    $department=$_POST['department'];

    $query="INSERT INTO students(name,roll_no,department)
            VALUES('$name','$roll','$department')";

    if(mysqli_query($conn,$query))
    {
        echo "<script>alert('Student Added Successfully');</script>";
    }
    else
    {
        echo "<script>alert('Error');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Student</title>
<link rel="stylesheet" href="css/style.css">
</head>

<body>

<div class="login-box">

<h2>Add Student</h2>

<form method="POST">

<input type="text" name="name" placeholder="Student Name" required>

<br><br>

<input type="text" name="roll" placeholder="Roll Number" required>

<br><br>

<input type="text" name="department" placeholder="Department" required>

<br><br>

<button type="submit" name="save">Save Student</button>

</form>

</div>

</body>
</html>