<?php
include("db/connection.php");

$query="SELECT * FROM students";
$result=mysqli_query($conn,$query);
?>

<!DOCTYPE html>

<html>

<head>

<title>View Students</title>

<style>

body{
font-family:Arial;
background:#f4f6f9;
}

table{
width:90%;
margin:30px auto;
border-collapse:collapse;
background:white;
}

th,td{
padding:12px;
border:1px solid #ddd;
text-align:center;
}

th{
background:#007BFF;
color:white;
}

a{
text-decoration:none;
padding:6px 12px;
border-radius:5px;
color:white;
}

.edit{
background:green;
}

.delete{
background:red;
}

</style>

</head>

<body>

<h2 align="center">Student List</h2>

<table>

<tr>

<th>ID</th>
<th>Name</th>
<th>Roll Number</th>
<th>Department</th>
<th>Edit</th>
<th>Delete</th>

</tr>

<?php

$serial = 1;

while($row = mysqli_fetch_assoc($result))
{
?>
<tr>
<td><?php echo $serial++; ?></td>
<td><?php echo $row['name']; ?></td>
<td><?php echo $row['roll_no']; ?></td>
<td><?php echo $row['department']; ?></td>

<td>
<a class="edit"
href="edit_student.php?id=<?php echo $row['id']; ?>">
Edit
</a>
</td>

<td>
<a class="delete"
href="delete_student.php?id=<?php echo $row['id']; ?>">
Delete
</a>
</td>

</tr>

<?php
}
?>

</table>

</body>

</html>