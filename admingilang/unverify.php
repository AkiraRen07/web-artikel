<?php
include 'koneksi.php';
session_start();
$username = $_SESSION['username'];
$sql = "SELECT * FROM user_admin WHERE username='$username'";
$query = mysqli_query($db_link, $sql);
$data = mysqli_fetch_array($query);
// Memproses verifikasi jika form dikirim
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_POST['user_id'];
    $stmt = $db_link->prepare("UPDATE user_verification SET verified = 0 WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->close();

    echo "Akun berhasil diunverifikasi!";
    header("Refresh:0");
    exit();
}

// Mempersiapkan statement untuk mengambil pengguna yang belum diverifikasi
$stmt = $db_link->prepare("SELECT id, username FROM user_verification WHERE verified = 1");
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($id, $username);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unverifikasi Pengguna</title>
    <link rel="stylesheet" href="very.css?version=">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>

<body>
    <?php include 'navbar_admin.php' ?>
    <nav class="navbar">
        <ul>
            <li><a href="./dashboard.php"><i class="fa-solid fa-inbox"></i>Dashboard</a></li>
            <li><a href="./update.php"><i class="fa-solid fa-circle-down"></i></i>Update</a></li>
            <li><a href="./english.php"><i class="fa-solid fa-book"></i>English</a></li>
            <li><a href="./japan.php"><i class="fa-solid fa-book"></i>Japan</a></li>
            <li><a href="./komentar.php"><i class="fa-solid fa-user"></i>Message</a></li>
            <li><a class="active" href="./verify.php"><i class="fa-solid fa-user"></i>Verify</a></li>
            <div class="user">
                <img src="../img/user.jpeg" alt="">
                <p><?php echo $data['username']; ?></p>
                <button class="button"><a href="logout.php">Logout</a></button>
            </div>
        </ul>
    </nav>

    <div class="container">

        <h2>Unverifikasi Pengguna</h2>
        <?php if ($stmt->num_rows > 1): ?>
            <ul>
                <?php while ($stmt->fetch()): ?>
                    <li>
                        <?= htmlspecialchars($username) ?>
                        <form action="unverify.php" method="POST" style="display:inline;">
                            <input type="hidden" name="user_id" value="<?= htmlspecialchars($id) ?>">
                            <button id="button" type="submit" style="background-color: red;">Unverifikasi</button>
                        </form>
                    </li>
                <?php endwhile; ?>
            </ul>
            <button><a href="verify.php">Verifikasi</a></button>
        <?php else: ?>
            <p>Tidak ada pengguna yang diverifikasi.</p>
        <?php endif; ?>
    </div>
</body>

</html>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://kit.fontawesome.com/40df3db4c5.js" crossorigin="anonymous"></script>
<?php
$stmt->close();
$db_link->close();
?>