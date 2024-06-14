<?php

session_start();
if (!isset($_SESSION['nama'])) {
    echo "<script>alert('Silahkan Mendaftar Terlebih Dahulu'); window.location.href='index.php';</script>";
}

include 'koneksi.php';

$query = "SELECT * FROM soal";

if (isset($_SESSION['jurusan'])) {
    $jurusan = $_SESSION['jurusan'];
    $query = "SELECT * FROM soal WHERE jurusan = '$jurusan'";
}

$result = mysqli_query($koneksi, $query);


if ($_SESSION['jurusan'] == 'aksestelekomunikasi') {
    $title = 'Teknik Akses Telekomunikasi';
} else if ($_SESSION['jurusan'] == 'modelbangunan') {
    $title = 'Desain Permodelan dan Informasi Bangunan';
} else if ($_SESSION['jurusan'] == 'otomatisasiperkebunan') {
    $title = 'Otomatisasi Perkebunan';
} else {
    $title = '';
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Quiz SMK dengan Jurusan <?php echo $title ?></title>

        <!--untuk import bootstrap-->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
            crossorigin="anonymous"
        />
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"
        ></script>

        <!--for debugging perpouse because i using nvim-->
        <!-- <script src="debug.js" defer></script> -->
        <link rel="stylesheet" href="style.css" />
    </head>
    <body>
        <!--bikin header -->
        <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
            <div class="container-fluid">
                <!--<a class="navbar-brand" href="#">PlaceHolder</a>-->
                <img
                    src="smk_kotawaringin.png"
                    class="navbar-brand brand-logo"
                    alt="smk kotawaringin logo"
                    srcset=""
                />
                <button
                    class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarNav"
                    aria-controls="navbarNav"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php"
                                >Daftar</a>
                        </li>
                        <li class="nav-item">
                            <?php if (!isset($_SESSION['nama'])): ?>
                            <a class="nav-link" href="leaderboard.php"
                                >LeaderBoard</a
                            >
                            <?php endif; ?>
                        </li>
                        <li class="nav-item">
                            <a
                                class="nav-link active"
                                aroa-current="page"
                                href="kuis.php"
                                >Kuis</a
                            >
                        </li>
                        <!-- <li class="nav-item">
                            <button class="btn btn-danger" onclick="clearSession()">Logout</button>
                            <script>
                                function clearSession() {
                                    document.cookie.split(";").forEach(function(c) {
                                        document.cookie = c
                                            .replace(/^ +/, "")
                                            .replace(/=.*/, "=;expires=" + new Date().toUTCString() + ";path=/")
                                    });
                                    window.location.reload();
                                }
                            </script>
                        </li> -->
                    </ul>
                </div>
                <div>
                <p style="white-space: nowrap;" class="d-flex">
                    Waktu Berjalan :
                    <span id="timer" style="margin-left: 0.5em" class="d-flex" >10:00</span>
                </p>
                </div>
            </div>
        </nav>
        <!-- just to make centered -->
        <div class="mb-1"></div>
        <br><br>
        <!-- bikin ujian body -->
        <div class="container mt-2">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <!-- form ujian -->
                            <form id="ujianForm">
                                <input type="hidden" name="user" id="user" value="<?php echo $_SESSION['nama']; ?>">
                                <div class="mb-3">
                                    <p>
                                        <input type="hidden" name="jurusan" id="jurusan" value="<?php echo $_SESSION['jurusan']; ?>">
                                    </p>
                                </div>
                                    <?php
                                    if (mysqli_num_rows($result) > 0) {
                                        $counter = 1;
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo '<div class="mb-3">'; 
                                            echo "<h2 class='card-title'>Soal $counter</h2>";
                                            echo "<label for='soal$counter' class='form-label'>{$row['nama_soal']}</label><br>";

                                            $opsi = array($row['jawab1'], $row['jawab2'], $row['jawab3'], $row['jawab4']);
                                            foreach ($opsi as $index => $opsi) {
                                                $opsiJawaban = substr($opsi, 0, 1);
                                                $opsiValue = $opsi; 
                                                $opsiId = "option" . chr(65 + $index); // Buat Generate A, B, C dan D
                                                echo "<input type='radio' name='answer_soal$counter' id='$opsiId' value='$opsiJawaban'>";
                                                echo "<label for='$opsiId' style='margin-left: 5px;'>$opsiValue</label><br>";
                                            }
                                            echo "<br>";
                                            $counter++;
                                            echo '</div>'; 
                                        }
                                        echo '</div>'; 
                                        echo '<button class="btn btn-primary" name="submit" onclick="return confirm(\'Apakah anda yakin?\')">Submit</button>';
                                        } else {
                                            echo "<p>Tidak ada soal</p>.<br>";                            
                                        }

                                    mysqli_close($koneksi);
                                    ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            document.getElementById('ujianForm').addEventListener('submit', function(event) {
                event.preventDefault(); 

                const user = document.getElementById('user').value;

                const answers = [];

                for (let i = 1; i <= 10; i++) {
                    const answerElement = document.querySelector(`input[name="answer_soal${i}"]:checked`);

                    if (answerElement) {
                        answers.push({ soal: i, jawaban: answerElement.value });
                    } else {
                        answers.push({ soal: i, jawaban: null }); 
                    }
                }

                const payload = {
                    pengguna: user,
                    waktu: document.getElementById('timer').textContent,
                    jurusan: document.getElementById('jurusan').value,
                    jawaban: answers
                };

                const xhr = new XMLHttpRequest();
                xhr.open('POST', 'kuis_post.php', true);
                xhr.setRequestHeader('Content-Type', 'application/json;charset=UTF-8');

                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4) {
                        if (xhr.status === 200) {
                            const response = JSON.parse(xhr.responseText);
                            console.log('Response:', response);
                            if (response.status === 'success') {
                                alert('Terima kasih telah mengisi kuis!');
                                window.location.href = 'index.php?status=berhasil';
                            } else {
                                alert('Error: ' + response.message);
                            }
                        } else {
                            console.error('Error:', xhr.statusText);
                            alert('Terjadi kesalahan.', response.message);
                        }
                    }
                };

                console.log('Sending:', payload);
                xhr.send(JSON.stringify(payload));
            });

            function startTimer(duration, display) {
                let timer = duration,
                    minutes,
                    seconds;
                const interval = setInterval(function () {
                    minutes = parseInt(timer / 60, 10);
                    seconds = parseInt(timer % 60, 10);

                    minutes = minutes < 10 ? "0" + minutes : minutes;
                    seconds = seconds < 10 ? "0" + seconds : seconds;

                    display.textContent = minutes + ":" + seconds;

                    if (--timer < 0) {
                        clearInterval(interval);
                        alert("Waktu habis!");
                        window.location.href = "index.php";
                    }
                }, 1000);
            }

            window.onload = function () {
                const tenMinutes = 60 * 10, 
                    display = document.querySelector("#timer");
                startTimer(tenMinutes, display);
            };


        </script>
    </body>
</html>
