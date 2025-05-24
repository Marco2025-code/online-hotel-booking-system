<?php include 'header.php'; ?>
<main>
    <h2>Register Customer</h2>
    <form action="register_process.php" method="post">
        <label for="fname">First Name:</label>
        <input type="text" name="fname" placeholder="First Name" required>
        <label for="lname">Last Name:</label>
        <input type="text" name="lname" placeholder="Last Name" required>
        <label for="email">Email:</label>
        <input type="email" name="email" placeholder="Email" required>
        <label for="password">Password:</label>
        <input type="password" name="password" placeholder="Password" required>
        <label for="phone">Phone:</label>
        <input type="tel" name="phone" placeholder="Your phone" required>
        <label for="country">Country:</label>
        <input type="text" name="country" placeholder="Your Coutry" required>
        <label for="address">Physical Address:</label>
        <input type="text" name="physical_address" placeholder="Your Resident" required>
        <label for="dob">Date of Birth:</label>
        <input type="date" name="dob" required>
        <label for="sex">Gender:</label>
        <select name="sex" require>
            <option value="">Select Gender</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
        </select>
        <input type="submit" value="Register">
    </form>
</main>
<?php include 'footer.php'; ?>
