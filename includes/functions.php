<?php
function check_login() {
    if (!isset($_SESSION['user_id'])) {
        header("Location: /madani_kinerja_digital/auth/login.php");
        exit();
    }
}

function is_admin() {
    return isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin';
}
?>