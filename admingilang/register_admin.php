<?php
    include "koneksi.php";
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css/login.css?version=">
</head>
<body>
    <div class="container">
        <input type="checkbox" id="check">
        <div class="registrasi-form">
        <header>Form Register</header>
            <form action="register.php" method="post">
                <span>Max 15 character</span>
                <input type="text" placeholder="Masukan Username" id="username" name="username" required autocomplete="off">
                <input type="text" placeholder="Masukan Nama Lengkap" id="nama_lengkap" name="nama_lengkap" required autocomplete="off">
                <input type="password" placeholder="Masukan password" id="password" name="password" required autocomplete="off">
                <input type="submit" value="Daftar" class="button" id="submit" name="submit">
            </form>
            <div class="signup">
            <span class="signup">Sudah punya akun?
                <label for="check"><a href="login.php">login</a></label>
                </span>
            </div>
        </div>
    </div>
    <?php
        if (isset($_POST['submit'])) {
            $username = htmlspecialchars($_POST['username']);
            $nama_lengkap = htmlspecialchars($_POST['nama_lengkap']);
            $password = htmlspecialchars($_POST['password']);
            $encryptedPassword = password_hash($password, PASSWORD_DEFAULT);

            $query = mysqli_query($db_link, "SELECT username FROM users WHERE username='$username'");
            $count = mysqli_num_rows($query);

            if($count > 0){
                echo "Tidak bisa Registrasi, Username sudah dipakai";
            }
            else{
                $queryInsert = mysqli_query($db_link, "INSERT INTO users (username, nama_lengkap, password) 
                VALUES('$username','$nama_lengkap','$password')");
                
                if($queryInsert){
                    echo"Register Berhasil";
                    echo "<div align='center'><h5>Silahkan Tunggu, Data Sedang diUpdate.... </h5></div>";
                    echo "<meta http-equiv='refresh' content='1;url=http://localhost/Website_statis/login.php'>";
                }
            }  
        }
    ?>
</body>
</html>