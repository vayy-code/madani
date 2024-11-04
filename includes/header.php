<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Madani Kinerja Digital</title>
    <?php
// Ambil protokol dan nama server
$base_url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME'] . '/madani_kinerja_digital/';

// Panggil CSS dengan base URL
echo '<link rel="stylesheet" href="' . $base_url . 'assets/css/style.css?v=' . time() . '">';

?>

</head>
<body>
    <header>
        <nav>
            <div class="logo">
                <img src="assets/images/logo.png" width="35px" alt="Madani Kinerja Digital">
                <p>Madani Kinerja Digital</p>
            </div>
            <ul>
                <?php if (!isset($_SESSION['user_id'])): ?>
                    <li><a href=<?php echo $base_url ."auth/login.php"?>>Login</a></li>
                    <li><a href=<?php echo $base_url ."auth/register.php"?>>Register</a></li>
                <?php else: ?>
                    <li><a href=<?php echo $base_url ."admin/dashboard.php"?>>Dashboard</a></li>
                    <li><a href=<?php echo $base_url ."auth/logout.php"?>>Logout</a></li>
                <?php endif; ?>
                <li><a href=<?php echo $base_url ."help_support.php"?>>Help & Support</a></li>
            </ul>
        </nav>
    </header>