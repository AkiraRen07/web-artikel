<?php
include "./admingilang/koneksi.php";
session_start();

$username = isset($_SESSION['username']) ? addslashes($_SESSION['username']) : '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_SESSION['username']; // Ambil nama user dari sesi
    $komentar = $db_link->real_escape_string($_POST['komentar']);

    // Ambil foto profil user dari database
    $queryProfile = "SELECT photo_profile FROM user_verification WHERE id = ?";
    $stmt = $db_link->prepare($queryProfile);
    $stmt->bind_param('i', $_SESSION['user_id']);
    $stmt->execute();
    $stmt->bind_result($photo_profile);
    $stmt->fetch();
    $stmt->close();

    // Insert nama, komentar, dan photo_profile ke dalam database komentar
    $sql = "INSERT INTO komentar (nama, komentar, photo_profile) VALUES ('$nama', '$komentar', '$photo_profile')";

    if ($db_link->query($sql) === TRUE) {
        // Redirect setelah komentar berhasil ditambahkan
        header("Location: " . $_SERVER['PHP_SELF']);  // Mengarahkan ke halaman yang sama dengan metode GET
        exit();  // Hentikan eksekusi script setelah redirect
    } else {
        echo "Error: " . $sql . "<br>" . $db_link->error;
    }
}


// Mengambil komentar dari database
$sql = "SELECT * FROM komentar ORDER BY tanggal DESC LIMIT 5";
$result = $db_link->query($sql);

$profileDir = "img/profile/";
if ($photo_profile) {
    $profilePicture = $profileDir . $photo_profile;
} else {
    $profilePicture = "./img/profile/default_profile.jpg"; // Gambar default
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News</title>
    <link rel="stylesheet" href="./css/news-content.css">
    <style>
        .hidden-comment {
            display: none;
        }
    </style>

</head>

<body>
    <?php
    require "./navbar.php";
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
    <div id="top"></div>
    <div class="content">


        <div class="row">
            <div class="row-left" style="background-color: #e1dbd6">
                <div class="publisher">
                    <img src="./img/user.jpeg" alt="user" width="42" height="42">
                    <p>Gilang Rahmat Firdaus | &nbsp; 23 Juli 2024</p>
                </div>
                <h1 class="title">Mengapa Belajar Bahasa Asing Penting? Inilah 7 Manfaat Utamanya</h1>
                <div class="hr"></div>
                <div class="tag">
                    <div class="hastag">
                        <a href="#">#Bahasa</a>
                        <a href="#">#Bahasa Asing</a>
                        <a href="#">#Bahasa Jepang</a>
                        <a href="#">#Bahasa English</a>
                        <a href="#">#Manfaat Belajar Bahasa Asing</a>
                    </div>
                </div>
                <img src="./img/1.jpg" alt="Gambar">
                <article>
                    <p>Belajar bahasa asing memiliki peran yang sangat penting dalam dunia yang semakin terhubung dan
                        global
                        belajar bahasa asing bukan hanya tentang kemampuan untuk berbicara dalam bahasa lain, tetapi
                        juga
                        tentang membuka pintu ke berbagai peluang dan pengalaman yang dapat memperkaya kehidupan kita
                        secara
                        keseluruhan. berikut ini adalah manfaat belajar bahasa asing:
                    </p>
                    <h3>1. Peningkatan Kemampuan Kognitif</h3>
                    <p>
                        Belajar bahasa asing dapat meningkatkan kemampuan kognitif dengan melatih otak untuk berpikir
                        secara lebih kompleks, meningkatkan daya ingat, dan memperkuat fungsi otak:
                    </p>
                    <ul>
                        <li><b>Memori:</b> Belajar bahasa asing melibatkan penghafalan kosa kata, frasa, dan aturan tata
                            bahasa.
                            Proses ini membantu meningkatkan memori jangka pendek dan jangka panjang.
                        </li>
                        <li>
                            <b>Pemecahan Masalah:</b> Belajar mengartikan dan menyusun kalimat dalam bahasa baru melatih
                            otak
                            untuk
                            berpikir secara kreatif dan analitis.
                        </li>
                        <li>
                            <b> Kemampuan Berpikir Kritis:</b>
                            Menggunakan bahasa lain memaksa otak untuk berpikir dalam cara
                            yang
                            berbeda, meningkatkan kemampuan berpikir kritis dan fleksibilitas mental.
                        </li>
                    </ul>
                    <br>
                    <h3>2. Memperluas peluang karir</h3>
                    <p>
                        Di dunia kerja yang semakin global, banyak perusahaan mencari karyawan yang mampu berbicara
                        lebih dari satu bahasa. Menguasai bahasa asing dapat membuka pintu ke berbagai peluang karir,
                        termasuk:

                    <ul>
                        <li><b>Persaingan Global:</b> Dalam dunia yang semakin global, kemampuan berbicara lebih dari
                            satu
                            bahasa adalah aset berharga bagi perusahaan yang beroperasi di berbagai negara.
                        </li>
                        <li>
                            <b>Karir di Diplomasi:</b> Bahasa asing sangat penting dalam bidang diplomasi dan hubungan
                            internasional, di mana komunikasi lintas budaya menjadi kunci sukses.
                        </li>
                        <li>
                            <b>Pekerjaan di Pariwisata:</b> Industri pariwisata sangat memerlukan karyawan yang dapat
                            berkomunikasi dengan wisatawan dari berbagai negara.
                        </li>
                    </ul>
                    <br>
                    <h3>3. Memperkaya Budaya</h3>
                    <p>
                        Belajar bahasa asing juga berarti belajar tentang budaya negara yang
                        menggunakan bahasa tersebut. Dengan begitu, kita dapat memiliki perspektif yang lebih luas dan
                        menghargai keragaman budaya. Ini mencakup memahami:
                    </p>
                    <ul>
                        <li><b>Pemahaman Budaya:</b> Belajar bahasa asing sering kali mencakup mempelajari tradisi, adat
                            istiadat, dan sejarah negara yang menggunakan bahasa tersebut.
                        </li>
                        <li>
                            <b>Empati dan Toleransi:</b> Dengan memahami budaya lain, kita dapat mengembangkan empati
                            dan
                            toleransi terhadap perbedaan, yang penting dalam masyarakat yang beragam.
                        </li>
                        <li>
                            <b>Apresiasi Seni dan Sastra:</b> Menguasai bahasa asing memungkinkan kita untuk menikmati
                            karya
                            sastra, film, musik, dan seni dalam bahasa aslinya, yang memberikan pemahaman yang lebih
                            mendalam
                        </li>
                    </ul>
                    <br>
                    <h3>4. Meningkatkan Kemampuan Berkomunikasi</h3>
                    <p>
                        Menguasai bahasa asing memungkinkan kita berkomunikasi dengan lebih banyak orang di berbagai
                        belahan dunia. Ini tidak hanya berguna dalam perjalanan dan pariwisata, tetapi mempermudah kita
                        juga dalam:
                    </p>
                    <ul>
                        <li>
                            <b>Jaringan Internasional:</b> Kemampuan berbicara dalam bahasa asing memperluas jaringan
                            sosial
                            dan profesional kita di seluruh dunia.
                        </li>
                        <li>
                            <b>Perjalanan yang Lebih Lancar:</b> Kemampuan berkomunikasi dengan penduduk lokal saat
                            bepergian
                            membuat pengalaman perjalanan lebih menyenangkan dan bermakna.
                        </li>
                        <li>
                            <b>Peningkatan Pelayanan:</b> Dalam bisnis, kemampuan berkomunikasi dalam bahasa pelanggan
                            dapat
                            meningkatkan kualitas pelayanan dan kepuasan pelanggan.
                        </li>
                    </ul>
                    <br>
                    <h3>5. Meningkatkan Kepercayaan Diri</h3>
                    <p>
                        Proses belajar dan menguasai bahasa baru adalah pencapaian besar yang dapat meningkatkan rasa
                        percaya diri. Setiap kali kita berhasil berkomunikasi dalam bahasa asing, kita merasakan
                        kepuasan dan motivasi untuk terus belajar, seperti:
                    </p>
                    <ul>
                        <li>
                            <b>Pencapaian Pribadi:</b> Menguasai bahasa baru adalah pencapaian besar yang memberikan
                            rasa
                            bangga dan percaya diri.
                        </li>
                        <li>
                            <b>Keberanian Berkomunikasi:</b> Dengan keterampilan bahasa yang baru, kita lebih berani
                            untuk
                            berinteraksi dengan orang dari latar belakang budaya yang berbeda.
                        </li>
                        <li>
                            <b>Motivasi untuk Belajar Lebih Lanjut:</b> Keberhasilan dalam belajar bahasa asing dapat
                            memotivasi kita untuk terus belajar dan mencapai tujuan lainnya.
                        </li>
                    </ul>
                    <br>
                    <h3>6. Menjaga Kesehatan Otak</h3>
                    <p>
                        Aktivitas mental yang diperlukan untuk belajar dan menggunakan bahasa asing membantu menjaga
                        otak tetap aktif dan sehat seiring bertambahnya usia. selain itu ada juga manfaat yang lain
                        seperti:
                    </p>
                    <ul>
                        <li>
                            <b>Penurunan Risiko Penyakit:</b> Studi menunjukkan bahwa orang yang berbicara lebih dari
                            satu
                            bahasa memiliki risiko lebih rendah terkena penyakit Alzheimer dan demensia.
                        </li>
                        <li>
                            <b>Stimulasi Mental:</b> Aktivitas belajar bahasa asing merangsang otak, menjaga fungsi
                            kognitif
                            tetap tajam seiring bertambahnya usia.
                        </li>
                        <li>
                            <b>Latihan Kognitif:</b> Penggunaan bahasa asing secara teratur adalah latihan yang baik
                            untuk
                            otak, sama seperti olahraga untuk tubuh.
                        </li>
                    </ul>
                    <br>
                    <h3>7. Meningkatkan Kemampuan Berpikir Kreatif </h3>
                    <p>
                        Menguasai bahasa baru sering kali mengharuskan kita untuk memikirkan konsep dan ide dengan cara
                        yang berbeda, Hal ini dapat merangsang kreativitas dan inovasi, manfaat yang lainya juga:
                    </p>
                    <ul>
                        <li>
                            <b>Pendekatan Inovatif:</b> Memahami dan menggunakan struktur bahasa yang berbeda dapat
                            merangsang
                            cara berpikir yang inovatif.
                        </li>
                        <li>
                            <b>Berpikir Lintas Budaya:</b> Menguasai bahasa asing memungkinkan kita melihat masalah dari
                            berbagai perspektif budaya, yang dapat menghasilkan solusi kreatif.
                        </li>
                        <li>
                            <b>Adaptasi dan Fleksibilitas:</b> Proses belajar bahasa baru mengajarkan kita untuk
                            beradaptasi
                            dan menjadi lebih fleksibel dalam menghadapi situasi baru.
                        </li>
                    </ul>

                </article>
            </div>

            <div class="column">
                <div class="column-right" style="background-color: #bbb;">
                    <h2>Berita Populer #1</h2>
                    <div class="hr"></div>
                    <div class="news">
                        <div class="news-content">
                            <img src="./img/3.jpg" alt="">
                            <a href="">
                                <p>Belajar Bahasa Asing dari Nol: Panduan Lengkap untuk Pemula <br><span>30 Juli
                                        2024</span></br></p>
                            </a>
                        </div>
                    </div>
                    <div class="news">
                        <div class="news-content">
                            <img src="./img/3.jpg" alt="">
                            <a href="">
                                <p>Dari Anime Hingga Bisnis, Alasan Orang Indonesia Belajar Bahasa Jepang! <br><span>28
                                        Juli 2024</span></br></p>
                            </a>
                        </div>
                    </div>
                    <div class="news">
                        <div class="news-content">
                            <img src="./img/3.jpg" alt="">
                            <a href="#pi">
                                <p>Mengapa Anak-Anak Harus Diperkenalkan dengan Bahasa Asing Sejak Dini <br><span>30
                                        Juli 2024
                                    </span></br></p>
                            </a>
                        </div>
                    </div>
                    <div class="news">
                        <div class="news-content">
                            <img src="./img/3.jpg" alt="">
                            <a href="">
                                <p>Strategi Belajar Bahasa Asing untuk Pelajar dan Profesional <br><span>30 Juli
                                        2024</span></br> </p>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="column-right" style="background-color: #bbb;">
                    <h2>Komentar</h2>
                    <div class="komentar-list">
                        <?php
                        if ($result->num_rows > 0) {
                            $count = 0;  // Counter untuk komentar
                            while ($row = $result->fetch_assoc()) {
                                $count++;
                                $displayClass = $count > 3 ? 'hidden-comment' : ''; // Sembunyikan jika lebih dari 3

                                // Gunakan foto profil jika ada, atau gunakan gambar default
                                $profileDir = "./img/profile/";
                                $profilePicture = $row['photo_profile'] ? $profileDir . $row['photo_profile'] : $profileDir . "default_profile.jpg";

                                echo "<div class='komentar $displayClass'>
                    <div class='komentar-content'>
                        <img src='$profilePicture' alt='Foto Profil' width='42' height='42'>
                        <p><span><strong>" . htmlspecialchars($row['nama']) . "</strong> | " . date("d M Y", strtotime($row['tanggal'])) . "</span><br>
                        <q>" . htmlspecialchars($row['komentar']) . "</q></p>
                    </div>
                  </div><br>";
                            }
                            // Tampilkan tombol jika ada lebih dari 3 komentar
                            if ($count > 3) {
                                echo '<button id="show-more">Tampilkan lebih banyak komentar</button>';
                            }
                        } else {
                            echo "Belum ada komentar.";
                        }
                        ?>
                    </div>
                    <!-- <div class="komentar">
                        <div class="komentar-content">
                            <img src="../img/user.jpeg" alt="">
                            <p><span>Gilang Rahmat Firdaus | &nbsp; 23 Juli 2024</span><br><q>Jangan khawatir tentang
                                    membuat kesalahan. Itu bagian dari proses belajar. Kamu pasti bisa!</q></p>
                        </div>
                    </div>
                    <br>
                    <div class="komentar">
                        <div class="komentar-content">
                            <img src="../img/mim.jpg" alt="">
                            <p><span>Nurul Hamim | &nbsp; 30 Juli 2024</span><br><q style="font-size: 12px;">Jangan pernah merasa bodoh karena
                                    tidak sepintar orang lain, jadikanlah orang lain yang lebih
                                    darimu menjadi motivasi untuk terus berusaha!</q></p>
                        </div>
                    </div>
                    <br>
                    <div class="komentar">
                        <div class="komentar-content">
                            <img src="../img/lik.jpg" alt="">
                            <p><span>Muhammad Malik M | &nbsp; 2 Agustus 2024</span><br><q>Ingatlah bahwa semua orang
                                    memulai dari awal. Teruslah berusaha dan nikmati proses belajarnya!</q></p>
                        </div>
                    </div>
                    <br>
                    <div class="komentar">
                        <div class="komentar-content">
                            <img src="../img/kas.jpg" alt="">
                            <p><span>Akasa | &nbsp; 6 Agustus 2024</span><br><q>Tetap belajar jika kamu ingin menambah ilmu, ingat menjadi pintar bukan berarti tahu segalanya!</q></p>
                        </div>
                    </div> -->
                    <form action="" method="POST">
                        <label for="komentar">Komentar:</label><br>
                        <textarea id="komentar" name="komentar" required></textarea><br><br>

                        <input type="submit" value="Kirim">
                    </form>
                </div>
            </div>
        </div>
        <div class="media-sosial">
            <button onclick="topFunction()" id="myBtn" title="Go to top"><a href="#top"><abbr title="Up"><i
                            class="fa-solid fa-arrow-up"></abbr></a></i></button>
            <button id="myBtn"><a href="https://web.whatsapp.com/"><abbr title="Whatsapp"><i
                            class="fa-brands fa-whatsapp"></i></abbr></a></button>
            <button id="myBtn"><a href="https://www.facebook.com/"><abbr title="Facebook"><i
                            class="fa-brands fa-facebook"></i></abbr></a></button>
            <button id="myBtn"><a href="https://www.instagram.com/"><abbr title="instagram"><i
                            class="fa-brands fa-instagram"></i></abbr></a></button>

        </div>
    </div>
    <?php
    include "../footer.php";
    ?>

    <script src="https://kit.fontawesome.com/40df3db4c5.js" crossorigin="anonymous"></script>
    <script src="../js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#show-more').click(function() {
                // Tampilkan semua komentar tersembunyi dengan efek slide
                $('.hidden-comment').slideDown();
                // Sembunyikan tombol "Tampilkan lebih banyak komentar" setelah diklik
                $(this).hide();
            });
        });
    </script>
</body>

</html>
<?php
$db_link->close();
?>