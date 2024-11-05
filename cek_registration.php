<?php
session_start();
include "admingilang/koneksi.php";

$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$full_name = $_POST['full_name'];
$email = $_POST['email'];
$phone_number = $_POST['phone_number']; 
$verified = 0; 

// Cek apakah username sudah digunakan
$stmt = $db_link->prepare("SELECT username FROM user_verification WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    // Jika username sudah ada, simpan pesan error di session dan arahkan kembali
    $_SESSION['error'] = "Username sudah digunakan, silakan pilih username lain.";
    header("Location: register.php");
    exit();
} else {
    // Jika username belum digunakan, lakukan proses registrasi
    $stmt = $db_link->prepare("INSERT INTO user_verification (username, password, email, full_name, phone_number, verified) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssi", $username, $password, $email, $full_name, $phone_number, $verified);
    $stmt->execute();

    $_SESSION['success'] = "Registrasi berhasil! Tunggu hingga akun Anda diverifikasi oleh admin.";
    header("Location: register.php");
    exit();
}

$stmt->close();
$db_link->close();
?>