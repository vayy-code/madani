<?php
session_start();
include '../includes/config.php';
include '../includes/header.php';

// Query untuk mengambil semua laporan
$query = "SELECT id, user_id, activity_photo, activity_description, teaching_hours, teaching_method, created_at FROM daily_reports ORDER BY created_at DESC";
$result = mysqli_query($conn, $query);

// Inisialisasi variabel penghitung
$no = 1;
?>

<main>
   <div>
   <h2>Daftar Laporan Harian Guru</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>User ID</th>
                <th>Foto Kegiatan</th>
                <th>Keterangan Kegiatan</th>
                <th>Jam Pelajaran</th>
                <th>Metode Pembelajaran</th>
                <th>Dibuat Pada</th>
                <th>Detail</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $row['user_id']; ?></td>
                <td><img src="<?php echo $row['activity_photo']; ?>" alt="Foto Kegiatan" width="100"></td>
                <td><?php echo $row['activity_description']; ?></td>
                <td><?php echo $row['teaching_hours']; ?></td>
                <td><?php echo $row['teaching_method']; ?></td>
                <td><?php echo $row['created_at']; ?></td>
                <td><a class="button" href="detail.php?id=<?php echo $row['id']; ?>">Lihat Detail</a></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
   </div>
</main>

<?php include '../includes/footer.php'; ?>
