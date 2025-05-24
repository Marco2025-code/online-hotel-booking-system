<?php
include 'header.php';
include 'db.php';

// Fetch room classes
$classes = mysqli_query($conn, "SELECT * FROM room_classes");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $room_number = $_POST['room_number'];
    $class_id = $_POST['class_id'];
    $price = $_POST['price'];
    $status = $_POST['status'];

    $query = "INSERT INTO rooms (room_number, class_id, price, status) 
              VALUES ('$room_number', '$class_id', '$price', '$status')";
    
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Room added successfully!'); window.location='admin_dashboard.php';</script>";
    } else {
        echo "<script>alert('Error adding room!');</script>";
    }
}
?>

<main>
    <h2>Add a New Room</h2>
    <form action="" method="post">
        <label>Room Number:</label>
        <input type="text" name="room_number" required><br>

        <label>Room Class:</label>
        <select name="class_id" required>
            <?php while ($class = mysqli_fetch_assoc($classes)) { ?>
                <option value="<?php echo $class['id']; ?>"><?php echo $class['class_name']; ?></option>
            <?php } ?>
        </select><br>

        <label>Price:</label>
        <input type="number" name="price" required><br>

        <label>Status:</label>
        <select name="status">
            <option value="Available">Available</option>
            <option value="Booked">Booked</option>
        </select><br>

        <input type="submit" value="Add Room">
    </form>
</main>

<?php include 'footer.php'; ?>
