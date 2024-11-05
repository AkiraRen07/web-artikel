<?php
session_start();
include 'koneksi.php';
$username = $_SESSION['username'];
$sql = "SELECT * FROM user_admin WHERE username='$username'";
$query = mysqli_query($db_link, $sql);
$data = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Artikel Update</title>
    <link rel="stylesheet" href="admin.css">
</head>

<body>
    <?php include 'navbar_admin.php' ?>
    <nav class="navbar">
        <ul>
            <li><a href="./dashboard.php"><i class="fa-solid fa-inbox"></i>Dashboard</a></li>
            <li><a class="active" href="./update.php"><i class="fa-solid fa-circle-down"></i></i>Update</a></li>
            <li><a href="./english.php"><i class="fa-solid fa-book"></i>English</a></li>
            <li><a href="./japan.php"><i class="fa-solid fa-book"></i>Japan</a></li>
            <li><a href="./komentar.php"><i class="fa-solid fa-user"></i>Message</a></li>
            <li><a href="./verify.php"><i class="fa-solid fa-user"></i>Verify</a></li>
            <div class="user">
                <img src="../img/user.jpeg" alt="">
                <p><?php echo $data['username']; ?></p>
                <button class="button"><a href="logout.php">Logout</a></button>
            </div>
        </ul>
    </nav>
    <div class="content">
        <div class="header" style="background-color: green;">
            <h1>Data Artikel Update</h1>
        </div>
        <hr>
        <br>
        <form action="tambah-data.php" method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>Id</td>
                    <td><input type="text" name="id" required autocomplete="off"></td>
                </tr>
                <tr>
                    <td>Judul</td>
                    <td><textarea name="judul" autocomplete="off"></textarea></td>
                </tr>
                <tr>
                    <td>Tanggal</td>
                    <td><input type="date" name="tanggal" required autocomplete="off"></td>
                </tr>
                </tr>
                <tr>
                    <td>link</td>
                    <td><input type="text" name="link" required autocomplete="off"></td>
                </tr>
                <tr>
                    <td>Image</td>
                    <td><input type="file" id="image" name="image"></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="simpan" name="proses" id="simpan">
                        <button id="kembali"><a href="update.php">Kembali</a></button>
                    </td>
                    <!-- <a href="dashboard.php">Kembali</a> -->
                </tr>
            </table>
        </form>
    </div>
    <?php
    if (isset($_POST['proses'])) {
        $id = $_POST['id'];
        $judul = $_POST['judul'];
        $tanggal = $_POST['tanggal'];
        $link = $_POST['link'];
        $image = $_FILES['image']['name'];

        if ($image != "") {
            $ekstensi_berhasil = array('png', 'jpg', 'jpeg');
            $new = explode('.', $image);
            $ekstensi = strtolower(end($new));
            $file_tmp = $_FILES['image']['tmp_name'];
            $angka_acak = rand(1, 999);
            $new_name = $angka_acak . '-' . $image;

            if (in_array($ekstensi, $ekstensi_berhasil) === true) {
                move_uploaded_file($file_tmp, '../img/img_user/' . $new_name);

                $query = mysqli_query($db_link, "INSERT INTO artikel (judul, tanggal, link, image) VALUES ('$judul','$tanggal','$link','$new_name')");

                if (!$query) {
                    die("Query Error : " . mysqli_errno($db_link) . "-" . mysqli_errno($db_link));
                } else {
                    echo "<div align='center'><h5>Silahkan Tunggu, Data Sedang diUpdate.... </h5></div>";
                    echo "<meta http-equiv='refresh' content='1;url=http://localhost/Website_statis/admingilang/update.php'>";
                }
            } else {
                echo "<script>alert('Ekstensi gambar hanya bisa png, jpg, dan jpeg!');</script>";
            }
        } else {
            $query = mysqli_query($db_link, "INSERT INTO artikel (judul, tanggal, link) VALUES ('$judul','$tanggal','$link')");

            if (!$query) {
                die("Query Error : " . mysqli_errno($db_link) . "-" . mysqli_errno($db_link));
            } else {
                echo "<div align='center'><h5>Silahkan Tunggu, Data Sedang diUpdate.... </h5></div>";
                echo "<meta http-equiv='refresh' content='1;url=http://localhost/Website_statis/admingilang/update.php'>";
            }
        }
    }
    ?>
    <script src="https://kit.fontawesome.com/40df3db4c5.js" crossorigin="anonymous"></script>
</body>

</html>