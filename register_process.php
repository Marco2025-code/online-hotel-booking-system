<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $phone = $_POST['phone'];
    $country = $_POST['country'];
    $physical_address = $_POST['physical_address'];
    $dob = $_POST['dob'];
    $sex = $_POST['sex'];

    $sql = "INSERT INTO customers (fname, lname, email, password, phone, country, physical_address, dob, sex ) 
            VALUES ('$fname', '$lname', '$email', '$password', '$phone', '$country', '$physical_address', '$dob', '$sex')";
    if (mysqli_query($conn, $sql)) {
        header("Location: login.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
