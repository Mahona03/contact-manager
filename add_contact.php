<?php
include 'db.php';
include 'includes/header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name  = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $photo = "";
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
        $photo = basename($_FILES['photo']['name']);
        move_uploaded_file($_FILES['photo']['tmp_name'], "uploads/" . $photo);
    }

    $sql = "INSERT INTO contacts (name, email, phone, photo) VALUES ('$name', '$email', '$phone', '$photo')";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['success'] = "Contact added successfully!";
        header('Location: index.php');
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<h2>Add New Contact</h2>
<form method="POST" enctype="multipart/form-data">
    <input type="text" name="name" placeholder="Name" required><br><br>
    <input type="email" name="email" placeholder="Email" required><br><br>
    <input type="text" name="phone" placeholder="Phone" required><br><br>
    <input type="file" name="photo"><br><br>
    <button type="submit" class="btn">Save Contact</button>
</form>

<?php include 'includes/footer.php'; ?>
