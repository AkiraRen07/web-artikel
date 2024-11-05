<?php
session_start();
include "admingilang/koneksi.php";

// Cek apakah user sudah login
if (empty($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}

$user_id = $_SESSION['user_id'];

// Ambil data user dari database
$query = "SELECT full_name, phone_number, email, photo_profile FROM user_verification WHERE id = ?";
$stmt = $db_link->prepare($query);
$stmt->bind_param('i', $user_id);
$stmt->execute();
$stmt->bind_result($full_name, $phone_number, $email, $photo_profile);
$stmt->fetch();
$stmt->close();

// Proses update jika form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newFullName = $_POST['full_name'];
    $newPhoneNumber = $_POST['phone_number'];
    
    // Update data di database
    $updateQuery = "UPDATE user_verification SET full_name = ?, phone_number = ? WHERE id = ?";
    $stmt = $db_link->prepare($updateQuery);
    $stmt->bind_param('ssi', $newFullName, $newPhoneNumber, $user_id);

    if ($stmt->execute()) {
        // Jika update berhasil, set session untuk menandakan sukses
        $_SESSION['update_success'] = true;

        // Proses upload foto profil (jika ada)
        if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] === UPLOAD_ERR_OK) {
            $fileTmpPath = $_FILES['profile_picture']['tmp_name'];
            $fileName = $_FILES['profile_picture']['name'];
            $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

            // Validasi tipe file yang diperbolehkan
            $allowedTypes = ['jpg', 'jpeg', 'png'];
            if (in_array($fileExt, $allowedTypes)) {
                // Ganti nama file baru dengan user_id untuk membuatnya unik
                $newFileName = "user_id_" . $user_id . "." . $fileExt;
                $profileDir = "img/profile/";
                $destPath = $profileDir . $newFileName;

                // Pindahkan file yang diupload ke folder tujuan
                if (move_uploaded_file($fileTmpPath, $destPath)) {
                    // Simpan nama file di database
                    $updateQuery = "UPDATE user_verification SET photo_profile = ? WHERE id = ?";
                    $stmt = $db_link->prepare($updateQuery);
                    $stmt->bind_param('si', $newFileName, $user_id);
                    $stmt->execute();
                    $stmt->close();
                }
            }
        }

        // Redirect kembali ke halaman edit profil untuk menampilkan pesan sukses
        header('Location: profile_edit.php');
        exit;
    } else {
        echo "Gagal memperbarui data!";
    }
}

// Tampilkan form edit profil
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil</title>
    <script>
        // Jika ada session yang menandakan update sukses, tampilkan alert
        <?php if (isset($_SESSION['update_success']) && $_SESSION['update_success'] === true): ?>
            alert('Data Anda berhasil diupdate!');
            <?php unset($_SESSION['update_success']); // Hapus session setelah alert ditampilkan ?>
        <?php endif; ?>
    </script>
</head>
<body>
    <h1>Edit Profil Anda</h1>

    <form method="POST" action="profile_edit.php" enctype="multipart/form-data">
        <label for="full_name">Nama Lengkap:</label>
        <input type="text" name="full_name" id="full_name" value="<?php echo htmlspecialchars($full_name); ?>" required><br>

        <label for="phone_number">Nomor Telepon:</label>
        <input type="text" name="phone_number" id="phone_number" value="<?php echo htmlspecialchars($phone_number); ?>" required><br>

        <!-- Email tidak bisa diubah, jadi hanya ditampilkan -->
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($email); ?>" disabled><br>

        <!-- Bagian untuk mengganti foto profil -->
        <label for="profile_picture">Ganti Foto Profil:</label>
        <input type="file" name="profile_picture" id="profile_picture"><br>

        <button type="submit">Simpan Perubahan</button>
    </form>

    <a href="profile.php">Kembali ke Profil</a>
</body>
</html>