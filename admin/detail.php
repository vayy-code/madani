<?php
session_start();
include '../includes/config.php';
include '../includes/header.php';

// Ambil ID laporan dari parameter URL
$id = $_GET['id'];

// Query untuk mengambil detail laporan berdasarkan ID
$query = "SELECT * FROM daily_reports WHERE id = $id";
$result = mysqli_query($conn, $query);
$report = mysqli_fetch_assoc($result);
?>

<main>
    <div style="margin-block:5rem">
    <h2>Detail Laporan Harian Guru</h2>
    <table>
        <tr>
            <th>ID:</th>
            <td><?php echo $report['id']; ?></td>
        </tr>
        <tr>
            <th>User ID:</th>
            <td><?php echo $report['user_id']; ?></td>
        </tr>
        <tr>
            <th>Foto Kegiatan:</th>
            <td><img src="<?php echo $report['activity_photo']; ?>" alt="Foto Kegiatan" width="200"></td>
        </tr>
        <tr>
            <th>Keterangan Kegiatan:</th>
            <td><?php echo $report['activity_description']; ?></td>
        </tr>
        <tr>
            <th>Jam Pelajaran:</th>
            <td><?php echo $report['teaching_hours']; ?></td>
        </tr>
        <tr>
            <th>Metode Pembelajaran:</th>
            <td><?php echo $report['teaching_method']; ?></td>
        </tr>
        <tr>
            <th>Dibuat Pada:</th>
            <td><?php echo $report['created_at']; ?></td>
        </tr>
    </table>
    <a class="button" href="rekap.php">Kembali ke Daftar Laporan</a>
    </div>
</main>

<?php include '../includes/footer.php'; ?>
