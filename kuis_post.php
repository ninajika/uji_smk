<?php

include 'koneksi.php';
include 'jawaban.php';

header('Content-Type: application/json');

$data = file_get_contents('php://input');

$json = json_decode($data, true);

if ($json === null) {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'Invalid JSON']);
    exit;
}

$pengguna = $json['pengguna'];
$waktu = $json['waktu'];
$jurusan = $json['jurusan'];
$jawaban = $json['jawaban'];

$valid = true;
// foreach ($jawaban as $answer) {
//     if (!isset($answer['soal']) || !isset($answer['jawaban'])) {
//         $valid = false;
//         break;
//     }
// }

if (!$valid || !isset($pengguna)) {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'Invalid data']);
    exit;
}


$score = 0;
foreach ($jawaban as $answer) {
    $soal = $answer['soal'];
    $jawaban_user = $answer['jawaban'];
    
    $correct_answers = getJawaban($jurusan);
    $score += isset($correct_answers[$soal]) && $jawaban_user === $correct_answers[$soal] ? 10 : 5; 
}


$time_score = 0;
$time_in_seconds = strtotime($waktu);

if ($time_in_seconds <= strtotime('02:00')) {
    $time_score = 50;
} elseif ($time_in_seconds <= strtotime('04:00') && $time_in_seconds > strtotime('02:01')) {
    $time_score = 150;
} elseif ($time_in_seconds <= strtotime('06:00') && $time_in_seconds > strtotime('04:01')) {
    $time_score = 200;
} elseif ($time_in_seconds <= strtotime('08:00') && $time_in_seconds > strtotime('06:01')) {
    $time_score = 350;
} elseif ($time_in_seconds <= strtotime('10:00') && $time_in_seconds > strtotime('08:01')) {
    $time_score = 500;
}

$score += $time_score;

$answer1 = isset($jawaban[0]['jawaban']) ? $jawaban[0]['jawaban'] : 'null';
$answer2 = isset($jawaban[1]['jawaban']) ? $jawaban[1]['jawaban'] : 'null';
$answer3 = isset($jawaban[2]['jawaban']) ? $jawaban[2]['jawaban'] : 'null';
$answer4 = isset($jawaban[3]['jawaban']) ? $jawaban[3]['jawaban'] : 'null';
$answer5 = isset($jawaban[4]['jawaban']) ? $jawaban[4]['jawaban'] : 'null';
$answer6 = isset($jawaban[5]['jawaban']) ? $jawaban[5]['jawaban'] : 'null';
$answer7 = isset($jawaban[6]['jawaban']) ? $jawaban[6]['jawaban'] : 'null';
$answer8 = isset($jawaban[7]['jawaban']) ? $jawaban[7]['jawaban'] : 'null';
$answer9 = isset($jawaban[8]['jawaban']) ? $jawaban[8]['jawaban'] : 'null';
$answer10 = isset($jawaban[9]['jawaban']) ? $jawaban[9]['jawaban'] : 'null';

$sql = "INSERT INTO jawaban_siswa (id, pengguna, soal1, soal2, soal3, soal4, soal5, soal6, soal7, soal8, soal9, soal10, jurusan, waktu) 
        VALUES ('', '$pengguna', '$answer1', '$answer2', '$answer3', '$answer4', '$answer5', '$answer6', '$answer7', '$answer8', '$answer9', '$answer10', '$jurusan', '$waktu')";

if (mysqli_query($koneksi, $sql)) {
    $check_user = mysqli_query($koneksi, "SELECT * FROM leaderboard WHERE nama = '$pengguna' AND jurusan = '$jurusan'");
    if (mysqli_num_rows($check_user) > 0) {
        $sql_leaderboard = "UPDATE leaderboard SET score = '$score' WHERE nama = '$pengguna' AND jurusan = '$jurusan'";
        if (mysqli_query($koneksi, $sql_leaderboard)) {
            session_start();
            session_unset();
            session_destroy();
            echo json_encode(['status' => 'success', 'message' => 'Data berhasil di insert', 'score' => $score]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Error pada saat memperbarui leaderboard: ' . mysqli_error($koneksi)]);
        }
    } else {
        $sql_leaderboard = "INSERT INTO leaderboard (id, nama, score, jurusan, waktu) VALUES ('', '$pengguna', '$score', '$jurusan', '$waktu')";
        if (mysqli_query($koneksi, $sql_leaderboard)) {
            session_start();
            session_unset();
            session_destroy();
            echo json_encode(['status' => 'success', 'message' => 'Data berhasil di insert', 'score' => $score]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Error pada saat memperbarui leaderboard: ' . mysqli_error($koneksi)]);
        }
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Error pada saat insert data ke jawaban_siswa: ' . mysqli_error($koneksi)]);
}

mysqli_close($koneksi);
?>
