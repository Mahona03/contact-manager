<?php
include 'db.php';

$id = $_GET['id'];

$conn->query("DELETE FROM contacts WHERE id=$id");

$_SESSION['success'] = "Contact deleted successfully!";
header('Location: index.php');
exit();
?>
