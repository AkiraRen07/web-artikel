<?php
    session_start();
    session_unset();
    session_destroy();
    echo 
    "<script>
        alert('Anda berhasil logout');
        sessionStorage.removeItem('welcomeShown');
        window.location.href = 'login.php'; // Redirect ke halaman login
    </script>";
exit;
