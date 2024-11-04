<?php
session_start();
include '../includes/config.php';
include '../includes/functions.php';
check_login();
if (!is_admin()) {
    header("Location: /madani_kinerja_digital/user/daily_report.php");
    exit();
}
include '../includes/header.php';

$query = "SELECT u.full_name, COUNT(dr.id) as report_count 
          FROM users u 
          LEFT JOIN daily_reports dr ON u.id = dr.user_id 
          WHERE u.role = 'guru' 
          GROUP BY u.id";
$result = mysqli_query($conn, $query);
?>

<main>
    <div>
    <h2>Dashboard Admin</h2>
    <h3>Rekapitulasi Laporan Harian Guru</h3>
        <div class="table-container">
            <table class="styled-table">
                <thead>
                    <tr>
                        <th>Nama Guru</th>
                        <th>Jumlah Laporan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['full_name']); ?></td>
                        <td><?php echo htmlspecialchars($row['report_count']); ?></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>

        <a class="button" href="rekap.php">Lihat selengkapnya</a>
    </div>
</main>

<?php include '../includes/footer.php'; ?>