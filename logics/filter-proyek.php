<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/happy_homes/logics/dbconn.php');
$hhCon = hh();
session_start();

$select_filter = $_POST['select_filter'];

$queryKegiatan = $hhCon->prepare("SELECT * FROM KEGIATAN WHERE NAMA_PROYEK = '$select_filter'");
$queryKegiatan->execute();
$getKegiatan = $queryKegiatan->get_result();
$queryKegiatan->close();

$data_kegiatan = [];

while ($datas = $getKegiatan->fetch_assoc()) {
    // MENAMPILKAN NAMA PROYEK BERDASARKAN IDNYA
    $nama_proyek = $datas['NAMA_PROYEK'];
    $queryProyek = $hhCon->prepare("SELECT * FROM PROYEK WHERE ID = $nama_proyek ");
    $queryProyek->execute();
    $getProyek = $queryProyek->get_result()->fetch_assoc();
    $queryProyek->close();

    // MELAKUKAN CUSTOMIZE FORMAT WAKTU DURASI
    $timeInSeconds = strtotime($datas['DURASI']) - strtotime('TODAY');
    $hours = floor($timeInSeconds / 3600);
    $minutes = floor(($timeInSeconds % 3600) / 60);
    if ($minutes == 0) {
        $durasi = "$hours jam";
    } else {
        $durasi = "$hours jam $minutes menit";
    }

    $eachData = array(
        'ID' => $datas['ID'],
        'JUDUL_KEGIATAN' => $datas['JUDUL_KEGIATAN'],
        'NAMA_PROYEK' => $getProyek['NAMA_PROYEK'],
        'TGL_MULAI' => $datas['TGL_MULAI'],
        'TGL_BERAKHIR' => $datas['TGL_BERAKHIR'],
        'WAKTU_MULAI' => $datas['WAKTU_MULAI'],
        'WAKTU_BERAKHIR' => $datas['WAKTU_BERAKHIR'],
        'DURASI' => $durasi
    );

    array_push($data_kegiatan, $eachData);
}

echo json_encode($data_kegiatan);
