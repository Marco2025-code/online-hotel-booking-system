<?php include 'header.php'; ?>
<main>
    <h2>Admin Login</h2>
    <form action="admin_login_process.php" method="post">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" value="Login">
    </form>
</main>
<?php include 'footer.php'; ?>
