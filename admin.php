<!-- admin_login.php -->
<?php
session_start();
// Masukkan koneksi ke database di sini

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Periksa apakah username dan password sesuai dengan yang diinginkan (misalnya dari database)
    if ($username == 'admin' && $password == '00000000') {
        $_SESSION['loggedin'] = true;
        header('Location: admin_dashboard.php');
        exit;
    } else {
        $error_message = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
</head>
<body>
    <h2>Admin Login</h2>
    <?php if (isset($error_message)) { ?>
        <p><?php echo $error_message; ?></p>
    <?php } ?>
    <form method="post" action="">
        <label>Username:</label><br>
        <input type="text" name="username" required><br><br>
        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>
