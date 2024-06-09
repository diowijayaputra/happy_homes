<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/happy_homes/logics/dbconn.php');
$hhCon = hh();
session_start();

$id = $_POST['id'];

$queryEditKegiatan = $hhCon->prepare("SELECT * FROM KEGIATAN WHERE ID = '$id'");
$queryEditKegiatan->execute();
$getEditKegiatan = $queryEditKegiatan->get_result();
$queryEditKegiatan->close();

$edit_kegiatan = [];

while ($datas = $getEditKegiatan->fetch_assoc()) {
    $eachData = array(
        'ID' => $datas['ID'],
        'JUDUL_KEGIATAN' => $datas['JUDUL_KEGIATAN'],
        'NAMA_PROYEK' => $datas['NAMA_PROYEK'],
        'TGL_MULAI' => $datas['TGL_MULAI'],
        'TGL_BERAKHIR' => $datas['TGL_BERAKHIR'],
        'WAKTU_MULAI' => $datas['WAKTU_MULAI'],
        'WAKTU_BERAKHIR' => $datas['WAKTU_BERAKHIR'],
    );

    array_push($edit_kegiatan, $eachData);
}

echo json_encode($edit_kegiatan);
