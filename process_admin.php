<?php
include 'header.php';
include 'db.php';

// Process Form Submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Hashing the password
    $phone = $_POST["phone"];
    $residence = $_POST["residence"];

    // Insert Query
    $sql = "INSERT INTO admin (fname, lname, email, password, phone, residence) 
            VALUES (?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $fname, $lname, $email, $password, $phone, $residence);

    if ($stmt->execute()) {
        echo "Admin registered successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
