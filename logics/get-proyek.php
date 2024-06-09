<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/happy_homes/logics/dbconn.php');
$hhCon = hh();
session_start();

$queryProyek = $hhCon->prepare("SELECT * FROM PROYEK");
$queryProyek->execute();
$getProyek = $queryProyek->get_result();
$queryProyek->close();

$data = [];

while ($datas = $getProyek->fetch_assoc()) {
    $eachData = array(
        'ID' => $datas['ID'],
        'NAMA_PROYEK' => $datas['NAMA_PROYEK'],
    );

    array_push($data, $eachData);
}

echo json_encode($data);
