<?php
session_start();
include 'koneksi.php';
$username = $_SESSION['username'];
$sql = "SELECT * FROM user_admin WHERE username='$username'";
$query = mysqli_query($db_link, $sql);
$data = mysqli_fetch_array($query);

$data1 = $db_link->query("SELECT * FROM english");
$english = mysqli_num_rows($data1);

$data3 = $db_link->query("SELECT * FROM japan");
$japan = mysqli_num_rows($data3);

$data4 = $db_link->query("SELECT * FROM user_verification");
$user = mysqli_num_rows($data4);

$data5 = $db_link->query("SELECT * FROM user_admin");
$userad = mysqli_num_rows($data5);

$data6 = $db_link->query("SELECT * FROM komentar");
$komen = mysqli_num_rows($data6);

$data2 = $db_link->query("SELECT * FROM artikel");
$artikel = mysqli_num_rows($data2);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="admin.css?version=1.1">
    <style>
        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            transition: 0.3s;
            width: 330px;
            height: 210px;
            border-radius: 5px;
            display: flex;
            margin: 2px;
            flex-direction: row;
            justify-content: space-between;
            margin-right: 20px;
        }

        .card:hover {
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
        }

        .container {
            padding: 20px;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }

        .container-wrapper {
            margin-left: 1rem;
        }

        .container-wrapper h1 {
            font-size: 26px;
        }

        .main {
            display: flex;
            margin-top: 40px;
            margin-left: 30px;

        }

        .main2 {
            display: flex;
            margin-top: 20px;
            margin-left: 40px;
            margin-bottom: 40px;

        }

        h3>a {
            color: black;
        }

        .icon i {
            font-size: 58px;
            padding-top: 1rem;
            padding-bottom: 1rem;
            padding-right: 1rem;
        }

        h3 a {
            color: purple;
        }

        .color {
            background-color: purple;
            color: purple;
            border-radius: 5px 1px 1px 5px;
            width: 40px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            
        }

        header{
            padding-top: 80px;
            padding-left: 40px;
            font-size: 15px;
            height: 170px;

        }

    </style>
</head>

<body>
    <?php include 'navbar_admin.php' ?>
    <header>   
            <h1>Selamat datang di halaman Admin <b><?php echo $data['username'];?></b></h1>
    </header>
        <hr>
    <div class="home">
        <div class="main">
            <div class="card">
                <div class="color" style="background-color: blue"></div>
                <div class="container">
                    <div class="icon"><i class="fa-solid fa-book"></i></div>
                    <div class="container-wrapper">
                        <h1>Data English</h1>
                        <h3><?php echo $english; ?></h3>
                        <h3><a href="english.php">Detail</a></h3>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="color" style="background-color: red"></div>
                <div class="container">
                    <div class="icon"><i class="fa-solid fa-book"></i></div>
                    <div class="container-wrapper">
                        <h1>Data Japan</h1>
                        <h3><?php echo $japan; ?></h3>
                        <h3><a href="japan.php">Detail</a></h3>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="color" style="background-color: green"></div>
                <div class="container">
                    <div class="icon"><i class="fa-solid fa-circle-down"></i></div>
                    <div class="container-wrapper">
                        <h1>Data Update</h1>
                        <h3><?php echo $artikel; ?></h3>
                        <h3><a href="update.php">Detail</a></h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="main2">
            <div class="card">
                <div class="color" style="background-color: orange"></div>
                <div class="container">
                    <div class="icon"><i class="fa-solid fa-users"></i></div>
                    <div class="container-wrapper">
                        <h1>Data User</h1>
                        <h3><?php echo $user; ?></h3>
                        <h3><a href="english.php">Detail</a></h3>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="color"></div>
                <div class="container">
                    <div class="icon"><i class="fa-solid fa-users"></i></div>
                    <div class="container-wrapper">
                        <h1>Data Admin</h1>
                        <h3><?php echo $userad; ?></h3>
                        <h3><a href="update.php">Detail</a></h3>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="color"></div>
                <div class="container">
                    <div class="icon"><i class="fa-solid fa-users"></i></div>
                    <div class="container-wrapper">
                        <h1>Data Komentar</h1>
                        <h3><?php echo $komen; ?></h3>
                        <h3><a href="komentar.php">Detail</a></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/40df3db4c5.js" crossorigin="anonymous"></script>
</body>

</html>