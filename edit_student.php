<?php
include("db/connection.php");

$id = $_GET['id'];

$query = "SELECT * FROM students WHERE id='$id'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

if(isset($_POST['update']))
{
    $name = $_POST['name'];
    $roll = $_POST['roll'];
    $department = $_POST['department'];

    $update = "UPDATE students
               SET name='$name',
                   roll_no='$roll',
                   department='$department'
               WHERE id='$id'";

    if(mysqli_query($conn, $update))
    {
        echo "<script>
        alert('Student Updated Successfully');
        window.location='view_students.php';
        </script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Edit Student</title>

<link rel="stylesheet" href="css/style.css">

</head>

<body>

<div class="login-box">

<h2>Edit Student</h2>

<form method="POST">

<input
type="text"
name="name"
value="<?php echo $row['name']; ?>"
required>

<br><br>

<input
type="text"
name="roll"
value="<?php echo $row['roll_no']; ?>"
required>

<br><br>

<input
type="text"
name="department"
value="<?php echo $row['department']; ?>"
required>

<br><br>

<button
type="submit"
name="update">
Update Student
</button>

</form>

</div>

</body>
</html>