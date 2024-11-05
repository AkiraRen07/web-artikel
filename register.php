<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="login.css?version=">
</head>

<body>
    <div class="container" style="margin-top: 10px;">
        <div class="registrasi-form">
            <header>Form Registrasi</header>
            <?php
            session_start();
            if (isset($_SESSION['error'])) {
                echo "<p style='color:red;' margin-left: 20px;>" . $_SESSION['error'] . "</p>";
                unset($_SESSION['error']); // Hapus pesan setelah ditampilkan
            }
            if (isset($_SESSION['success'])) {
                echo "<p style='color:green; font-size:12px; margin-left: 20px;'>" . $_SESSION['success'] . "</p>";
                unset($_SESSION['success']); // Hapus pesan setelah ditampilkan
            }

            ?>
            <form action="cek_registration.php" method="POST">
                <input type="text" placeholder="Masukan Username" id="username" name="username" required>
                <input type="text" name="full_name" placeholder="Nama Lengkap" required>
                <input type="text" name="email" placeholder="Alamat Email" required>
                <input type="password" placeholder="Masukan password" id="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Harus berisi minimal satu angka dan satu huruf besar dan kecil, serta minimal 8 karakter atau lebih" required>
                <input type="text" name="phone_number" placeholder="Nomor Telepon" required>
                <input type="submit" value="Daftar" class="button" id="submit" name="submit">
            </form>
            <div class="signup">
                <span class="signup">Sudah punya akun?
                    <label for="check"><a href="login.php">login</a></label>
                </span>
            </div>
        </div>
    </div>
    <div id="message">
        <h3>Password Harus Berisi sebagai berikut:</h3>
        <p id="capital" class="invalid">Mengandung <b>huruf kapital</b></p>
        <p id="letter" class="invalid">Mengandung <b>huruf kecil</b></p>
        <p id="number" class="invalid">Mengandung <b>Angka</b></p>
        <p id="length" class="invalid">Minimal <b>8 karakter</b></p>
    </div>

    <script>
        var myInput = document.getElementById("password");
        var letter = document.getElementById("letter");
        var capital = document.getElementById("capital");
        var number = document.getElementById("number");
        var length = document.getElementById("length");

        // When the user clicks on the password field, show the message box
        myInput.onfocus = function() {
            document.getElementById("message").style.display = "block";
        }

        // When the user clicks outside of the password field, hide the message box
        myInput.onblur = function() {
            document.getElementById("message").style.display = "none";
        }

        // When the user starts to type something inside the password field
        myInput.onkeyup = function() {
            // Validate lowercase letters
            var lowerCaseLetters = /[a-z]/g;
            if (myInput.value.match(lowerCaseLetters)) {
                letter.classList.remove("invalid");
                letter.classList.add("valid");
            } else {
                letter.classList.remove("valid");
                letter.classList.add("invalid");
            }

            // Validate capital letters
            var upperCaseLetters = /[A-Z]/g;
            if (myInput.value.match(upperCaseLetters)) {
                capital.classList.remove("invalid");
                capital.classList.add("valid");
            } else {
                capital.classList.remove("valid");
                capital.classList.add("invalid");
            }

            // Validate numbers
            var numbers = /[0-9]/g;
            if (myInput.value.match(numbers)) {
                number.classList.remove("invalid");
                number.classList.add("valid");
            } else {
                number.classList.remove("valid");
                number.classList.add("invalid");
            }

            // Validate length
            if (myInput.value.length >= 8) {
                length.classList.remove("invalid");
                length.classList.add("valid");
            } else {
                length.classList.remove("valid");
                length.classList.add("invalid");
            }
        }
    </script>
</body>

</html>