<?php
include('header.php');  // Include Header
session_start();
require('db.php');

if (isset($_POST['forgot'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    
    $query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['reset_email'] = $email;
        header('Location: reset_password.php');
    } else {
        $error = "Email not found.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Forgot Password</title>
</head>
<body>
    <h2>Forgot Password</h2>
    <?php if(isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="post">
        <input type="email" name="email" required placeholder="Enter your registered Email"><br><br>
        <button type="submit" name="forgot">Next</button>
    </form>
    <p><a href="login.php">Back to Login</a></p>
</body>
</html>
<?php include('footer.php');  // Include Footer ?>