<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/happy_homes/logics/dbconn.php');
$hhCon = hh();
session_start();

$rate = $_POST['rate'];

$queryDuasi = $hhCon->prepare("SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(STR_TO_DATE(DURASI, '%H:%i:%s')))) AS TOTAL_DURASI FROM `KEGIATAN`");
$queryDuasi->execute();
$getDurasi = $queryDuasi->get_result();
$queryDuasi->close();

$data = [];

while ($datas = $getDurasi->fetch_assoc()) {
    // UNTUK MENDAPATKAN TOTAL DURASI
    list($hours, $minutes, $seconds) = explode(':', $datas['TOTAL_DURASI']);
    $totalSeconds = ($hours * 3600) + ($minutes * 60) + $seconds;
    $calculatedHours = floor($totalSeconds / 3600);
    $calculatedMinutes = floor(($totalSeconds % 3600) / 60);
    $calculatedSeconds = $totalSeconds % 60;
    if ($calculatedMinutes == 0) {
        $total_durasi = sprintf('%02d jam', $calculatedHours);
        $total_pendapatan = ($hours * $rate);
    } else {
        $total_durasi = sprintf('%02d jam %02d menit', $calculatedHours, $calculatedMinutes);
        $total_pendapatan = (($hours * $rate) + ($rate / 60 * $minutes));
    }

    // $TOTAL_PENDAPATAN ADALAH UNTUK MENDAPATKAN TOTAL PENDAPATAN DENGAN RUMUS SETIAP MENIT X RATE/JAM

    $eachData = array(
        'TOTAL_DURASI' => $total_durasi,
        'TOTAL_PENDAPATAN' => number_format($total_pendapatan, 0, ',', '.'),
    );

    array_push($data, $eachData);
}

echo json_encode($data);
