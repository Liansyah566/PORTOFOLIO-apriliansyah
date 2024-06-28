<!-- admin_edit_project.php -->
<?php
session_start();
// Masukkan koneksi ke database di sini

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: admin_login.php');
    exit;
}

// Ambil ID proyek dari parameter URL
$id = $_GET['id'];

// Ambil data proyek berdasarkan ID
$sql = "SELECT * FROM projects WHERE id = $id";
$result = mysqli_query($connection, $sql);
$project = mysqli_fetch_assoc($result);

// Proses jika form telah disubmit untuk update
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    // Proses update data ke database
    $sql = "UPDATE projects SET title = '$title', description = '$description' WHERE id = $id";
    mysqli_query($connection, $sql);
    header('Location: admin_dashboard.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Proyek</title>
</head>
<body>
    <h2>Edit Proyek</h2>
    <form method="post" action="">
        <label>Judul:</label><br>
        <input type="text" name="title" value="<?php echo $project['title']; ?>" required><br><br>
        <label>Deskripsi:</label><br>
        <textarea name="description" rows="5" required><?php echo $project['description']; ?></textarea><br><br>
        <input type="submit" value="Simpan Perubahan">
    </form>
    <br>
    <a href="admin_dashboard.php">Kembali ke Dashboard</a>
</body>
</html>
