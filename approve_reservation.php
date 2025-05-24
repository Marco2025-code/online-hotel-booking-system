<?php
include 'db.php'; // Ensure the correct database connection file is included

if (isset($_GET['customer_id'])
&& !empty($_GET['customer_id'])) {
    $customer_id = $_GET['customer_id']; // Get reservation ID from URL

    // Check if reservation exists
    $checkQuery = mysqli_query($conn, "SELECT * FROM reservations WHERE id='$customer_id'");
   
    if (mysqli_num_rows($checkQuery) == 0){
        die("<script>alert('customer ID is Not found in reservations table.');
        windows.history.back();
        </script>");
    }
    
        // Update reservation status to "Approved"
    $query = "UPDATE reservations SET status='confirmed' WHERE id='$customer_id'";

    if (mysqli_query($conn, $query)) {
            echo "<script>alert('Reservation approved!'); window.location.href='admin_dashboard.php';</script>";
        } else {
            echo "<script>alert('Error: Could not approve reservation.');</script>";
     }
   
} else {
    echo "<script>alert('Invalid request.'); window.location.href='admin_dashboard.php';</script>";
}
?>