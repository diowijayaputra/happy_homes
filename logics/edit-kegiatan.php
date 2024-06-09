<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/happy_homes/logics/dbconn.php');
$hhCon = hh();
session_start();

$id = $_POST['id'];
$edit_judul_kegiatan = $_POST['edit_judul_kegiatan'];
$edit_nama_proyek = $_POST['edit_nama_proyek'];
$edit_tgl_mulai = $_POST['edit_tgl_mulai'];
$edit_tgl_berakhir = $_POST['edit_tgl_berakhir'];
$edit_waktu_mulai = $_POST['edit_waktu_mulai'];
$edit_waktu_berakhir = $_POST['edit_waktu_berakhir'];
$edit_durasi = $_POST['edit_durasi'];

$queryProyek = "UPDATE KEGIATAN SET JUDUL_KEGIATAN = '" . $edit_judul_kegiatan . "', NAMA_PROYEK = '" . $edit_nama_proyek . "', TGL_MULAI = '" . $edit_tgl_mulai . "', TGL_BERAKHIR = '" . $edit_tgl_berakhir . "', WAKTU_MULAI = '" . $edit_waktu_mulai . "', WAKTU_BERAKHIR = '" . $edit_waktu_berakhir . "', DURASI = '" . $edit_durasi . "' WHERE ID = '" . $id . "'";

if (mysqli_query($hhCon, $queryProyek)) {
    echo "Koneksi DB Berhasil";
} else {
    echo "Koneksi DB Gagal";
}
