<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css?version=1.2">
</head>

<body>
    <div class="container">
        <div class="login-form">
            <header>Form Login Admin</header>
                <?php
                if (!empty($_GET['error'])) {
                    echo '<p style="color:red; margin-left: 40px; margin-bottom: -20px;" class="error">' . htmlspecialchars($_GET['error']) . '</p>';
                }
                ?>
            <form action="ceklogin.php" method="POST">
                <input type="text" placeholder="Masukan Username" id="username" name="username" required>
                <input type="password" placeholder="Masukan password" id="password" name="password" required>
                <input type="submit" value="Login" name="login" class="button" id="submit"></input>
            </form>
            <div class="signup">
                <span class="signup">Kembali jika anda Bukan Admin
                    <label for="check"><a href="../index.php">Kembali</a></label>
                </span>
            </div>
        </div>
    </div>
</body>

</html>