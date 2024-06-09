<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/happy_homes/logics/dbconn.php');
$hhCon = hh();
session_start();

$id = $_POST['id'];

$queryProyek = "DELETE FROM KEGIATAN WHERE ID = '$id'";

if (mysqli_query($hhCon, $queryProyek)) {
    echo "Koneksi DB Berhasil";
} else {
    echo "Koneksi DB Gagal";
}
