<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/happy_homes/logics/dbconn.php');
$hhCon = hh();
session_start();

$nama_proyek = $_POST['nama_proyek'];

$queryProyek = "INSERT INTO PROYEK (NAMA_PROYEK) VALUES ('" . $nama_proyek . "')";

if (mysqli_query($hhCon, $queryProyek)) {
    echo "Koneksi DB Berhasil";
} else {
    echo "Koneksi DB Gagal";
}
