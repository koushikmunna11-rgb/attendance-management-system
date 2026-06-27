<?php
include("db/connection.php");

if(isset($_POST['login']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0)
    {
        header("Location: dashboard.php");
        exit();
    }
    else
    {
        echo "<script>alert('Invalid Username or Password');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="css/style.css">
    <title>Student Attendance System</title>
</head>

<body>
<body>

<div class="login-container">

    <div class="login-box">

        <div class="login-icon">
            <i class="fa-solid fa-user-graduate"></i>
        </div>

        <h2>Student Attendance System</h2>
        <p>Welcome Back Admin 👋</p>

        <form method="POST">

            <div class="input-group">
                <span><i class="fa-solid fa-user"></i></span>
                <input type="text" name="username" placeholder="Username" required>
            </div>

            <div class="input-group">
                <span><i class="fa-solid fa-lock"></i></span>
                <input type="password" name="password" placeholder="Password" required>
            </div>

            <button type="submit" name="login" class="login-btn">
                Login
            </button>

        </form>

    </div>

</div>

</body>

</body>
</html>