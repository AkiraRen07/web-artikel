<?php
session_start();
include "koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];

$stmt = $db_link->prepare("SELECT id, username, password FROM user_admin WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->store_result();

// Cek apakah user ditemukan
if ($stmt->num_rows > 0) {
    // Bind hasil query ke variabel
    $stmt->bind_result($id, $username_db, $hashed_password);
    $stmt->fetch();

    // Verifikasi password
    if (password_verify($password, $hashed_password)) {
        echo "Login berhasil! Selamat datang, " . htmlspecialchars($username_db) . "!";
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        
        // Redirect ke halaman index
        header('Location: dashboard.php');
        exit;
    } else {
        $error = "Password yang Anda masukkan salah!";
        header("Location: login.php?error=" . urlencode($error));
        exit();
    }
} else {
    $error = "Username tidak ditemukan!";
    header("Location: login.php?error=" . urlencode($error));
    exit();
}

$stmt->close();
$db_link->close();