<?php
session_start();
include "admingilang/koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];

$stmt = $db_link->prepare("SELECT id, username, password, verified FROM user_verification WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->store_result();

// Cek apakah user ditemukan
if ($stmt->num_rows > 0) {
    // Bind hasil query ke variabel
    $stmt->bind_result($id, $username_db, $hashed_password, $verified);
    $stmt->fetch();

    // Verifikasi password
    if (password_verify($password, $hashed_password)) {
        if ($verified == 1) {
            // Set session untuk user yang berhasil login
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username_db; // Gunakan username dari database untuk session
            $_SESSION['user_id'] = $id;  // Pastikan id user disimpan ke session

            // Redirect ke halaman index
            header('Location: index.php');
            exit;
        } else {
            // Jika akun belum diverifikasi
            $error = "Akun Anda belum diverifikasi oleh admin.";
            header("Location: login.php?error=" . urlencode($error));
            exit();
        }
    } else {
        // Jika password salah
        $error = "Password yang Anda masukkan salah!";
        header("Location: login.php?error=" . urlencode($error));
        exit();
    }
} else {
    // Jika username tidak ditemukan
    $error = "Username tidak ditemukan!";
    header("Location: login.php?error=" . urlencode($error));
    exit();
}

$stmt->close();
$db_link->close();
?>
