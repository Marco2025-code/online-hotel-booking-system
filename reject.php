<?php

include 'db.php';

if (isset($_GET['customer_id'])) {
    $customer_id = $_GET['customer_id'];
    $query = "UPDATE reservations SET status='Rejected' WHERE id='$customer_id'";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Reservation Rejected!');
        window.location.href='admin_dashboard.php';
        </script>";
    } else{
        echo "<script>alert('Error: could not reject reservation.');
        </script>";
    }
}
?>