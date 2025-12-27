<?php
include 'db.php';
include 'includes/header.php';

$id = $_GET['id'];
$sql = "SELECT * FROM contacts WHERE id=$id";
$result = $conn->query($sql);
$contact = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name  = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $photo = $contact['photo'];
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
        $photo = basename($_FILES['photo']['name']);
        move_uploaded_file($_FILES['photo']['tmp_name'], "uploads/" . $photo);
    }

    $update = "UPDATE contacts SET name='$name', email='$email', phone='$phone', photo='$photo' WHERE id=$id";

    if ($conn->query($update) === TRUE) {
        $_SESSION['success'] = "Contact updated successfully!";
        header('Location: index.php');
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<h2>Edit Contact</h2>
<form method="POST" enctype="multipart/form-data">
    <input type="text" name="name" value="<?php echo $contact['name']; ?>" required><br><br>
    <input type="email" name="email" value="<?php echo $contact['email']; ?>" required><br><br>
    <input type="text" name="phone" value="<?php echo $contact['phone']; ?>" required><br><br>
    <input type="file" name="photo"><br><br>
    <button type="submit" class="btn">Update Contact</button>
</form>

<?php include 'includes/footer.php'; ?>
