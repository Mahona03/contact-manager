<?php
include('header.php');  // Include Header
session_start();
require('db.php');

if (!isset($_SESSION['reset_email'])) {
    header('Location: forgot_password.php');
    exit;
}

if (isset($_POST['reset'])) {
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = $_SESSION['reset_email'];

    $query = "UPDATE users SET password='$password' WHERE email='$email'";
    if (mysqli_query($conn, $query)) {
        unset($_SESSION['reset_email']);
        $_SESSION['success'] = "Password reset successful. Please login.";
        header('Location: login.php');
    } else {
        $error = "Failed to reset password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Reset Password</title>
</head>
<body>
    <h2>Reset Password</h2>
    <?php if(isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="post">
        <input type="password" name="password" required placeholder="New Password"><br><br>
        <button type="submit" name="reset">Reset Password</button>
    </form>
</body>
</html>
<?php include('footer.php');  // Include Footer ?>