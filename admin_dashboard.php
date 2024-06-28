<!-- admin_dashboard.php -->
<?php
session_start();
// Masukkan koneksi ke database di sini

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: admin_login.php');
    exit;
}

// Ambil daftar proyek dari database
$sql = "SELECT * FROM projects ORDER BY created_at DESC";
$result = mysqli_query($connection, $sql);
$projects = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
</head>
<body>
    <h2>Admin Dashboard</h2>
    <a href="admin_add_project.php">Tambah Proyek Baru</a>
    <br><br>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Gambar</th>
                <th>Tanggal Dibuat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($projects as $project) { ?>
                <tr>
                    <td><?php echo $project['id']; ?></td>
                    <td><?php echo $project['title']; ?></td>
                    <td><?php echo $project['description']; ?></td>
                    <td><?php echo $project['image']; ?></td>
                    <td><?php echo $project['created_at']; ?></td>
                    <td>
                        <a href="admin_edit_project.php?id=<?php echo $project['id']; ?>">Edit</a> |
                        <a href="admin_delete_project.php?id=<?php echo $project['id']; ?>">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <br>
    <a href="admin_logout.php">Logout</a>
</body>
</html>
