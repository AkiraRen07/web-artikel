<?php   
    include "koneksi.php";
    $id = $_GET['id'];
    $sql = mysqli_query($db_link,"DELETE FROM artikel WHERE id='$id'");
    echo "<meta http-equiv='refresh' content='1;url=http://localhost/Website_statis/admingilang/update.php'>";


?>