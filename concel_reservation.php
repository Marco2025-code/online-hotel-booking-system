<?php
include 'db.php'; // Ensure database connection is included

if (isset($_GET['customer_id']) && !empty($_GET['customer_id'])) {
    $customer_id = $_GET['customer_id']; // Get reservation ID from URL

    // Check if customer_id exists in the reservation table 
    $checkQuery = mysqli_query($conn, "SELECT * FROM reservations WHERE id='$customer_id'");
    
    if (mysqli_num_rows($checkQuery) == 0){
        die("<script>alert('customer ID is Not found in reservations table.');
        windows.history.back();
        </script>");
    }

    if (mysqli_num_rows($checkQuery) > 0) {
        // Update status to "Cancelled"
        $query = "UPDATE reservations SET status='Cancelled' WHERE id='$customer_id'";
        
        if (mysqli_query($conn, $query)) {
            echo "<script>alert('Reservation Cancelled!'); window.location.href='admin_dashboard.php';</script>";
        } else {
            echo "<script>alert('Error: cancelliing reservation.');</script>";
        }
    } else {
        echo "<script>alert('Error: Reservation not found.');</script>";
    }
} else {
    echo "<script>alert('Invalid request.'); window.location.href='admin_dashboard.php';</script>";
}
?>
