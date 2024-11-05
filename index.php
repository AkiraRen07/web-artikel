<?php
include "admingilang/koneksi.php";

session_start();

// Periksa apakah user sudah login
if (empty($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}

$username = isset($_SESSION['username']) ? addslashes($_SESSION['username']) : '';
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM artikel";
$query = mysqli_query($db_link, $sql);
$data = mysqli_fetch_array($query);

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
    <title>Homepage</title>
    <link rel="stylesheet" href="./css/style.css?version=1.1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">

</head>

<body>
  <!-- Tampilkan alert dengan JavaScript, memastikan variabel PHP aman disisipkan -->
  <script>
    var username = "<?php echo $username; ?>";
    // Cek apakah alert sudah ditampilkan sebelumnya di sessionStorage
    if (!sessionStorage.getItem('welcomeShown')) {
        if (username) {
            alert("Selamat datang, " + username + "!");
        } else {
            alert("Selamat datang, User!");
        }
        // Simpan status di sessionStorage agar alert tidak muncul lagi
        sessionStorage.setItem('welcomeShown', true);
    }
</script>

    <?php
    require "navbar.php";
    ?>
    <div class="header">
        <div class="header-title">
            <h1>Akar Bahasa</h1>
            <p>Dunia ini lebih dari sekadar buku atau film. Dengan belajar bahasa asing, kamu bisa langsung berinteraksi dengan orang-orang dari berbagai latar belakang, membuka pikiranmu terhadap perspektif baru, dan memperkaya pengalaman hidupmu</p>
        </div>
        <img src="img/la1.jpg" alt="">
    </div>

    <div class="content">
        <h3 id="carousel-heading">Kategori</h3>
        <div class="kategori-content">
            <div class="kategori" style="background-color:lightblue;">
                <a href="English.php">
                    <p><b>Bahasa Inggris</b><br><span>Bahasa Inggris adalah bahasa Jermanik yang berasal dari Inggris dan
                            sekarang
                            menjadi bahasa global yang paling banyak digunakan di dunia.Bahasa Inggris juga memiliki
                            berbagai dialek dan varian, seperti bahasa Inggris
                            Amerika, Inggris Britania, dan lain-lain.</span></br></p>
                </a>
            </div>
            <div class="kategori" style="background-color:lightblue;">
                <a href="Japan.php">
                    <p><b>Bahasa Jepang</b><br><span>Bahasa Jepang adalah bahasa yang digunakan oleh masyarakat di Jepang.
                            Bahasa ini memiliki sistem penulisan yang unik, menggunakan tiga jenis aksara: Kanji
                            (karakter Tionghoa), Hiragana, dan Katakana.</span></br>
                    </p>
                </a>
            </div>
        </div>
        <br>
        <section class="splide" aria-labelledby="carousel-heading">
            <h3 id="carousel-heading">Update</h3>
            <div class="splide__track">
                <ul class="splide__list">
                    <?php while ($tikel = mysqli_fetch_array($query)) { ?>
                        <li class="splide__slide">
                            <div class="news-content" style="background-color:#bbb;">
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
    <script src="https://kit.fontawesome.com/40df3db4c5.js" crossorigin="anonymous"></script>
    <script src="./js/script.js"></script>

</body>

</html>