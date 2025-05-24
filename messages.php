<?php
include 'db.php';
include 'header.php';

$result = mysqli_query($conn, "SELECT * FROM messages ORDER BY sent_at DESC");
?>

<h2>Contact Messages</h2>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Subject</th>
        <th>Message</th>
        <th>Sent At</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['subject']; ?></td>
            <td><?php echo $row['message']; ?></td>
            <td><?php echo $row['sent_at']; ?></td>
        </tr>
    <?php } ?>
</table>

<?php include 'footer.php'; ?>
