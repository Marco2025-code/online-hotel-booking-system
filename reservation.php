<?php include 'header.php'; ?>
<?php include 'db.php'; ?>
<main>
    <h2>Make a Reservation</h2>
    <form action="reservation_process.php" METHOD="POST">
        <!-- Customer Selection -->
        <label for="customer_id">Select Customer:</label>
        <select name="customer_id" required>
            <?php
            $customers_result = mysqli_query($conn, "SELECT * FROM customers");
            if (!$customers_result){
                die("error fetching customers:  " . mysqli_error($conn));
            }
            while ($customer = mysqli_fetch_assoc($customers_result)) {
                echo "<option value='{$customer['id']}'>{$customer['name']} ({$customer['email']})</option>";
            }
            ?>
        </select>
        <!-- Room Selection -->
        <label for="room_id">Select Room:</label>
        <select name="room_id" required>
            <?php
            $rooms_result = mysqli_query($conn, "SELECT * FROM rooms WHERE status = 'Available'");
            if (!$rooms_result ){
                die("error fetching rooms:  " . mysqli_error($conn));
            }
            while ($room = mysqli_fetch_assoc($rooms_result)) {
                echo "<option value='{$room['id']}'>Room {$room['room_number']} - {$room['price']} USD</option>";
            }
            ?>
        </select>
        <!-- Reservation Date -->
        <label for="res_date">Reservation Date:</label>
        <input type="date" name="res_date" required>

        <!-- check-in date -->
        <label for="check_in">Check-in Date:</label>
        <input type="date" name="check_in" required>

         <!-- check-in date -->
         <label for="check_out">Check-out Date:</label>
        <input type="date" name="check_out" required>

        <!-- Submit Button -->
        <input type="submit" value="Reserve">
    </form>
</main>
<?php include 'footer.php'; ?>

