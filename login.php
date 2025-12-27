<?php
include('header.php');  // Include Header
session_start();
require('db.php');

if (isset($_POST['login'])) {
    $email    = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header('Location: index.php');
    } else {
        $error = "Invalid Email or Password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <?php if(isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <?php if(isset($_SESSION['success'])) { echo "<p style='color:green;'>".$_SESSION['success']."</p>"; unset($_SESSION['success']); } ?>
    <form method="post">
        <input type="email" name="email" required placeholder="Email"><br><br>
        <input type="password" name="password" required placeholder="Password"><br><br>
        <button type="submit" name="login">Login</button>
    </form>
    <p><a href="forgot_password.php">Forgot Password?</a></p>
    <p>Don't have an account? <a href="register.php">Register here</a></p>
</body>

<?php include('footer.php');  // Include Footer ?>
