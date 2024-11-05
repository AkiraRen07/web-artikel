<<?php
session_start();
include "admingilang/koneksi.php";


// Debug session value
echo "User ID: " . $_SESSION['user_id'];

if (empty($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}

$user_id = $_SESSION['user_id'];

$query = "SELECT full_name, phone_number, email, photo_profile FROM user_verification WHERE id = ?";
$stmt = $db_link->prepare($query);
$stmt->bind_param('i', $user_id);
$stmt->execute();
$stmt->bind_result($full_name, $phone_number, $email, $photo_profile);
$stmt->fetch();
$stmt->close();

// Debug query result
// echo "Nama Lengkap: " . $full_name . "<br>";
// echo "Nomor Telepon: " . $phone_number . "<br>";
// echo "Email: " . $email . "<br>";
// echo "Foto Profil: " . $photo_profile . "<br>";

// Tampilkan informasi user
$profileDir = "img/profile/";
if ($photo_profile) {
    $profilePicture = $profileDir . $photo_profile;
} else {
    $profilePicture = "img/profile/default_profile.jpg"; // Gambar default
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
<?php
    require "navbar.php";
    ?>
    <nav class="navbar">
        <ul>
            <li><a href="./index.php"><i class="fa-solid fa-house"></i> Home</a></li>
            <li><a href="./English.php"><i class="fa-solid fa-newspaper"></i>News</a></li>
            <li><a class="active" href="./profile.php"><i class="fa-solid fa-user"></i>Profile</a></li>
            <li><a href="admingilang/login.php"><i class="fa-solid fa-inbox"></i>Dashboard</a></li>
            <div class="user">
                <img src="<?php echo $profilePicture; ?>" alt="Foto Profil" width="50" height="50">
                <p><?php echo htmlspecialchars($_SESSION['username']); ?></p>
                <button class="button"><a href="logout.php">Logout</a></button>
            </div>
        </ul>
    </nav>
<h1>Selamat datang, <?php echo $_SESSION['username']; ?>!</h1>

<h1>Profil Anda</h1>
<img src="<?php echo $profilePicture; ?>" alt="Foto Profil" width="150" height="150"><br>

<p><strong>Nama Lengkap:</strong> <?php echo htmlspecialchars($full_name); ?></p>
<p><strong>Nomor Telepon:</strong> <?php echo htmlspecialchars($phone_number); ?></p>
<p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>

<!-- Link untuk mengarahkan ke halaman edit profil -->
<a href="profile_edit.php">Edit Informasi Profil</a>

<a href="logout.php">Logout</a>
<script src="https://kit.fontawesome.com/40df3db4c5.js" crossorigin="anonymous"></script>
</body>
</html>