<!-- admin_delete_project.php -->
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

// Hapus proyek dari database
$sql = "DELETE FROM projects WHERE id = $id";
mysqli_query($connection, $sql);

header('Location: admin_dashboard.php');
exit;
?>
