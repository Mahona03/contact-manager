<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

include 'db.php';
include 'includes/header.php';

$search = "";
if (isset($_GET['search'])) {
    $search = $_GET['search'];
}

$sql = "SELECT * FROM contacts WHERE name LIKE '%$search%'";
$result = $conn->query($sql);
?>

<form method="GET" action="index.php">
    <input type="text" name="search" placeholder="Search contact..." value="<?php echo $search; ?>">
    <button type="submit">Search</button>
    <a href="index.php" class="btn btn-reset">Reset</a>
    <a href="export_excel.php" class="btn btn-export">Export to Excel</a>
    <a href="export_pdf.php" class="btn btn-pdf">Download PDF</a>

</form>

<table>
    <tr>
        <th>Photo</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Actions</th>
    </tr>
    <?php while($row = $result->fetch_assoc()) { ?>
    <tr>
        <td>
            <?php if ($row['photo']) { ?>
                <img src="uploads/<?php echo $row['photo']; ?>" width="50" height="50">
            <?php } else { echo "No Photo"; } ?>
        </td>
        <td><?php echo htmlspecialchars($row['name']); ?></td>
        <td><?php echo htmlspecialchars($row['email']); ?></td>
        <td><?php echo htmlspecialchars($row['phone']); ?></td>
        <td>
    <a href="edit_contact.php?id=<?php echo $row['id']; ?>" class="btn">Edit</a> 
    <a href="delete_contact.php?id=<?php echo $row['id']; ?>" class="btn btn-delete" onclick="return confirm('⚠️ WARNING: This contact will be permanently deleted! \n\nAre you sure you want to proceed?')">Delete</a>
</td>
    </tr>
    <?php } ?>
</table>

<?php include 'includes/footer.php'; ?>
