<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/happy_homes/logics/dbconn.php');
$hhCon = hh();
session_start();

$judul_kegiatan = $_POST['judul_kegiatan'];
$nama_proyek = $_POST['nama_proyek'];
$tgl_mulai = $_POST['tgl_mulai'];
$tgl_berakhir = $_POST['tgl_berakhir'];
$jam_mulai = $_POST['waktu_mulai'];
$jam_berakhir = $_POST['waktu_berakhir'];
$durasi = $_POST['durasi'];

$queryProyek = "INSERT INTO KEGIATAN (JUDUL_KEGIATAN, NAMA_PROYEK, TGL_MULAI, TGL_BERAKHIR, WAKTU_MULAI, WAKTU_BERAKHIR, DURASI) VALUES ('" . $judul_kegiatan . "', '" . $nama_proyek . "', '" . $tgl_mulai . "', '" . $tgl_berakhir . "', '" . $jam_mulai . "', '" . $jam_berakhir . "', '" . $durasi . "')";

if (mysqli_query($hhCon, $queryProyek)) {
    echo "Koneksi DB Berhasil";
} else {
    echo "Koneksi DB Gagal";
}
