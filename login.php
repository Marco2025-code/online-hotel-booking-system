<?php include 'header.php'; ?>
<main>
    <h2>Login</h2>
    <form action="login_process.php" method="post">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" value="Login">
    </form>
</main>
<?php include 'footer.php'; ?>
