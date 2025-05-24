<?php
include 'header.php'; 
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customer_id = $_POST['customer_id'];
    $room_id = $_POST['room_id'];
    $res_date = $_POST['res_date'];
    $check_in = $_POST['check_in'];
    $check_out = $_POST['check_out'];


    // Insert reservation into the database
    $query = "INSERT INTO reservations (customer_id, room_id, res_date, status, check_in, check_out) 
              VALUES ('$customer_id', '$room_id', '$res_date', 'Pending', '$check_in', $check_out' )";

    if (mysqli_query($conn, $query)) {
        // Mark the room as reserved (Unavailable)
        mysqli_query($conn, "UPDATE rooms SET status = 'Reserved' WHERE id = '$room_id'");

        // Redirect with success message
        header("Location: reservation.php?success=Reservation successful!");
        exit();
    } else {
        // Redirect with error message
        header("Location: reservation.php?error=Failed to make reservation.");
        exit();
    }
} else {
    // Redirect if accessed without POST request
    header("Location: reservation.php");
    exit();
}
?>
<?php include 'footer.php'; ?>

