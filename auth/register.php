<?php
session_start();
include '../includes/config.php';
include '../includes/header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = $_POST['email'];
    $role = 'guru'; // Default role

    $query = "INSERT INTO users (full_name, username, password, email, role) VALUES ('$full_name','$username', '$password', '$email', '$role')";
    
    if (mysqli_query($conn, $query)) {
        header("Location: " . $base_url . "auth/login.php");
        exit();
    } else {
        $error = "Registration failed. Please try again.";
    }
}
?>

<main>
    <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
    <div class="container">
        <h2>Register</h2>
        <form action="register.php" method="post">
            <div class="form-group">
                <label for="full_name">Full Name</label>
                <input type="text" id="full_name" name="full_name" required>
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="btn-primary">Register</button>
        </form>
        <div class="additional-links">
            <a href="<?php echo $base_url; ?>auth/login.php">Already have an account? Login</a>
        </div>
    </div>
</main>

<?php include '../includes/footer.php'; ?>