<?php
include('header.php');  // Include Header
require('db.php');

if (isset($_POST['register'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email    = mysqli_real_escape_string($conn, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
    if (mysqli_query($conn, $query)) {
        $_SESSION['success'] = "Registration successful. Please login.";
        header('Location: login.php');
    } else {
        $error = "Registration failed. Email might be already used.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register</title>
</head>
<body>
    <h2>Register</h2>
    <?php if(isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="post">
        <input type="text" name="username" required placeholder="Username"><br><br>
        <input type="email" name="email" required placeholder="Email"><br><br>
        <input type="password" name="password" required placeholder="Password"><br><br>
        <button type="submit" name="register">Register</button>
    </form>
    <p>Already have an account? <a href="login.php">Login here</a></p>
</body>
</html>
<?php include('footer.php');  // Include Footer ?>