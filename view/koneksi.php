<?php
 $no = 1;
$koneksi = mysqli_connect("localhost", "root", "", "akrab_main");

if (mysqli_connect_errno()) {
    echo "Database Tidak Terkoneksi";
}

mysqli_connect_error();

?>