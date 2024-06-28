<!-- admin_add_project.php -->
<?php
session_start();
// Masukkan koneksi ke database di sini

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: admin_login.php');
    exit;
}

// Proses jika form telah disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    // Proses upload gambar dan simpan ke direktori

    // Simpan data ke database
    $sql = "INSERT INTO projects (title, description, image) VALUES ('$title', '$description', '$image_path')";
    mysqli_query($connection, $sql);
    header('Location: admin_dashboard.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Proyek Baru</title>
</head>
<body>
    <h2>Tambah Proyek Baru</h2>
    <form method="post" action="" enctype="multipart/form-data">
        <label>Judul:</label><br>
        <input type="text" name="title" required><br><br>
        <label>Deskripsi:</label><br>
        <textarea name="description" rows="5" required></textarea><br><br>
        <label>Gambar:</label><br>
        <input type="file" name="image" accept="image/*" required><br><br>
        <input type="submit" value="Simpan">
    </form>
    <br>
    <a href="admin_dashboard.php">Kembali ke Dashboard</a>
</body>
</html>
