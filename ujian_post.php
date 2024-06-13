<?php

include 'koneksi.php';

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
$jawaban = $json['jawaban'];

$valid = true;
foreach ($jawaban as $answer) {
    if (!isset($answer['soal']) || !isset($answer['jawaban'])) {
        $valid = false;
        break;
    }
}

if (!$valid || !isset($pengguna)) {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'Invalid data']);
    exit;
}

$correct_answers = [
    1 => 'A',
    2 => 'C',
    3 => 'B',
    4 => 'A',
    5 => 'A',
    6 => 'A',
    7 => 'A',
    8 => 'B',
    9 => 'B',
    10 => 'C'
];

$score = 0;
foreach ($jawaban as $answer) {
    $soal = $answer['soal'];
    $jawaban_user = $answer['jawaban'];
    
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

$answer1 = $jawaban[0]['jawaban'];
$answer2 = $jawaban[1]['jawaban'];
$answer3 = $jawaban[2]['jawaban'];
$answer4 = $jawaban[3]['jawaban'];
$answer5 = $jawaban[4]['jawaban'];
$answer6 = $jawaban[5]['jawaban'];
$answer7 = $jawaban[6]['jawaban'];
$answer8 = $jawaban[7]['jawaban'];
$answer9 = $jawaban[8]['jawaban'];
$answer10 = $jawaban[9]['jawaban'];

$sql = "INSERT INTO jawaban_siswa (id, pengguna, soal1, soal2, soal3, soal4, soal5, soal6, soal7, soal8, soal9, soal10) 
        VALUES ('', '$pengguna', '$answer1', '$answer2', '$answer3', '$answer4', '$answer5', '$answer6', '$answer7', '$answer8', '$answer9', '$answer10')";

if (mysqli_query($koneksi, $sql)) {
    $check_user = mysqli_query($koneksi, "SELECT * FROM leaderboard WHERE nama = '$pengguna'");
    if (mysqli_num_rows($check_user) > 0) {
        $sql_leaderboard = "UPDATE leaderboard SET score = '$score' WHERE nama = '$pengguna'";
        if (mysqli_query($koneksi, $sql_leaderboard)) {
            session_start();
            session_unset();
            session_destroy();
            echo json_encode(['status' => 'success', 'message' => 'Data berhasil di insert', 'score' => $score]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Error pada saat memperbarui leaderboard: ' . mysqli_error($koneksi)]);
        }
    } else {
        $sql_leaderboard = "INSERT INTO leaderboard (id, nama, score) VALUES ('', '$pengguna', '$score')";
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
