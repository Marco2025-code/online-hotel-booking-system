<?php
include 'header.php';
include 'db.php';
session_start();
if (!isset($_SESSION['customer_id'])) {
    header("Location: login.php");
}
$customer_id = $_SESSION['customer_id'];
?>

<main>
    <h2>My Payments</h2>
    <table>
        <tr>
            <th>Payment ID</th>
            <th>Reservation ID</th>
            <th>Amount</th>
            <th>Date</th>
            <th>Status</th>
        </tr>
        <?php
        $result = mysqli_query($conn, "SELECT * FROM payments WHERE reservation_id IN 
            (SELECT id FROM reservations WHERE customer_id = '$customer_id')");

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['reservation_id']}</td>
                <td>\${$row['amount']}</td>
                <td>{$row['payment_date']}</td>
                <td>{$row['payment_status']}</td>
            </tr>";
        }
        ?>
    </table>
</main>

<?php include 'footer.php'; ?>
