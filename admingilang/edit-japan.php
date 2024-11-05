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
    <title>Edit data Japan</title>
    <link rel="stylesheet" href="admin.css">
</head>

<body>
    <?php include 'navbar_admin.php' ?>
    <nav class="navbar">
        <ul>
            <li><a href="./dashboard.php"><i class="fa-solid fa-inbox"></i>Dashboard</a></li>
            <li><a href="./update.php"><i class="fa-solid fa-circle-down"></i></i>Update</a></li>
            <li><a href="./english.php"><i class="fa-solid fa-book"></i>English</a></li>
            <li><a class="active" href="./japan.php"><i class="fa-solid fa-book"></i>Japan</a></li>
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
        <div class="header" style="background-color: red;">
            <h1>Edit Artikel</h1>
        </div>
        <hr>
        <br>
        <?php
        $id = $_GET['id'];
        $sql = mysqli_query($db_link, "SELECT * FROM japan WHERE id='$id'");
        $data = mysqli_fetch_array($sql);
        ?>
        <form action="" <?php echo "id"; ?> method='POST' enctype="multipart/form-data">
            <table>
                <tr>
                    <td>ID</td>
                    <td><input name='id' type="text" id="id" value="<?php echo $data['id']; ?>"></td>
                </tr>
                <tr>
                    <td>Judul</td>
                    <td><input name='judul' type="text" id="judul" value="<?php echo $data['judul']; ?>"></input></td>
                </tr>
                <tr>
                    <td>Tanggal</td>
                    <td><input name='tanggal' type="date" id="tanggal" value="<?php echo $data['tanggal'] ?>"></td>
                </tr>
                <tr>
                    <td>Link</td>
                    <td><input name='link' type="text" id="link" value="<?php echo $data['link'] ?>"></td>
                </tr>
                <tr>
                    <td>Gambar</td>
                    <td><img src="../img/img_user/<?php echo $data['image'] ?>" alt="" width="300px"></td>
                </tr>
                <tr>
                    <td>Image</td>
                    <td><input type="file" id="image" name="image"></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="simpan" name="proses" id="simpan">
                        <button id="kembali"><a href="japan.php">Kembali</a></button>
                    </td>
                </tr>
            </table>
    </div>
    <?php
    if (isset($_POST['proses'])) {
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

                $query = mysqli_query($db_link, "UPDATE japan SET judul='$judul', tanggal='$tanggal', link='$link', image='$new_name' WHERE id='$id'");

                if (!$query) {
                    die("Query Error : " . mysqli_errno($db_link) . "-" . mysqli_errno($db_link));
                } else {
                    echo "<div align='center'><h5>Silahkan Tunggu, Data Sedang diUpdate.... </h5></div>";
                    echo "<meta http-equiv='refresh' content='1;url=http://localhost/Website_statis/admingilang/japan.php'>";
                }
            } else {
                echo "<script>alert('Ekstensi gambar hanya bisa png, jpg, dan jpeg!');</script>";
            }
        } else {
            $query = mysqli_query($db_link, "UPDATE japan SET judul='$judul', tanggal='$tanggal', link='$link' WHERE id='$id'");

            if (!$query) {
                die("Query Error : " . mysqli_errno($db_link) . "-" . mysqli_errno($db_link));
            } else {
                echo "<div align='center'><h5>Silahkan Tunggu, Data Sedang diUpdate.... </h5></div>";
                echo "<meta http-equiv='refresh' content='1;url=http://localhost/Website_statis/admingilang/japan.php'>";
            }
        }
    }
    ?>
    <script src="https://kit.fontawesome.com/40df3db4c5.js" crossorigin="anonymous"></script>
</body>

</html>