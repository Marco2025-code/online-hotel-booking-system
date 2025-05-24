<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $subject = mysqli_real_escape_string($conn, $_POST['subject']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    $query = "INSERT INTO messages (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Message Sent Successfully!'); window.location.href='contact.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<?php include 'header.php'; ?>

<h2>Contact Us</h2>
<p style="text-align: center; margin-bottom: 20px;">If you have any questions, feel free to reach out to us using the form below.</p>

<form action="contact.php" method="POST">
    <label for="name">Your Name:</label>
    <input type="text" name="name" required placeholder="Enter your name">

    <label for="email">Your Email:</label>
    <input type="email" name="email" required placeholder="Enter your email">

    <label for="subject">Subject:</label>
    <input type="text" name="subject" required placeholder="Subject">

    <label for="message">Message:</label>
    <textarea name="message" required placeholder="Write your message here"></textarea>

    <input type="submit" value="Send Message">
</form>

<?php include 'footer.php'; ?>
