<?php
include("db/connection.php");

if(isset($_GET['id']))
{
    $id = $_GET['id'];

    mysqli_query($conn,"DELETE FROM attendance WHERE student_id='$id'");

    mysqli_query($conn,"DELETE FROM students WHERE id='$id'");

    echo "<script>
    alert('Student Deleted Successfully');
    window.location='view_students.php';
    </script>";
}
else
{
    header("Location:view_students.php");
}
?>