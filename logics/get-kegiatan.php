<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/happy_homes/logics/dbconn.php');
$hhCon = hh();
session_start();

$queryKegiatan = $hhCon->prepare("SELECT * FROM KEGIATAN");
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

    // COSTUMIZE TGL
    $custom_tgl_mulai = strtotime($datas['TGL_MULAI']);
    $tgl_mulai = date("d M Y", $custom_tgl_mulai);

    $custom_tgl_berakhir = strtotime($datas['TGL_BERAKHIR']);
    $tgl_berakhir = date("d M Y", $custom_tgl_berakhir);

    // MELAKUKAN CUSTOMIZE FORMAT WAKTU DURASI
    $timeInSeconds = strtotime($datas['DURASI']) - strtotime('TODAY');
    $hours = floor($timeInSeconds / 3600);
    $minutes = floor(($timeInSeconds % 3600) / 60);
    if ($minutes == 0) {
        $durasi = "$hours jam";
    } else {
        $durasi = "$hours jam $minutes menit";
    }

    // MENGHITUNG DURASI OVERTIME AWAL
    if ($datas['WAKTU_MULAI'] < "09:00:00") {
        $startTime = strtotime($datas['WAKTU_MULAI']);
        $endTime = strtotime("09:00:00");
        $diffSecondsAwal = $endTime - $startTime;

        if ($diffSecondsAwal < 0) {
            $diffSecondsAwal += 86400;
        }

        $hours_overtime_awal = floor($diffSecondsAwal / 3600);
        $minutes_overtime_awal = floor(($diffSecondsAwal % 3600) / 60);
        $seconds_overtime_awal = $diffSecondsAwal % 60;

        $durasi_overtime_awal = sprintf('%02d:%02d:%02d', $hours_overtime_awal, $minutes_overtime_awal, $seconds_overtime_awal);
    } else {
        $durasi_overtime_awal = sprintf('%02d:%02d:%02d', "00", "00", "00");
    }

    // MENGHITUNG DURASI OVERTIME AKHIR
    if ($datas['WAKTU_BERAKHIR'] > "17:00:00") {
        $startTime = strtotime("17:00:00");
        $endTime = strtotime($datas['WAKTU_BERAKHIR']);
        $diffSecondsAkhir = $endTime - $startTime;

        if ($diffSecondsAkhir < 0) {
            $diffSecondsAkhir += 86400;
        }

        $hours_overtime_akhir = floor($diffSecondsAkhir / 3600);
        $minutes_overtime_akhir = floor(($diffSecondsAkhir % 3600) / 60);
        $seconds_overtime_akhir = $diffSecondsAkhir % 60;

        $durasi_overtime_akhir = sprintf('%02d:%02d:%02d', $hours_overtime_akhir, $minutes_overtime_akhir, $seconds_overtime_akhir);
    } else {
        $durasi_overtime_akhir = sprintf('%02d:%02d:%02d', "00", "00", "00");
    }

    // MENGHITUNG TOTAL DURASI OVERTIME
    $total_awal = strtotime("1970-01-01 $durasi_overtime_awal UTC");
    $total_akhir = strtotime("1970-01-01 $durasi_overtime_akhir UTC");
    $diffSecondsTotal = $total_awal + $total_akhir;

    if ($diffSecondsTotal < 0) {
        $diffSecondsTotal += 86400;
    }

    $hours_overtime_total = floor($diffSecondsTotal / 3600);
    $minutes_overtime_total = floor(($diffSecondsTotal % 3600) / 60);
    $seconds_overtime_total = $diffSecondsTotal % 60;

    $durasi_overtime_total = sprintf('%02d:%02d:%02d', $hours_overtime_total, $minutes_overtime_total, $seconds_overtime_total);

    $eachData = array(
        'ID' => $datas['ID'],
        'JUDUL_KEGIATAN' => $datas['JUDUL_KEGIATAN'],
        'NAMA_PROYEK' => $getProyek['NAMA_PROYEK'],
        'TGL_MULAI' => $tgl_mulai,
        'TGL_BERAKHIR' => $tgl_berakhir,
        'WAKTU_MULAI' => $datas['WAKTU_MULAI'],
        'WAKTU_BERAKHIR' => $datas['WAKTU_BERAKHIR'],
        'DURASI' => $durasi,
        'DURASI_OVERTIME_TOTAL' => $durasi_overtime_total,
    );

    array_push($data_kegiatan, $eachData);
}

echo json_encode($data_kegiatan);
