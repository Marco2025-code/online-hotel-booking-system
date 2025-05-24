<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
</head>
<body>
    <h2>Admin Registration Form</h2>
    <form action="process.php" method="POST">
        <label for="fname">First Name:</label>
        <input type="text" name="fname" required><br><br>

        <label for="lname">Last Name:</label>
        <input type="text" name="lname" required><br><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br><br>

        <label for="phone">Phone:</label>
        <input type="text" name="phone" required><br><br>

        <label for="residence">Residence:</label>
        <input type="text" name="residence" required><br><br>

        <button type="submit">Register</button>
    </form>
</body>
</html>
<?php include 'footer.php'; ?>