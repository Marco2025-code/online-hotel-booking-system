<?php
include 'db.php';
include 'header.php';
?>

<main>
    <h2>Admin Dashboard - Manage Reservations</h2>

    <?php
    // Fetch reservations from the database
    $query = "SELECT reservations.*, customers.fname, customers.lname, rooms.room_number
              FROM reservations 
              JOIN customers ON reservations.customer_id = customers.id 
              JOIN rooms ON reservations.room_id = rooms.id 
              ORDER BY reservations.res_date DESC";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("query failed: " . mysqli_error($conn));
    }
    ?>
    
    <table border="1" cellspacing="0" cellpadding="10">
        <tr>
            <th>Reservation ID</th>
            <th>Customer Name</th>
            <th>Room Number</th>
            <th>Reservation Date</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['fname'] ?></td>
                <td><?= $row['room_number'] ?></td>
                <td><?= $row['res_date'] ?></td>
                <td><?= $row['status'] ?></td>
                <td>
                    
                        <a href="approve_reservation.php?customer_id=<?= $row['id'] ?>" style="color:green;">Approve</a> | 
                        <a href="concel_reservation.php?customer_id=<?= $row['id'] ?>" style="color:red;">cancel</a>
                    
                </td>
            </tr>
        <?php } ?>
    </table>
</main>

<?php include 'footer.php'; ?>
