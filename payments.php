<?php
include 'db.php';

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $reservation_id = $_POST["reservation_id"];
    $amount = $_POST["amount"];
    $payment_date = $_POST["payment_date"];
    $payment_status = $_POST["payment_status"];

    $sql = "INSERT INTO payments (reservation_id, amount, payment_date, payment_status) VALUES ('$reservation_id', '$amount', '$payment_date', '$payment_status')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
<?php include 'header.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Payments Form</title>
</head>
<body>

<h2>Enter Payment Details</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    Reservation ID: <input type="text" name="reservation_id"><br><br>
    Amount: <input type="text" name="amount"><br><br>
    Payment Date: <input type="date" name="payment_date"><br><br>
    Payment Status: <input type="text" name="payment_status"><br><br>
    <input type="submit" value="Submit">
</form>

</body>
</html>

<?php include 'footer.php'; ?> 
