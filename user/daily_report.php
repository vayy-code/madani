<?php
session_start();
include '../includes/config.php';
include '../includes/functions.php';
check_login();
include '../includes/header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user_id'];
    $activity_description = $_POST['activity_description'];
    $teaching_hours = $_POST['teaching_hours'];
    $teaching_method = $_POST['teaching_method'];

    // Handle file upload
    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($_FILES["activity_photo"]["name"]);
    move_uploaded_file($_FILES["activity_photo"]["tmp_name"], $target_file);

    $query = "INSERT INTO daily_reports (user_id, activity_description, teaching_hours, teaching_method, activity_photo) 
              VALUES ('$user_id', '$activity_description', '$teaching_hours', '$teaching_method', '$target_file')";
    
    if (mysqli_query($conn, $query)) {
        $success = "Laporan berhasil disimpan.";
    } else {
        $error = "Gagal menyimpan laporan. Silakan coba lagi.";
    }
}
?>

<main>
   <div style="margin-block: 5rem;"> <h2>Laporan Harian Guru</h2>
    <?php 
    if (isset($success)) echo "<p class='success'>$success</p>";
    if (isset($error)) echo "<p class='error'>$error</p>";
    ?>
    <div class="container">
    <form method="POST" enctype="multipart/form-data">

        <label for="activity_photo">Foto Kegiatan:</label>
        <input type="file" id="activity_photo" name="activity_photo" accept="image/*" required>

        <label for="activity_description">Keterangan Kegiatan:</label>
        <textarea id="activity_description" name="activity_description" required></textarea>

        <label for="teaching_hours">Durasi Mengajar (jam):</label>
        <input type="number" id="teaching_hours" name="teaching_hours" required>

        <label for="teaching_method">Metode Pembelajaran:</label>
        <input type="text" id="teaching_method" name="teaching_method" required>

        <button type="submit">Simpan Laporan</button>
    </form>
    </div></div>
</main>

<?php include '../includes/footer.php'; ?>

