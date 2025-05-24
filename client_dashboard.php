<?php
include 'header.php';
include 'db.php';
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
}
$user_id = $_SESSION['user_id'];
?>

<main>
    <h2>My Reservations</h2>
    <table>
        <tr>
            <th>Reservation ID</th>
            <th>Room</th>
            <th>Date</th>
            <th>Status</th>
            <th>Check-in</th>
            <th>Check-out</th>
        </tr>
        <?php
        $result = mysqli_query($conn, "SELECT reservations.id, rooms.room_number, reservations.res_date, reservations.status, reservations.check_in, reservations.check_out FROM reservations 
            JOIN rooms ON reservations.room_id = rooms.id 
            WHERE reservations.customer_id = '$user_id'");

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                <td>{$row['id']}</td>
                <td>Room {$row['room_number']}</td>
                <td>{$row['res_date']}</td>
                <td>{$row['status']}</td>
                <td>{$row['check_in']}</td>
                <td>{$row['check_out']}</td>
            </tr>";
        }
        ?>
    </table>
</main>

<?php include 'footer.php'; ?>
