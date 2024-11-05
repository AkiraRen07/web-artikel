<?php
$host ="localhost";
$username ="root";
$password ="";
$database_name ="web_bahasa";
$db_link=mysqli_connect($host,$username,$password,$database_name);


if (!$db_link)
    {

        echo("Tidak Terhubung");
    }
?>