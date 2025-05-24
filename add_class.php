<?php
include 'header.php';
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $class_name = $_POST['class_name'];

    // Insert new room class into the database
    $query = "INSERT INTO room_classes (class_name) VALUES ('$class_name')";
    
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Room class added successfully!'); window.location='admin_dashboard.php';</script>";
    } else {
        echo "<script>alert('Error adding class! Class name might already exist.');</script>";
    }
}
?>

<main>
    <h2>Add a New Room Class</h2>
    <form action="" method="post">
        <label>Class Name:</label>
        <input type="text" name="class_name" required><br>
        <input type="submit" value="Add Class">
    </form>
</main>

<?php include 'footer.php'; ?>
