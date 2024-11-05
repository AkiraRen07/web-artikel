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
    <title>Dashboard</title>
    <link rel="stylesheet" href="admin.css">
    <style>
        table thead th {
            background: blue;
            color: #fff;
            border-color: white;
        }
    </style>
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
    <div class="content">
        <div class="header" style="background-color: blue;">
            <h1>Data User</h1>
        </div>
        <hr>
        <br>
        <table id="table">
            <thead align="center">
                <th>ID</th>
                <th>Judul </th>
                <th>Tanggal</th>
                <th>Link</th>
                <th>AKSI</th>
            </thead>
            <?php
            $no = 1;
            $sql = "SELECT * FROM english";
            $query = mysqli_query($db_link, $sql);
            while ($data = mysqli_fetch_array($query)) { ?>
                <tbody>
                    <td><?= $data['id'] ?></td>
                    <td><?= $data['judul'] ?></td>
                    <td><?= $data['tanggal'] ?></td>
                    <td><?= $data['link'] ?></td>
                    <td>
                        <button id='edit'><a href='edit-english.php?id=<?= $data["id"] ?>'><i class='fa-solid fa-pen-to-square'></i></a></button>
                        <button id='hapus'><a href='hapus-english.php?id=<?= $data["id"] ?>'><i class='fa-solid fa-trash'></i></a></button>

                    </td>
                </tbody>
            <?php
            }
            ?>
            <?php
            $no
            ?>
            <tr>
                <td colspan="5"><input type="button" value="TAMBAH DATA" onclick="location.href='tambah-english.php'" id="tambah"></td>
            </tr>
        </table>
    </div>
    <script src="https://kit.fontawesome.com/40df3db4c5.js" crossorigin="anonymous"></script>
</body>

</html>