<?php
include "admingilang/koneksi.php";
session_start();
$sql = "SELECT * FROM english";
$query = mysqli_query($db_link, $sql);
$data = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>English News</title>
    <link rel="stylesheet" href="./css/News.css?version=2.2">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css?version=1.1">


</head>

<body>
    <?php
    require "navbar.php";
    ?>
    <nav class="navbar">
        <ul>
            <li><a href="./index.php"><i class="fa-solid fa-house"></i> Home</a></li>
            <li><a class="active" href="./English.php"><i class="fa-solid fa-newspaper"></i>News</a></li>
            <li><a href="./profile.php"><i class="fa-solid fa-user"></i>Profile</a></li>
            <li><a href="admingilang/login.php"><i class="fa-solid fa-inbox"></i>Dashboard</a></li>
            <div class="user">
                <img src="<?php echo $profilePicture; ?>" alt="Foto Profil" width="50" height="50">
                <p><?php echo htmlspecialchars($_SESSION['username']); ?></p>
                <button class="button"><a href="logout.php">Logout</a></button>
            </div>
        </ul>
    </nav>
    <div class="content">
        <h4><a href="index.php" style="color: black;">Kategori</a> > English</h4>
        <h2 class="title">Hasil Pencarian <br><span>
                <p id="hasil"></p>
            </span> </h2>
        <section class="splide" aria-labelledby="carousel-heading">
            <div class="splide__track">
                <ul class="splide__list">
                    <?php while ($tikel = mysqli_fetch_array($query)) { ?>
                        <li class="splide__slide">
                            <div class="news-content" style="background-color:#bbb;" id="news">
                                <img src="./img/img_user/<?php echo $tikel['image'] ?>" alt="">
                                <a href="<?php echo $tikel['link'] ?>">
                                    <p><?php echo $tikel['judul'] ?> <br><span><?php echo $tikel['tanggal'] ?></span></br></p>
                                </a>
                            </div>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </section>

    </div>

    <?php
    include "footer.php";
    ?>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    <script src="https://kit.fontawesome.com/40df3db4c5.js" crossorigin="anonymous"></script>
    <script src="./js/script.js"></script>

    <script>
        // Mendapatkan semua elemen <td> dalam tabel
        var semuaTd = document.querySelectorAll("#news");

        // Menghitung jumlah elemen <td>
        var jumlahSel = semuaTd.length;

        // Menampilkan jumlah sel dalam elemen <p> dengan id "hasil"
        document.getElementById("hasil").innerText = "Ada " + jumlahSel + " Artikel tentang English ";
    </script>
    <script>
        var splide = new Splide('.splide', {
            perPage: 4,
            perMove: 4,
            gap: 1,
            padding: {
                left: 40,
                right: -50
            }
        });

        splide.mount();
    </script>
</body>

</html>