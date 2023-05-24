<?php

function koneksi($namaDatabase)
{
    $host = "localhost";
    $port = 3306;
    $database = "$namaDatabase";
    $username = "root";
    $password = "";

    try {
        $connection = mysqli_connect($host, $username, $password, $database) or die(mysqli_error($connection));
    } catch (PDOException $exception) {
        echo $exception->getMessage();
    }
    return $connection;
}
